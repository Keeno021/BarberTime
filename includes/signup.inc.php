<?php
if (isset($_POST["signup"])) {
    require_once dirname(__FILE__).'/config.php';
    include INCLUDES_PATH . 'dbconnection.php'; 
 

    //Grabbing data from form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Error handeling 
    if(empty($username) || empty($password) ||  empty($email)) {
        header("location: ../index.php?error=emptyfields");
        exit();

    } else {
        // Checking to make sure that username doesnt exist in database
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
    
        } else {
            // Binding string values 
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            // Checking for rows with the same username
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("location: ../index.php?error=usernametaken&mail=".$email);
                exit();
            } else {
                // Insert from into database after error handeling
                $sql = "INSERT INTO users (username, password, email)  VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("location: ../index.php?error=sqlerror");
                exit();

    } else {
        // Making sure password is not visible in database
        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        // Binding string values 
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashPwd, $email);
        mysqli_stmt_execute($stmt);
        header("location: ../index.php?signup=success");
        exit(); 
    }
            }
        }
    }
    } else {
        // Preventing user from entering the page by accident
        header("location: ../index.php");
        exit();
    }