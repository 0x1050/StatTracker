<?php 

// Check if the submit is set from reset.html
if(!isset($_POST["reset"])) {
    header("Location: ../index.html");
    exit();
}
else {

    // Import server variables
    require_once 'config.php';

    // Create connection to the database
    $conn = mysqli_connect($server, $admin, $adminpass, $database);
    // Check connection to the database
    if(!$conn) {
        die("Error: " . mysqli_connect_error() . "\n" . mysqli_connect_errno());
    }

    // Local variables
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);

    // Set a verification flag to validate for username and email
    $verification = false;

    // Iterate through the database, validate if username and email exists and exit the loop once found
    foreach(mysqli_query($conn, 'SELECT username, email FROM Users') as $user) {
        if((password_verify($email, $user['email']))) {
            $verification = true;
            break;
        }
    }

    // Check verification flag
    if($verification === false) {
        die("Error: Username/Email does not exist");
    } else {
        // Update query template
        $sql = "UPDATE Users SET password=? WHERE username=?;";
        // Create a prepared statement for the update query
        $stmt = mysqli_stmt_init($conn);
        // Prepare the prepared statement for the update query
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            die(print_r(mysqli_stmt_error($stmt)));
        } else {
            // Create new hashed password using bcrypt
            mysqli_stmt_bind_param($stmt, "ss", $new_password, $username);
            mysqli_stmt_execute($stmt);
            //Send user to survey page
            header("Location: ../surveys/surveys.html");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
