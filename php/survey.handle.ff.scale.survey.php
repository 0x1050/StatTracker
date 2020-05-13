<?php
session_start();
if(!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=ffp&err=no_credz");
    exit();
}
require_once 'table.data.config.php';
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$token = $_SESSION["token"];
$uid = mysqli_query($conn, "SELECT uid from Tokens WHERE token = \"$token\"")->fetch_assoc()['uid'];
$userdata = mysqli_query($conn, "SELECT * FROM Users WHERE userID = \"$uid\"")->fetch_assoc();
$user = $userdata['username'];
$_SESSION['fform'] = $_POST['ff'];
$_SESSION['scale'] = $_POST['scale'];
$stage = mysqli_query($conn, "SELECT * FROM Stage")->fetch_assoc()['S'];
$group = $stage + 1;

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
$ff = $_POST['ff'];
$scale = $_SESSION['scale'];

$sql = "INSERT INTO G$group(liked, 
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
                                     \"$ff\",
                                     \"$scale\")";


//The group is alway one up from the stage. This ensures that the user is ahead
$update = "UPDATE Users set stage = stage + 1 where username = \"$user\"";
//echo $fform . "<br>";
//echo $sql . "<br>";
//echo $update;

if (mysqli_query($conn, $sql)){
    mysqli_query($conn, $update);
}
mysqli_close($conn);
header("Location: ../survey.php");
exit();

?>
