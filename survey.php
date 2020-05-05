<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: index.php");
    exit();
}
require_once 'php/config.php';
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
<a href="php/logout.php">log out</a>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>

