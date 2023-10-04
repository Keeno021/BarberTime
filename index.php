<?php 
session_start();
include "includes/header.php";
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm">
                <h1>Main content</h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. ' as admin</h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';
                }
            ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>