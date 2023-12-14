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