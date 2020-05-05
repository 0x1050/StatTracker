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
        <script src="js/functions.js"></script>
        <script>window.onload = function() { loadFragment("forms/surveys.html", document.getElementById("form", 1));} </script>
    </head>
    <body>
<a href="php/logout.php">log out</a>
        <div id="form">
            &nbsp;
        </div>
    </body>
</html>

