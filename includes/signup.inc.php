<?php
include "includes/dbconnection.php"; 

if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res = mysqli_query($conn, "SELECT * FROM adminlogin where username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);
        if(($row['username'] == $username)) {
            $_SESSION['user']=$row['username'];
                header("location: admin/index.php");
        }
        else if(($username == '') && ($password == '')) {
            echo "<script language='javascript'>";
            echo "alert('Invalid Inputs')";
            echo "</script>";
        }
    }
?>