<?php
session_start();
require 'php/table.data.config.php';
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="height=device-height, initial-scale=1">
        <title></title>
        <link rel="preload" href="css/main.css" as="style">
        <link rel="preload" href="js/forms" as="script">
        <link rel="preload" href="js/functions" as="script">
        <link rel="stylesheet" href="css/main.css">
    <script src="js/forms.js"></script>
    <script src="js/functions.js"></script>
    </head>
    <body>
        <h1 class="frontpage">StatTracker</h1>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>


