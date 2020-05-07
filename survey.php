<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: index.php?origin=sur&err=no_ses");
    exit();
}
require_once 'php/table.data.config.php';

$token = $_SESSION["token"];
$uid = mysqli_query($conn, "SELECT uid from Tokens WHERE token = \"$token\"")->fetch_assoc()['uid'];
$userdata = mysqli_query($conn, "SELECT * FROM Users WHERE userID = \"$uid\"")->fetch_assoc();

if (!isset($_SESSION['user'])) { //I'm aware that this leaks the username, but oh well
    $_SESSION['user'] = $userdata['username'];
    echo $_SESSION['user'];
}

include 'header.html';

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
else {
echo "<form id=\"finishline\">
    <h1>Thank You!</h1>
</form>";
}
?>
</div>
</body>
</html>
