<?php
require 'php/config.php';
require_once 'php/categories.php';
$liked = json_encode($A);
echo "<script type='text/javascript'>
let liked = $liked;
console.log(liked);
            </script>";
?>

