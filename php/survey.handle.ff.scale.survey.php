<?php
session_start();
if(!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=ffp&err=no_credz");
    exit();
}
require_once 'table.data.config.php';
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
$_SESSION['fform'] = $_POST['ff'];
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
$d3 = $_SESSION['d3'];
$q7 = $_SESSION['q7'];
$q8 = $_SESSION['q8'];
$q9 = $_SESSION['q9'];
$q10 = $_SESSION['q10'];
$q11 = $_SESSION['q11'];
$q12 = $_SESSION['q12'];
$q13 = $_SESSION['q13'];
$q14 = $_SESSION['q14'];
$q15 = $_SESSION['q15'];
$fform = $_SESSION['fform'];
$scale = $_SESSION['scale'];

$sql = "INSERT INTO G1(liked, 
                       disliked,
                     A1,
                     A2,
                     A3,
                     B1,
                     B2,
                     B3,
                     C1,
                     C2,
                     C3,
                     q10,
                     q11,
                     q12,
                     q13,
                     q14,
                     q15,
                     FF,
                       scale) VALUES(\"$liked\",
                                     \"$dliked\",
                                     \"$l1\",
                                     \"$l2\",
                                     \"$l3\",
                                     \"$d1\",
                                     \"$d2\",
                                     \"$d3\",
                                     \"$q7\",
                                     \"$q8\",
                                     \"$q9\",
                                     \"$q10\",
                                     \"$q11\",
                                     \"$q12\",
                                     \"$q13\",
                                     \"$q14\",
                                     \"$q15\",
                                     \"$fform\",
                                     \"$scale\")";

$user = $_SESSION['user'];

$update = "UPDATE Users set stage = stage + 1 where username = \"$user\"";
//echo $update;

if (mysqli_query($conn, $sql)){
    mysqli_query($conn, $update);
}
mysqli_close($conn);
header("Location: ../survey.php");
exit();

?>
