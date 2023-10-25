<?php 
session_start();
include "includes/header.php";
include "includes/appointments.inc.php";
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
            ?>
                <?php 
            if (isset($_SESSION['admin']) || isset($_SESSION['username'])) {
                ?>
                <h1 class="mt-5">Create Appointment</h1>
                <form action="includes/create_appointment.php" method="post">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $_SESSION['username']; ?>" aria-describedby="username"
                            placeholder="Enter username" readonly>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <!-- Dropdown for Start Time -->
                    <div class="form-group">
                        <label for="start_time">Time</label>
                        <?php
        if (empty($is_available)) {
            echo "No available time slots for the selected date.";
        } else {
            // Dropdown for available time slots
            echo '<select class="form-control" id="start_time" name="start_time" required>';
            foreach ($time_slots as $time_slot) {
                echo '<option value="' . $time_slot . '">' . $time_slot . '</option>';
            }
            echo '</select>';
        }
        ?>
                    </div>
                    <button type="submit" name="create_appointment" class="btn btn-primary mt-4">Create
                        Appointment</button>
                </form>
                <?php 
            }
        ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
</section>
<?= include "includes/footer.php";?>