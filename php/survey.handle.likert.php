<?php
session_start();
if(!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=lig&err=no_credz");
    exit();
}
require_once 'table.data.config.php';

echo "<br><br><br><br>";

$_SESSION['l1'] = $_POST['1'];
$_SESSION['l2'] = $_POST['2'];
$_SESSION['l3'] = $_POST['3'];
$_SESSION['d1'] = $_POST['4'];
$_SESSION['d2'] = $_POST['5'];
$_SESSION['d3'] = $_POST['6'];
$_SESSION['q7'] = $_POST['7'];
$_SESSION['q8'] = $_POST['8'];
$_SESSION['q9'] = $_POST['9'];
$_SESSION['q10'] = $_POST['9'];
$_SESSION['q11'] = $_POST['9'];
$_SESSION['q12'] = $_POST['9'];
$_SESSION['q13'] = $_POST['9'];
$_SESSION['q14'] = $_POST['9'];
$_SESSION['q15'] = $_POST['9'];

mysqli_close($conn);
header("Location: ../survey.php");
exit();
?>
