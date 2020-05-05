<?php
//Dumb check for origin
if (!isset($_POST["login"])) {
    header("Location: ../index.php");
    exit();
}
else {
    require 'config.php';

    $user = $conn->real_escape_string($_POST["username"]);

    //Here we check for the user with the credentials entered
    $usercheck = mysqli_query($conn, "SELECT * FROM Users WHERE username=\"$user\"");

    //This fetches the associations in $usercheck, and sends
    //the user back to the index if it is empty
    if (!empty($userdata = $usercheck->fetch_assoc())) {
        if (password_verify($pass, $_POST["password"])) {
            header("Location: ../surveys/surveys.html");
            exit();
        }
        else {
            header("Location: ../index.php?origin=log&err=1");
            exit();
        }
    }
    else {
        header("Location: ../index.php?origin=log");
        exit();
    }
    mysqli_close($conn);
}
?>
