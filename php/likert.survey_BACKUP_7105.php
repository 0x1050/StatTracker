<?php
session_start();
if(!isset($_SESSION['token'])) {
<<<<<<< HEAD
    mysqli_close($conn);
    session_destroy();
    header("Location: ../index.php?origin=lig&err=no_credz");
    exit();
}
require_once 'config.php';

    $_SESSION['l1'] = $_POST['l1'];
    $_SESSION['l2'] = $_POST['l2'];
    $_SESSION['l3'] = $_POST['l3'];
    $_SESSION['d1'] = $_POST['d1'];
    $_SESSION['d2'] = $_POST['d2'];
    $_SESSION['d3'] = $_POST['d3'];

    mysqli_close($conn);
    header("Location: ../survey.php");
    exit();
=======
	mysqli_close($conn);
	session_destroy();
	header("Location: index.php");
	exit();
} else {
	require_once 'config.php';

	if(!isset($_POST['likertliked1']) && !isset($_POST['likertliked2']) {
		header("Location: ../forms/likert.survey.html");
	} else {
		
		$_SESSION['l1'] = $_POST['likertliked1'];
		$_SESSION['l2'] = $_POST['likertliked2'];
		$_SESSION['l3'] = $_POST['likertliked3'];
		$_SESSION['d1'] = $_POST['likertdisliked1'];
		$_SESSION['d2'] = $_POST['likertdisliked2'];
		$_SESSION['d3'] = $_POST['likertdisliked3'];

		header("Location: ../forms/ff.scale.survey.html");
	}
}

>>>>>>> cf6b01001381de4c97b3d085c885383f0f6421a2
?>
