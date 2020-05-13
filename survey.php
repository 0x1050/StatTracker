<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: index.php?origin=sur&err=no_ses");
    exit();
}
require_once 'php/table.data.config.php';
//echo "<pre>";
//print_r($_SESSION);
//echo "<!pre>";
$token = $_SESSION["token"];
$uid = mysqli_query($conn, "SELECT uid from Tokens WHERE token = \"$token\"")->fetch_assoc()['uid'];
$userdata = mysqli_query($conn, "SELECT * FROM Users WHERE userID = \"$uid\"")->fetch_assoc();

$userStage = $userdata['stage'];
$user = $userdata['username'];
$stage = mysqli_query($conn, "SELECT * FROM Stage")->fetch_assoc()['S'];
include 'header.html';
if ($userStage > $stage) {
    echo "<form id=\"finishline\">
        <h1>Thanks, $user!</h1>
        <p>You are now done with this portion of the survey. There is nothing left here for you to do now.
        There will be more stuff later, though. You can stick around and wait, or you can 
        <a href=\"php/user.logout.php\">log out</a>. Do as you wish. We don't mind.</form>";
exit();

//A user should alway be caught up
if ($userStage < $stage)
    $userStage = $stage;

if (!isset($_SESSION['like']) || !isset($_SESSION['dlike']))
    include 'forms/survey.form.cat.html';

elseif (!isset($_SESSION['l1'])       ||
    !isset($_SESSION['l2'])       ||
    !isset($_SESSION['l3'])       ||
    !isset($_SESSION['d1'])       ||
    !isset($_SESSION['d2'])       ||
    !isset($_SESSION['d3'])
) {
    require_once 'php/survey.data.categories.php';
    include 'php/survey.form.likert.php';
}
else if (!isset($_SESSION['fform']) || !isset($_SESSION['scale'])) {
    include 'forms/survey.form.ffscale.html';
}
?>
</div>
</body>
</html>
