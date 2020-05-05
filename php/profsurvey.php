<?php 
if(!isset($_POST['submit'])) {
    header("Location: ../index.php");
    exit();
} else {
    require_once 'config.php';

    $question1 = mysqli_real_escape_string($conn, $_POST['question1']);
    $question2 = mysqli_real_escape_string($conn, $_POST['question2']);
    $question3 = mysqli_real_escape_string($conn, $_POST['question3']);
    $question4 = mysqli_real_escape_string($conn, $_POST['question4']);
    $question5 = mysqli_real_escape_string($conn, $_POST['question5']);
    $question6 = mysqli_real_escape_string($conn, $_POST['question6']);
    $question7 = mysqli_real_escape_string($conn, $_POST['question7']);
    $question8 = mysqli_real_escape_string($conn, $_POST['question8']);
    $question9 = mysqli_real_escape_string($conn, $_POST['question9']);
    $question10 = mysqli_real_escape_string($conn, $_POST['question10']);
    //

    // Query template for ProfData Table
    $sql = "INSERT INTO ProfData (Content, BeforeDL, AfterDL, Knowledge, Interest, Difficulty, Leader, Contribution, Evaluation, Learned) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "iiiiiiiiii", $question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8, $question9, $question10);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        //header("Location: ..index.php");
        exit();

    } else {
        header("Location: ../index.php?error=notprepared");
    }
    header("Location: ../index.php/?error=errdatabase");
    exit();
}
?>
