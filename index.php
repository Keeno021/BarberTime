<?php 
session_start();
include "includes/header.php";
include "includes/appointments.inc.php";
include "includes/calandar.php";
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm">
                <?php 
                if (isset($_SESSION['admin'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. ' as admin</h4>';
                } else if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. '</h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';
                }

                if (isset($_SESSION['admin']) || isset($_SESSION['username'])) {
                    echo $controls;
                    echo draw_calendar($month, $year);
                }
            ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
</section>
<?php include "includes/footer.php";?>