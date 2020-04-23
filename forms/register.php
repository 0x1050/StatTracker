<?php
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$group = filter_input(INPUT_POST, 'groupNumber');
$password = filter_input(INPUT_POST, 'password');
$password2 = filter_input(INPUT_POST, 'password2');
$host = "localhost";
$dbusername = "root";
$dbpassword = "Vladimir99";
$dbname = "StatTracker";
//creating a connection with  database
//mysqli_connect_errno() Returns the error code from last connect call
//mysqli_connect_error() Returns a string description of the last connect error
$connection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){
  die('Error Connecting ('.mysqli_connect_errno().')'
    .mysqli_connect_error());
}

else {
    if($password == $password2){
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $email_encrypt = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Users(username, email, groupNumber, password)
        values ('$username', '$email_encrypt', '$group', '$password_hash')";
        if($connection->query($sql)){
            echo "New data has been inserted succesfully";
    }
    else {
    echo "Some error has occurred".$sql."<br>".$connection->error;
    }
        $connection->close();
    }
}

?>
