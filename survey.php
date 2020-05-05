<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: index.php");
    exit();
}
require_once 'php/config.php';

$token = $_SESSION["token"];
$uid = mysqli_query($conn, "SELECT uid from Tokens WHERE token = \"$token\"")->fetch_assoc()['uid'];
$userdata = mysqli_query($conn, "SELECT * FROM Users WHERE userID = \"$uid\"")->fetch_assoc();
print_r($userdata);


echo "Welcome, " . $userdata['username'] . "<br>Your userID is: " . $uid . ".<br>";
echo "You should see ";
if ($uid % 2 == 1)
    echo "&lt;- agree on your left and disagree on your right -&gt;<br>";
else
    echo "&lt;- disagree on your left and agree on your right -&gt;<br>";

?>

<!DOCTYPE html>
<html lang-"en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/main.css">
        <script src="js/functions.js"></script>
    </head>
    <body>
<a href="php/logout.php">log out</a>
        <div id="form">
            &nbsp;
        </div>
    </body>
<?php
if (!isset($_SESSION['like']) && !isset($_SESSION['dlike'])) {
    echo "<script type='text/javascript'>
                loadFragment('forms/categories.survey.html', document.getElementById('form'));
          </script>";
}
else if (!isset($_SESSION['l1']) &&
      !isset($_SESSION['l2']) &&
      !isset($_SESSION['l3']) &&
      !isset($_SESSION['d1']) &&
      !isset($_SESSION['d2']) &&
      !isset($_SESSION['d3']) ) {
    echo "<script type='text/javascript'>
                loadFragment('forms/categories.survey.html', document.getElementById('form'));
          </script>";
}
else  if (!isset($_SESSION['fform']) &&
      !isset($_SESSION['scale']) ) {
    echo "<script type='text/javascript'>
                loadFragment('forms/ff.scale.survey.html', document.getElementById('form'));
          </script>";
}
?>
</html>
