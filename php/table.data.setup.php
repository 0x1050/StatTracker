<?php
require_once 'table.data.config.php';
//Drop tables
$dropUsers = "DROP TABLE IF EXISTS Users";
if (mysqli_query($conn, $dropUsers))
    echo "Users dropped succesfully<br>";
$dropTokens = "DROP TABLE IF EXISTS Tokens";
if (mysqli_query($conn, $dropTokens))
    echo "Tokens dropped succesfully<br>";
for ( $i = 1; $i < 8; $i++) {
    $dropGroup = "DROP TABLE IF EXISTS  G" . $i;
    if (mysqli_query($conn, $dropGroup))
    echo "Group$i dropped succesfully<br>";
}
$dropProf = "DROP TABLE IF EXISTS ProfData";
    if (mysqli_query($conn, $dropProf))
        echo "Professor dropped succesfully<br>";
//Create Users table
$users  = "CREATE TABLE IF NOT EXISTS Users(";
$users .= "userID       INT(2)      UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,";
$users .= "username     VARCHAR(20) NOT NULL,";
$users .= "email        CHAR(60)    NOT NULL,";
$users .= "password     CHAR(60)    NOT NULL,";
$users .= "groupNumber  INT(1)      NOT NULL,";
$users .= "theme        INT(1)      NOT NULL DEFAULT 1,";
$users .= "stage        INT(1)      NOT NULL DEFAULT 0)";


if (mysqli_query($conn, $users))
    echo "&#10004; Users<br>";
else
    echo "&#10008; Users<br>";
//Create Groups
for ($i = 1; $i < 8; $i++) {
    $group  = "CREATE TABLE IF NOT EXISTS G" . $i;
    $group .= "(liked CHAR(1) DEFAULT NULL,";
    $group .= "disliked Char(1) DEFAULT NULL,";
    $group .= "A1 INT(1) DEFAULT NULL, ";
    $group .= "A2 INT(1) DEFAULT NULL,";
    $group .= "A3 INT(1) DEFAULT NULL,";
    $group .= "B1 INT(1) DEFAULT NULL,";
    $group .= "B2 INT(1) DEFAULT NULL,";
    $group .= "B3 INT(1) DEFAULT NULL,";
    $group .= "C1 INT(1) DEFAULT NULL,";
    $group .= "C2 INT(1) DEFAULT NULL, ";
    $group .= "C3 INT(1) DEFAULT NULL,";
    $group .= "Scale INT(2) NOT NULL,";
    $group .= "FF TEXT)";

    if (mysqli_query($conn, $group))
        echo "&#10004; Group$i<br>";
    else
        echo "&#10008; Group$i<br>";
}
//Create professor table
$prof = "CREATE TABLE IF NOT EXISTS ProfData(CONTENT INT(1),";
$prof .= "BeforeDL INT(1),";
$prof .= "AfterDL INT(1),";
$prof .= "Interest INT(1),";
$prof .= "Difficulty INT(1),";
$prof .= "Leader INT(1),";
$prof .= "Contribution INT(1),";
$prof .= "Evaluation INT(1),";
$prof .= "Learned INT(1))";
if (mysqli_query($conn, $prof))
    echo "&#10004; ProfData<br>";
else
    echo "&#10008; ProfData<br>";
//Create tokens
$tokens = "CREATE TABLE Tokens(uid int(2), token CHAR(128))";
if (mysqli_query($conn, $tokens))
    echo "&#10004; Tokens<br>";
else
    echo "&#10008; Tokens<br>";
mysqli_close($conn);
?>
