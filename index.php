<?php
session_start();
require 'php/config.php';
if (isset($_SESSION)) {
    if (isset($_SESSION['token'])) {
        $token = $_SESSION['token'];
        //check if token exists in tokens table
        $sql = "SELECT uid FROM Tokens WHERE token =\"$token\"";
        $tokenCheck = mysqli_query($conn, $sql);
        if (!empty($tokenRow = $tokenCheck->fetch_assoc())) {
            mysqli_close($conn);
            header("Location: survey.php");
        }
    }
    else {
        $token = bin2hex(random_bytes(64));
        $_SESSION['token'] = $token;
    }
}

?>
<!DOCTYPE html>
<html lang-"en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/main.css">
    <script src="js/forms.js"></script>
    <script src="js/functions.js"></script>
    </head>
    <body>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>

