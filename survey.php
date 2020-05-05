<?php
session_start();
require_once 'php/config.php';
function logOut() {
    session_destroy();
    mysqli_close($conn);
    header("Location: index.php");
    exit();
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
    <button name="logout" value="logout" onclick="logout()">logout</button>
<script>function logout() { session_destroy(); }</script>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>

