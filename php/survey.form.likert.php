<?php
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
        <form id='likert' action='php/likert.survey.php' method='post' enctype='multipart/form-data'>";

    foreach ($cat as $categories) {
        foreach ($statement as $cat) {

   echo "<div>
            <h2>$statement</h2>

            <div class=\"radios\">
            <input type='radio' name='l1' id='l1' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='l1' id='l2' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='l1' id='l3' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='l1' id='l4' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='l1' id='l5' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='l1' id='l6' class='hidden' value='0' checked>
            </div>
        </div>

";
        }
    }

  echo "</form>
        <script src=\"js/likert.js\"></script>
";
?>
