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
        $user = mysqli_real_escape_string($_POST["username"]);
	//Do we use real_escape_string when encrypting the password?
	//Wouldn't that change the passcode?
        $pass = mysqli_real_escape_string($_POST["password"]};
    
        //Here we check for the user with the credentials entered
        $usercheck = mysqli_query($serverlink,"SELECT * FROM user WHERE username=\"$user\");

        if ($usercheck->num_rows == 0) {
            //The credentials did not match any in the database
            echo "<br>Invalid credentials, please hit back on your browser and try again";
        }
        else {
            $userdata = $usercheck->fetch_assoc();
            //Check if password matches
            if (password_verify($pass,$userdata["pw"]))
                echo "Succesfull login";
            else
                echo "Invalid password";
        }
    }

    mysqli_close($serverlink);

?>
