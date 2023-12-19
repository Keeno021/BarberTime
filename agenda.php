<?php 
 if (!isset($_SESSION['admin']) || !isset($_SESSION['username'])) {
    header("location: index.php?error=sign_up_or_sign_in");
    exit();
} else {
   // session_start();
include "includes/header.php";
include "includes/appointments.inc.php";
include "includes/calandar.php";
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm mt-5">
                <?php 
               
                    echo $controls;
                    echo draw_calendar($month, $year);
                
            ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
</section>
<?php include "includes/footer.php";
}
?>