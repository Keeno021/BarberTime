<?php 
session_start();
include "includes/header.php";
include 'includes/calendar.inc.php';
$calendar = new Calendar();
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm">
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
<?php echo $calendar; ?>
    </div>
</section>

<?= include "includes/footer.php";?>