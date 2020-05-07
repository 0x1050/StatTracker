<?php
session_start();
if (!isset($_SESSION['token'])) {
    mysqli_close($conn);
    session_destroy();
    header("Location: index.php?origin=sur&err=no_ses");
    exit();
}
require_once 'php/config.php';

$token = $_SESSION["token"];
$uid = mysqli_query($conn, "SELECT uid from Tokens WHERE token = \"$token\"")->fetch_assoc()['uid'];
$userdata = mysqli_query($conn, "SELECT * FROM Users WHERE userID = \"$uid\"")->fetch_assoc();

if (!isset($_SESSION['user'])) { //I'm aware that this leaks the username, but oh well
    $_SESSION['user'] = $userdata['username'];
    echo $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome to the survey!</title>
        <link rel="preload" href="css/main.css" as="style">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/functions.js"></script>
    </head>
<body>
        <ul id="nav">
        <li><p>Welcome,<?php echo $_SESSION['user']; ?></p></li>
            <li><a href="#">Theme</a>
                <ul class="dropdown">
                    <li><a href="#">0x1050</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </li>
            <li><a href="#">About</a>
            <li><a href="php/logout.php">log out</a><li>
        </ul>

<div id="form">
<?php
//------------------------------------------First survey
if (!isset($_SESSION['like']) || !isset($_SESSION['dlike'])) {
    echo "<form id='categories' action='php/category.survey.php' method='post' enctype='multipart/form-data'>
        <div class=\"left\">

        <h1>What did you like the most about this project?</h1>

            <div class=\"radios\">

            <input type=\"radio\" class=\"rad\" value=\"A\" id=\"lA\" name=\"like\" onclick=\"uncheck('rA');left='A';check('l')\"><label>The project's use of technology</label><br>
            <input type=\"radio\" class=\"rad\" value=\"B\" id=\"lB\" name=\"like\" onclick=\"uncheck('rB');left='B';check('l')\"><label></label>The user interface<br>
            <input type=\"radio\" class=\"rad\" value=\"C\" id=\"lC\" name=\"like\" onclick=\"uncheck('rC');left='C';check('l')\"><label></label>Other<br>
            </div>

        </div>

            <div class=\"right\">

            <h1>What did you like the least?</h1>

            <div class=\"radios\">

            <input type=\"radio\" class=\"rad\" value=\"A\" id=\"rA\" name=\"dlike\" onclick=\"uncheck('lA');right='A';check('r')\"><label>The project's use of tecnology</label><br>
            <input type=\"radio\" class=\"rad\" value=\"B\" id=\"rB\" name=\"dlike\" onclick=\"uncheck('lB');right='B';check('r')\"><label></label>The user interface<br>
            <input type=\"radio\" class=\"rad\" value=\"C\" id=\"rC\" name=\"dlike\" onclick=\"uncheck('lC');right='C';check('r')\"><label></label>Other<br>
            </div>

        </div>
        </form>

        <script src=\"js/category.js\"></script>
";
}
//-----------------------------------------  Likert
//--------------------------------------------- set up variables
elseif (!isset($_SESSION['l1'])       ||
        !isset($_SESSION['l2'])       ||
        !isset($_SESSION['l3'])       ||
        !isset($_SESSION['d1'])       ||
        !isset($_SESSION['d2'])       ||
        !isset($_SESSION['d3'])
) {
    require_once 'php/categories.php';
    //Pull variables, make them more manageable
    //This is incredibly annoying and tedious work. I hate it!
    if ($_SESSION['like'] == "A") {
        $like = $A;
        $like1 = $like['1'];
        $like2 = $like['2'];
        $like3 = $like['3'];
        $like = $A['4'];
    }
    elseif ($_SESSION['like'] == "B") {
        $like = $B;
        $like1 = $like['1'];
        $like2 = $like['2'];
        $like3 = $like['3'];
        $like = $A['4'];
    }
    else {
        $like = $C;
        $like1 = $like['1'];
        $like2 = $like['2'];
        $like3 = $like['3'];
        $like = $A['4'];
    }

    if ($_SESSION['dlike'] == "A") {
        $dlike = $A;
        $dlike1 = $dlike['1'];
        $dlike2 = $dlike['2'];
        $dlike3 = $dlike['3'];
        $dlike = $A['4'];
    }
    elseif ($_SESSION['dlike'] == "B") {
        $dlike = $B;
        $dlike1 = $dlike['1'];
        $dlike2 = $dlike['2'];
        $dlike3 = $dlike['3'];
        $dlike = $A['4'];
    }
    else {
        $dlike = $C;
        $dlike1 = $dlike['1'];
        $dlike2 = $dlike['2'];
        $dlike3 = $dlike['3'];
        $dlike = $A['4'];
    }

    //Set direction, if necessary
    if (!isset($_SESSION['agreeisleft'])) {
        if ($uid % 2 == 1){
            echo "agree";
            $_SESSION['agreeisleft'] = true;
        }
        else {
            $_SESSION['agreeisleft'] = false;
            echo "disagree";
        }
    }

    //Set agreement statements: ll = left, m = middle r = right
    //Set agreement values, basicall, just append n to the selector
    if ($_SESSION['agreeisleft'] == true) {
        $ll  = "Strongly Agree";
        $l   = "Agree";
        $m   = "Neutral";
        $r   = "Disagree";
        $rr  = "Strongly Disagree";
        $lln = 5;
        $ln  = 4;
        $mn  = 3;
        $rn = 2;
        $rrn  = 1;
    }
    else {
        $rr = "Strongly Agree";
        $r  = "Agree";
        $m  = "Neutral";
        $l  = "Disagree";
        $ll = "Strongly Disagree";
        $lln = 1;
        $ln  = 2;
        $mn  = 3;
        $rn = 4;
        $rrn  = 5;
    }
    //Write that shit!
    echo "
        <form id='likert' action='php/likert.survey.php' method='post' enctype='multipart/form-data'>
        <div class='left'>
            <h2>$like1</h2>

            <div class=\"radios\">
            <input type='radio' name='l1' id='l1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='l1' id='l2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='l1' id='l3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='l1' id='l4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='l1' id='l5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='l1' id='l6' class='hidden' value='0' checked>
            </div>

            <h2>$like2</h2>

            <div class=\"radios\">
            <input type='radio' name='l2' id='l1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='l2' id='l2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='l2' id='l3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='l2' id='l4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='l2' id='l5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='l2' id='l6' class='hidden' value='0' checked>
            </div>

            <h2>$like3</h2>

            <div class=\"radios\">
            <input type='radio' name='l3' id='l1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='l3' id='l2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='l3' id='l3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='l3' id='l4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='l3' id='l5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='l3' id='l6' class='hidden' value='0' checked>
            </div>
        </div>

        <div class='right'>
            <h2>$dlike1</h2>

            <div class=\"radios\">
            <input type='radio' name='d1' id='r1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='d1' id='r2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='d1' id='r3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='d1' id='r4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='d1' id='r5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='d1' id='r6' class='hidden' value='0' checked>
            </div>

            <h2>$dlike2</h2>

            <div class=\"radios\">
            <input type='radio' name='d2' id='r1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='d2' id='r2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='d2' id='r3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='d2' id='r4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='d2' id='r5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='d2' id='r6' class='hidden' value='0' checked>
            </div>

            <h2>$dlike3</h2>

            <div class=\"radios\">
            <input type='radio' name='d3' id='r1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='d3' id='r2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='d3' id='r3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='d3' id='r4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='d3' id='r5' value='$rrn' onclick=\"buttonCheck()\"> <label>$rr</label><p>
            <input type='radio' name='d3' id='r6' class='hidden' value='0' checked>
            </div>
        </div>
        </form>
        <script src=\"js/likert.js\"></script>
";

}//--------------------------------------------------- Free Form
else if (!isset($_SESSION['fform']) || !isset($_SESSION['scale'])) {
echo "<form id=\"freeform\" action=\"php/ff.scale.survey.php\" method=\"post\" enctype=\"multipart/form-data\">
    <div id=\"ff\">
    <h1>Is there anything you would like to say to
    the developers of this project?</h1>
        <input type=\"text\" name=\"ff\">
    </div>

    <div id=\"scale\">
        <h1>Finally, how many stars would you give this project?</h1>
        <input type=\"radio\" name=\"scale\" value=\"1\">
        <label id=\"scale1\"></label>
        <input type=\"radio\" name=\"scale\" value=\"2\">
        <label id=\"scale2\"></label>
        <input type=\"radio\" name=\"scale\" value=\"3\">
        <label id=\"scale3\"></label>
        <input type=\"radio\" name=\"scale\" value=\"4\">
        <label id=\"scale4\"></label>
        <input type=\"radio\" name=\"scale\" value=\"5\">
        <label class=\"scale5\"></label>
        <input type=\"radio\" name=\"scale\" value=\"6\">
        <label id=\"scale6\"></label>
        <input type=\"radio\" name=\"scale\" value=\"7\">
        <label id=\"scale7\"></label>
        <input type=\"radio\" name=\"scale\" value=\"8\">
        <label id=\"scale8\"></label>
        <input type=\"radio\" name=\"scale\" value=\"9\">
        <label id=\"scale9\"></label>
        <input type=\"radio\" name=\"scale\" value=\"10\">
        <label class=\"scale10\"></label>
    </div>

    <input type=\"submit\" name=\"submit\" value=\"submit\">
</form>
";
    print_r($_SESSION);
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
