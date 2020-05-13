<!DOCTYPE html>
<html lang-"en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="height=device-height, initial-scale=1">
        <title></title>
        <link rel="preload" href="css/main.css" as="style">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
<?php
include 'G1.php';
$total = $G1['total'];
$liked = json_encode($G1['likes']);
echo "<script>
var total = " . $total    ."
var liked = " . $liked ."
</script>";
?>
        <h1 class="frontpage">StatTracker</h1>
        <div id="form">
<svg width="300" height="300">
<circle cx="150" cy="150" r="60" stroke="#fff" stroke-width="3" fill="#123456" />
</svg>
<svg width="300" height="200" >
<rect width="60" height="100" fill="#000" stroke="#eee" stroke-width="3" x="60" />
</svg>
        </div>
    <script type="text/javascript">
    </script>
    </body>
</html>


