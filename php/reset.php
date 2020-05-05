<?php 
if(!isset($_POST["reset"])) {
    mysqli_close($conn);
    header("Location: ../index.html");
    exit();
}
else {
    require_once 'config.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);

    //We don't need to iterate through the entire database considering the fact
    //that we stored the username as plaintext
    $emailCheck = mysqli_query($conn, "SELECT username, email FROM Users WHERE username = \"$username\"");
    if (!empty($userRow = $emailCheck->fetch_assoc())) {
        // Update query template
        $sql = "UPDATE Users SET password=? WHERE username=?;";
        // Create a prepared statement for the update query
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $new_password, $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: ../forms/surveys.html");
            exit();
        }
        else { //stmt not prepared
            mysqli_close($conn);
            header("Location: ../index.php?origin=reset.php");
            exit();
        }
    }
    else {
        mysqli_close($conn);
        header("Location: ../index.php?origin=reset.php");
        exit();
    }
}
?>
