<?php 

// Import server variables
require_once 'config.php';

// Check if the submit is set from reset.html
if(isset($_POST["reset"])) {
	
	// Create connection to the database
	$conn = mysqli_connect($server, $admin, $adminpass, $database);
	// Check connection to the database
	if(!$conn) {
		die("Error: " . mysqli_connect_error() . "\n" . mysqli_connect_errno());
	}
		
	// Local variables
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

	// Select query template
	$sql = "SELECT * FROM Users WHERE username=?;";
	// Create a prepared statement for the select query
	$stmt = mysqli_stmt_init($conn);
	// Prepare the prepared statement for the select query
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		die(print_r(mysqli_stmt_error($stmt)));
	} else {
		// Bind parameters to the placeholder for the select query
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)) {
			die(print_r(mysqli_stmt_error($stmt)));
		} else {
			// Verify if the email matches with the user
			$emailCheck = password_verify($email, $row["email"]);
			if($emailCheck === false) {
				die(print_r(mysqli_stmt_error($stmt)));
			} elseif($emailCheck === true) {
				// Update query template
				$sql = "UPDATE Users SET password=? WHERE username=?;";
				// Create a prepared statement for the update query
				$stmt = mysqli_stmt_init($conn);
				// Prepare the prepared statement for the update query
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					die(print_r(mysqli_stmt_error($stmt)));
				} else {
					// Create new hashed password using bcrypt
					$new_hashed_pw = password_hash($new_password, PASSWORD_BCRYPT);
					// Bind parameters to the placeholder for the update query
					mysqli_stmt_bind_param($stmt, "ss", $new_hashed_pw, $username);
					mysqli_stmt_execute($stmt);
				}
			} else {
				die(print_r(mysqli_stmt_error($stmt)));
			}
		}
	}
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
