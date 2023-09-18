<?php 
include "includes/dbconnection.php"; 
include "includes/header.php";
?>
<div class="container">
    <div class="row mt-5">
    <div class="col-sm-3"></div>
        <div class="col">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username" aria-describedby="username"
                        placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary mt-2">Login</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<?php
if (isset($_POST["login"])) {
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