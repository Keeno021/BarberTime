<?php
include "../includes/dbconnection.php"; 

if (isset($_POST["signup"])) {
     
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email)  VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=sqlerror");
        exit();
    } else {
        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $hashPwd, $email);
        mysqli_stmt_execute($stmt);
        header("location: ../signup.php?signup=success");
        exit(); 
    }
    } else {
        header("location: ../signup.php");
        exit();
    }
?>