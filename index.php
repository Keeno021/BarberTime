<?php 
session_start();
include "includes/header.php";
?>
<div class="container">
    <div class="row mt-5">
    <div class="col-sm-3"></div>
        <div class="col">
            <h1>Main page</h1>
            <?php 
                if (isset($_SESSION['username'])) {
                    echo '<p>You are logged in</p>';
                } else {
                    echo '<p>You are not logged in</p>';
                }
            ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>