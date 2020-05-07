<?php
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
?>
