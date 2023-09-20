<?php include "../includes/dbconnection.php";
include "includes/admin.header.php"; 
session_start();
?>
<div class="container">
    <div class="row mt-5">
    <div class="col-sm-3"></div>
        <div class="col">
            <h1>Main page</h1>
            <?php 
                if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username'].' </h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';
                }
            ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>