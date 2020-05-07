<?php
    //Set direction, if necessary
    if (!isset($_SESSION['agreeisleft'])) {
        if ($uid % 2 == 1){
            $_SESSION['agreeisleft'] = true;
        }
        else {
            $_SESSION['agreeisleft'] = false;
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
        <form id='likert' action='php/survey.handle.likert.php' method='post' enctype='multipart/form-data'>";

$i = 0;
    foreach ($categories as $statement) {
        foreach ($statement as $stat) {
            $i++;

   echo "<div>
            <h2>$stat</h2>

            <div class=\"radios $i\">
            <input type='radio' name='$i' id='$i' value='$lln' onclick=\"buttonCheck()\"><label>$ll</label><p>
            <input type='radio' name='$i' id='$i' value='$ln' onclick=\"buttonCheck()\"><label>$l</label><p>
            <input type='radio' name='$i' id='$i' value='$mn' onclick=\"buttonCheck()\"><label>$m</label><p>
            <input type='radio' name='$i' id='$i' value='$rn' onclick=\"buttonCheck()\"><label>$r</label><p>
            <input type='radio' name='$i' id='$i' value='$rrn' onclick=\"buttonCheck()\"><label>$rr</label><p>
            <input type='radio' name='$i' id='$i' class='hidden' value='0' checked>
            </div>
        </div>

";
        }
    }


    echo "
</form>
<script src=\"js/likert.js\"></script>
";
?>
