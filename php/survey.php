<?php
require_once 'config.php';
$liked = filter_input(INPUT_POST, 'liked');
$disliked = filter_input(INPUT_POST, 'disliked');
$likertliked1 = filter_input(INPUT_POST, 'likertliked1');
$likertliked2 = filter_input(INPUT_POST, 'likertliked2');
$likertliked3 = filter_input(INPUT_POST, 'likertliked3');
$likertdisliked1 = filter_input(INPUT_POST, 'likertdisliked1');
$likertdisliked2 = filter_input(INPUT_POST, 'likertdisliked2');
$likertdisliked3 = filter_input(INPUT_POST, 'likertdisliked3');
$scale = filter_input(INPUT_POST, 'scale');
$ff1 = filter_input(INPUT_POST, 'ff1');
$ff2 = filter_input(INPUT_POST, 'ff2');
    
    $liked = 'A';
    $disliked = 'C';
    $likertliked1 = '1';
    $likertliked2 = '2';
    $likertliked3 = '3';
    $likertdisliked1 = '4';
    $likertdisliked2 = '5';
    $likertdisliked3 = '1';
    $scale = '9';
    $ff1 = 'ff1';
    $ff2 = 'ff2';
    
    # Creating a connection with  database.
    # Mysqli_connect_errno() Returns the error code from last connect call.
    # Mysqli_connect_error() Returns a string description of the last connect error.
    
$connection = new mysqli ($server, $admin, $adminpass, $database);
if(mysqli_connect_error())
    {
        die('Error Connecting ('.mysqli_connect_errno().')'
            .mysqli_connect_error());
    }

else {
    
    $sql = "INSERT INTO  G1(liked, disliked, " . $liked . "1, " . $liked . "2," . $liked . "3, " . $disliked . "1, " . $disliked . "2, " . $disliked . "3, Scale, FF1, FF2)
    VALUES(\"" . $liked . "\",
           \"" . $disliked . "\",
           \"" . $likertliked1 ."\",
           \"" . $likertliked2 . "\",
           \"" . $likertliked3 . "\",
           \"" . $likertdisliked1 . "\",
           \"" . $likertdisliked2 . "\",
           \"" . $likertdisliked3 . "\" ,
           \"" . $scale . "\",
           \"" . $ff1 . "\",
           \"" . $ff2 . "\")";
    echo $sql;
        $connection->close();
    }
?>




