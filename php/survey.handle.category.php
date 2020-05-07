<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=cap&err=no_cred");
    exit();
}
require_once 'table.data.config.php';

$_SESSION['like'] = $_POST['like'];
$_SESSION['dlike'] = $_POST['dlike'];
mysqli_close($conn);
header("Location: ../survey.php");
exit();
