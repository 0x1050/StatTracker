<?php
    //require server login variables
    require 'config.php';

    //Connect to server
    $serverlink = mysqli_connect($server,$admin,$adminpass,$database);
    //Check if connection worked
    if ($serverlink->connect_error)
        die("Connection failed: " . $serverlink->connect_error);
    else {
        //Now that we have a connection, let's see if the email and username
        $user = $serverlink->real_escape_string($_POST["username"]);
        //Do we use real_escape_string when encrypting the password?
        //Wouldn't that change the passcode?
        $pass = $_POST["password"];

        //Here we check for the user with the credentials entered
        $usercheck = mysqli_query($serverlink, "SELECT * FROM Users WHERE username=\"$user\"");

        //This fetches the associations in $usercheck if they exist and returns false if its empty
        if (!empty($userdata = $usercheck->fetch_assoc())) {
            if (password_verify($pass, $userdata["password"])) {
                header("Location: ../surveys/surveys.html");
            }
            else {
                echo "Bad password";
            }
        }
        else {
            echo "Bad username: $user";
        }
    }

        mysqli_close($serverlink);

?>
