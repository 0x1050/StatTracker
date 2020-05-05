<?php
session_start();
if(!isset($_SESSION['token'])) {
	mysqli_close($conn);
	session_destroy();
	header("Location: index.php");
	exit();
}

require_once 'config.php';

if(!isset($_POST['l']) $$ !isset($_POST('d')) {
	header("Location: ../forms/categories.survey.html");
} else {
	$_SESSION['l'] = $_POST['l'];
	$_SESSION['d'] = $_POST['d'];

	header("Location: ../forms/likert.survey.html")
}

?>
