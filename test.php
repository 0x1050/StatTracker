<?php
require_once 'php/table.data.config.php';

function pullLikerts($statement, $group, $conn) {
    $a1 = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where $statement = '1'"));
    $a2 = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where $statement = '2'"));
    $a3 = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where $statement = '3'"));
    $a4 = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where $statement = '4'"));
    $a5 = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where $statement = '5'"));
    $questions = array (
        "Strongly Agree"    => $a1,
        "Agree"             => $a2,
        "Don't Care"        => $a3,
        "Disagree"          => $a4,
        "Strongly DisAgree" => $a5,
    );

    return $questions;
}

function pullScale($group, $conn) {
    $one   = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '1'"));
    $two   = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '2'"));
    $three = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '3'"));
    $four  = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '4'"));
    $five  = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '5'"));
    $six   = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '6'"));
    $seven = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '7'"));
    $eight = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '8'"));
    $nine  = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '9'"));
    $ten   = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where Scale = '9'"));

    $scale = array(
        '1' => $one,
        '2' => $two,
        '3' => $three,
        '4' => $four,
        '5' => $five,
        '6' => $six,
        '7' => $seven,
        '8' => $eight,
        '9' => $nine,
        '10' => $ten,
    );

    return $scale;
}

function pullGroup($group, $conn) {
    $A = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where liked = 'A'"));
    $B = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where liked = 'B'"));
    $C = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group where liked = 'C'"));
    $likes = array(
        "A" => $A,
        "B" => $B,
        "C" => $C
    );
    $A = mysqli_num_rows(mysqli_query($conn, "SELECT disliked from $group where disliked = 'A'"));
    $B = mysqli_num_rows(mysqli_query($conn, "SELECT disliked from $group where disliked = 'B'"));
    $C = mysqli_num_rows(mysqli_query($conn, "SELECT disliked from $group where disliked = 'C'"));
    $dislikes = array(
        "A" => $A,
        "B" => $B,
        "C" => $C
    );
    $total = mysqli_num_rows(mysqli_query($conn, "SELECT liked from $group"));
    $A1 = pullLikerts('A1', $group, $conn);
    $A2 = pullLikerts('A1', $group, $conn);
    $A3 = pullLikerts('A1', $group, $conn);

    $B1 = pullLikerts('B1', $group, $conn);
    $B2 = pullLikerts('B2', $group, $conn);
    $B3 = pullLikerts('B3', $group, $conn);

    $C1 = pullLikerts('C1', $group, $conn);
    $C2 = pullLikerts('C2', $group, $conn);
    $C3 = pullLikerts('C3', $group, $conn);


    $Q10 = pullLikerts('Q10', $group, $conn);
    $Q11 = pullLikerts('Q11', $group, $conn);
    $Q12 = pullLikerts('Q12', $group, $conn);
    $Q13 = pullLikerts('Q13', $group, $conn);
    $Q14 = pullLikerts('Q14', $group, $conn);
    $Q15 = pullLikerts('Q15', $group, $conn);

    $scale = pullScale($group, $conn);

    $Data = array(
        "total"    => $total,
        "likes"    => $likes,
        "dislikes" => $dislikes,
        "A1"       => $A1,
        "A2"       => $A2,
        "A3"       => $A3,
        "B1"       => $B1,
        "B2"       => $B2,
        "B3"       => $B3,
        "C1"       => $C1,
        "C2"       => $C2,
        "C3"       => $C3,
        "Q10"      => $Q10,
        "Q11"      => $Q11,
        "Q12"      => $Q12,
        "Q13"      => $Q13,
        "Q14"      => $Q14,
        "Q15"      => $Q15,
        "scale"    => $scale
    );

    return $Data;
}

$G1 = pullGroup("G1", $conn);
$export = var_export($G1, true);
$var = "<?php\n\n\$G1 = $export;\n\n?>";
file_put_contents('G1.php', $var);

echo "<pre>";
print_r($G1);
