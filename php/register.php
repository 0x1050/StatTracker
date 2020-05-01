<?php
require_once 'config.php';
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$group = filter_input(INPUT_POST, 'group');
$password = filter_input(INPUT_POST, 'password');
    
    # Creating a connection with  database.
    # Mysqli_connect_errno() Returns the error code from last connect call.
    # Mysqli_connect_error() Returns a string description of the last connect error.
    
$connection = new mysqli ($server, $admin, $adminpass, $database);
if(mysqli_connect_error())
    {
        die('Error Connecting ('.mysqli_connect_errno().')'
            .mysqli_connect_error());
    }

else {
    
    # Gets and checks the username and email saved in the database with the current data that the user enters.
    
        $verification = false;

    # Iterate through the database, validate if username and email exists and exit the loop once found.

    # Iterate through the database, validate if username and email exists and exit the loop once found.
    
        foreach(mysqli_query($connection, 'SELECT username, email FROM Users') as $user)
        {
            if((password_verify($email, $user['email']) && ($username === $user["username"])))
            {
                $verification = true;
                break;
            }
        }
    
    # If the user or email already exist in the database, it will display a message that says "This user is already taken".
    # Otherwise, the username and email will be hashed and it will display "New data has been inserted succesfully".
    
        if($verification === false)
        {
           echo "This user is already taken";
        }
        else
        {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $email_encrypt = password_hash($email, PASSWORD_BCRYPT);
            $sql = "INSERT INTO Users(username, email, groupNumber, password)
            values ('$username', '$email_encrypt', '$group', '$password_hash')";
            if($connection->query($sql))
            {
                echo "New data has been inserted succesfully";
            }
            else
            {
                echo "Some error has occurred".$sql."<br>".$connection->error;
            }
            $connection->close();
        }
    }
?>
