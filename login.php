<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php
    //Include file with server login variables
    require_once 'variables.php';
    //Connect to server
    $serverlink = mysqli_connect($server,$admin,$adminpass,$database);
    //Check if connection worked
    if ($serverlink->connect_error)
        die("Connection failed: " . $serverlink->connect_error);
    else {
        //Now that we have a connection, let's see if the email exists
        $username = $_POST["username"]
        $emailhash = $_POST["email"];
        $pass  = $_POST["pass"];

        //Here we check for the user with the credentials entered
        $usercheck = mysqli_query($serverlink,"SELECT * FROM user WHERE username=\"$username\"");

        if ($usercheck->num_rows == 0) {
            //The user was not found in the database
            echo "<br>Invalid credentials, try again";
        }
        else {
            $userdata = $usercheck->fetch_assoc();
            //Check if password matches
            if (password_verify($pass,$userdata["pw"]) && password_verify($username,$userdata['username']))
                echo "Succesfull login";
            else
                echo "Invalid credentials, try again";
        }
    }

    mysqli_close($serverlink);

?>

</body>
</html>
