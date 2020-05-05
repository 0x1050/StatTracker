<?php
if (!isset($_POST['register'])) {
    header("Location: ../index.html");
    exit();
}
else {
    require_once 'config.php';
    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
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
            $sql = "Insert INTO Users(username,  email,      password,      groupNumber, theme)
                               VALUES(\"$user\", \"$email\", \"$password\", \"$group\",  \"1\")";
            echo $sql;
            mysqli_query($conn, $sql);
            header("Location: ../forms/surveys.html");
            exit();
        }
    }
}
?>
