<?php
session_start();
if(!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ..lindex.php?origin=ffp&err=no_credz");
    exit();
}
require_once 'config.php';
$_SESSION['fform'] = $_POST['fform'];
$_SESSION['scale'] = $_POST['scale'];

$liked = $_SESSION['like'];
$dliked = $_SESSION['dlike'];
$l1 = $_SESSION['l1'];
$l3 = $_SESSION['l2'];
$l3 = $_SESSION['l3'];
$d1 = $_SESSION['d1'];
$d2 = $_SESSION['d2'];
$d3 = $_SESSION['d3'];
$l1 = $_SESSION['l1'];
$l2 = $_SESSION['l2'];
$l3 = $_SESSION['l3'];
$d1 = $_SESSION['d1'];
$d2 = $_SESSION['d2'];
$d2 = $_SESSION['d3'];
$fform = $_SESSION['fform'];
$scale = $_SESSION['scale'];

$sql = "INSERT INTO G1(liked, 
                       disliked,"
                     . $like . "1, "
                     . $like . "2, "
                     . $like . "3, "
                     . $dlike . "1, "
                     . $dlike . "2, "
                     . $dlike . "3, 
                       fform,
                       scale) VALUES(\"$liked\",
                                     \"$dliked\",
                                     \"$l1\",
                                     \"$l3\",
                                     \"$l3\",
                                     \"$d1\",
                                     \"$d2\",
                                     \"$d3\",
                                     \"$l1\",
                                     \"$l2\",
                                     \"$l3\",
                                     \"$d1\",
                                     \"$d2\",
                                     \"$d2\",
                                     \"$fform\",
                                     \"$scale)";


mysqli_query($conn, $sql);
mysqli_close($conn);
$_SESSION['finishline'] = true;
header("Location: ../survey.php");
exit();
?>
