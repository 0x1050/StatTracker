<?php
if (!isset($_POST['register'])) {
    header("Location: ../index.html");
    exit();
}
else {
    require_once 'config.php';

    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $group = filter_input(INPUT_POST, 'group');

    //Next we create a query to check if the user exist in the database
    $checkForUser = mysqli_query($conn, "SELECT username FROM Users WHERE username=\"$user\"");
    //Fetch associations
    if (!empty($checkForUser->fetch_assoc())) { // if this returns not empty, that means the user exists
        header("Location: ../index.php?origin=reg&err=bd");
        exit();
    }
    else { //User does not exist, proceed to verify email address
        //Gather email hashes from database
        $hashes = mysqli_query($conn, "SELECT email FROM Users");
        $emailFound = false;

        //Check for email, stop when found
        while ($row = mysqli_fetch_array($hashes)) {
            if (password_verify($email,  $row["email"])) {
                $emailFound = true;
                break;
            }
        }

        if ($emailFound) {
            header("Location: ../index.php?origin=reg&err=bc");
            exit();
        }
        else {
            //We want to randomize the theme number at some point
            mysqli_query($conn, "Insert INTO Users(username,
                email,
                password,
                groupNumber,
                theme) VALUES(\"" . $user                                . "\",
                \"" . password_hash($_POST["email"], PASSWORD_BCRYPT)    . "\",
                \"" . password_hash($_POST["password"], PASSWORD_BCRYPT) . "\",
                \"" . $group                                             . "\",
                \"1\")");
            //Send user to survey
            header("Location: ../forms/surveys.html");
            exit();
        }
    }
}
?>
