<?php
require_once 'config.php';
    # Creating a connection with  database.
    # Mysqli_connect_errno() Returns the error code from last connect call.
    # Mysqli_connect_error() Returns a string description of the last connect error.

$connection = new mysqli ($server, $admin, $adminpass, $database);

//Check connection
if($connection->connect_error)
    die("Connection failed: " . $connection->connect_error);
else {
    //Now that we have a connection, we can parse the user's input
    $user = mysqli_real_escape_string($connection, $_POST["username"]);
    $email = $_POST["email"];
    $group = filter_input(INPUT_POST, 'group');
    $password = password_hash(filter_input(INPUT_POST, 'pass1'), PASSWORD_BCRYPT);

    //Next we create a query to check if the user exist in the database
    $checkForUser = mysqli_query($connection, "SELECT username FROM Users WHERE username=\"$user\"");
    //Fetch associations
    if (!empty($checkForUser->fetch_assoc())) { // if this returns not empty, that means the user exists
        echo "User exists in database";
    }
    else { //User does not exist, proceed to verify email address
        //Gather email hashes from databasea
        $hashes = mysqli_query($connection, "SELECT email FROM Users");
        //Keep track
        $emailFound = false;

        //Check for email
        while ($row = mysqli_fetch_array($hashes)) {
            if (password_verify($email,  $row["email"])) {
                $emailFound = true;
                echo "That email address exists in our system.";
                break;
            }
        }
        if (!$emailFound) {
            mysqli_query($connection, "Insert INTO Users(username,
                                        email,
                                        password,
                                        groupNumber,
                                        theme,
                                        active,
                                        stayLoggedIn) VALUES(\"" . $user                                  . "\",
                                                             \"" . password_hash($email, PASSWORD_BCRYPT) . "\",
                                                             \"" . $password                              . "\",
                                                             \"" . $group                                 . "\",
                                                             \"1\",\"1\",\"1\")");
            //Send user to survey
            header("Location: ../surveys/surveys.html");
            }
    }
}

?>
