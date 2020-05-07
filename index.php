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
        <link rel="preload" href="css/main.css" as="style">
        <link rel="preload" href="js/forms" as="script">
        <link rel="preload" href="js/functions" as="script">
        <link rel="stylesheet" href="css/main.css">
    <script src="js/forms.js"></script>
    <script src="js/functions.js"></script>
    </head>
    <body>
        <ul id="nav">
            <li><a href="#">Theme</a>
                <ul class="dropdown">
                    <li><a href="#">0x1050</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </li>
            <li><a href="#">About</a></li>
        </ul>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>


