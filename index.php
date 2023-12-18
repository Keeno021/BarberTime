<?php 
session_start();
include "includes/header.php";
include "includes/appointments.inc.php";
include "includes/calandar.php";
?>
<section class="content">
    <div class="container">
        <!-- <div class="row mb-5"> -->
            <?php 
                if (isset($_SESSION['admin'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. ' as admin</h4>';
                } else if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. '</h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';
                }
            ?>
        <!-- </div> -->
        <div class="row mt-5">
            <div class="col-sm-4">
                <div class="inner-div">
                    <h4 class="text-primary">Elevate Your Style</h4>
                    <p>Welcome to BarberTime – Your Premier Destination for Exceptional Men's Haircuts in Alkmaar,
                        Heerhugowaard, and Beyond!</p>
                    <p>Are you in search of a cutting-edge barber shop that understands the art of men's grooming? Look
                        no
                        further than BarberTime...</p>
                    <p><a href="agenda.php" class="btn btn-primary">Book Your Appointment</a></p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="inner-div">
                    <h4 class="text-primary">The BarberTime Experience</h4>
                    <p>When you step into BarberTime, you're not just getting a haircut – you're immersing yourself in a
                        unique grooming experience...</p>
                    <p>Our friendly and professional barbers create an inviting atmosphere where you can relax and
                        unwind
                        while receiving a haircut that reflects your personality...</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="inner-div">
                    <h4 class="text-primary">Services Tailored for You</h4>
                    <p>Whether you're looking for a classic haircut, a modern fade, or a beard trim that's on point,
                        BarberTime has you covered...</p>
                    <p>Ready to elevate your grooming game? Schedule your appointment with BarberTime today and discover
                        why
                        we are the preferred choice for men's haircuts...</p>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<?php include "includes/footer.php";?>