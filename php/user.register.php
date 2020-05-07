<?php
session_start();
if (!isset($_POST['register'])) {
    header("Location: ../index.html");
    exit();
}
else {
    require_once 'table.data.config.php';
    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = password_hash($_POST['email'], PASSWORD_BCRYPT);
    $group = mysqli_real_escape_string($conn, $_POST['group']);
    $password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);

    //Next we create a query to check if the user exist in the database
    $checkForUser = mysqli_query($conn, "SELECT username FROM Users WHERE username=\"$user\"");
    if (!empty($userRow = $checkForUser->fetch_assoc())) {
        mysqli_close($conn);
        header("Location: ../index.php?origin=reg&err=bd");
        exit();
    }
    else { //User does not exist, proceed to verify email address
        //Gather email hashes from database
        $hashes = mysqli_query($conn, "SELECT email FROM Users");
        $emailFound = false;
        while ($row = mysqli_fetch_array($hashes)) {
            if (password_verify($email,  $row["email"])) {
                $emailFound = true;
                break;
            }
        }

        if ($emailFound) {
            mysqli_close($conn);
            header("Location: ../index.php?origin=reg&err=bc");
            exit();
        }
        else {
            //Create user, get primary ID
            mysqli_query($conn, "Insert INTO Users(username, email,      password,      groupNumber, theme)
                                           VALUES(\"$user\", \"$email\", \"$password\", \"$group\",  \"1\")");
            $sql = "SELECT userID FROM Users WHERE username = \"$user\"";
            echo $sql;
            $uid = mysqli_query($conn, $sql)->fetch_assoc()['userID'];
            //Create Token row
            $token = $_SESSION['token'];
            $sql = "INSERT INTO Tokens(uid, token) VALUES(\"$uid\", \"$token\")";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            //Send user to survey
            header("Location: ../survey.php");
            exit();
        }
    }
}
?>
