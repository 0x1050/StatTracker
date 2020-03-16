<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title></title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php
    //Include file with server login variables
    require_once 'variables.php';

    //Connect to server
    $serverlink = mysqli_connect($server,$admin,$adminpass,$database);

    //Check if connection worked
    if ($serverlink->connect_error) {
        die("Connection failed: " . $serverlink->connect_error);
    } else {
        //If connected, create variables for insertion
        $username = $POST["username"];
        $emailhash = password_hash($_POST["email"]);
        $passhash = password_hash($_POST["pass1"], PASSWORD_BCRYPT);

        //Check if username is already in the database
        $usercheck = mysqli_query($serverlink,"SELECT * FROM user WHERE username=\"$username\"");

        //If the user is found, do not add it to users
        if ($usercheck->num_rows != 0) {
            echo "<br>Username found, no record added.<br>";
        }
        else {
            //If the username is not found, insert user into the table
            $sql = "INSERT INTO user(username,group,email,pw) values(\"$username\",\"$group\",\"$emailhash\",\"$passhash\")";
            //Attempt to insert values
            if (mysqli_query($serverlink, $sql)) {
                echo "Record added";
            }
            else {//The code shouldn't reach here, since we've already checked
                  //that the email is not in the database, I'm placing this here
                  //to inform myself that some weird error occurred
                echo "Error: Unable to add record";
            }
        }
    }

    mysqli_close($serverlink);

?>

</body>
</html>
