<?php
if (isset($_POST["login"])) {
    include "../includes/dbconnection.php"; 

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($password) || empty($username)) {
        header("location: ../index.php?error=emptyfields");
        exit(); 
    } else {
        $sql = "SELECT * FROM users WHERE username=? or admin=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
        exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username,$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                
                if ($pwdCheck == false) {
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                } else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['idUsers'] = $row['idUsers'];
                    $_SESSION['username'] = $row['username'];

                    if ($row['admin'] == null) {
                        header("location: ../index.php?login=success");
                        exit();
                    } else {
                        header("location: ../admin/admin.php?login=success");
                        session_start();
                        $_SESSION['admin'] = $row['admin'];
                        exit();
                    }
                   

                } 
                else {
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}