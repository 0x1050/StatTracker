<?php
session_start();
if(!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=lig&err=no_credz");
    exit();
}
require_once 'table.data.config.php';

$_SESSION['l1'] = $_POST['l1'];
$_SESSION['l2'] = $_POST['l2'];
$_SESSION['l3'] = $_POST['l3'];
$_SESSION['d1'] = $_POST['d1'];
$_SESSION['d2'] = $_POST['d2'];
$_SESSION['d3'] = $_POST['d3'];

mysqli_close($conn);
header("Location: ../survey.php");
exit();
?>
