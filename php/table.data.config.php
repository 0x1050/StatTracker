<?php
$server = "localhost";
$admin = "carlos";
$adminpass = "555";
$database = "StatTracker";

//Try to connect
$conn = mysqli_connect($server, $admin, $adminpass, $database);
//Send user back to index on fail, stop running php
if (!$conn) {
    header("Location: ../index.html?origin=con&err=conn_error");
    exit();
}
