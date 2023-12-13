<?php
session_start();
include "includes/header.php";
include "includes/appointments.inc.php";

if (isset($_SESSION['admin']) || isset($_SESSION['username'])) {
    ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
            <h1 class="mt-5">Create Appointment</h1>
            <form action="includes/create_appointment.php" method="post">
                <?php
                $selectedDate = isset($_GET['date']) ? $_GET['date'] : '';
                if (!$selectedDate) {
                    header("location: ../index.php?error=pleaseselecdate");
                exit();
                } else {
                    echo '<div class="form-group">';
                    echo '<label for="selected_day">Selected Day: </label>';
                    echo '<input class="form-control" type="text" id="date" name="date" value="' . $selectedDate . '" readonly>';
                    echo '</div>';
                }
                ?>

                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $_SESSION['username']; ?>" aria-describedby="username"
                        placeholder="Enter username" readonly>
                </div>

                <div class="form-group">
                    <label for="start_time">Available Time Slots:</label>
                    <select class="form-control" id="start_time" name="start_time" required>
                        <?php
                        
                foreach ($timeSlots as $timeSlot) {
                    $isAvailable = true;

    // Check if the current time slot is in the appointments
    foreach ($appointments as $appointment) {
        $startDateTime = new DateTime($selectedDate . ' ' . $timeSlot);
        $endDateTime = new DateTime($selectedDate . ' ' . $appointment['end_time']);

        // Check if the time slot overlaps with any existing appointment
        if ($startDateTime >= new DateTime($selectedDate . ' ' . $appointment['start_time']) &&
            $startDateTime < $endDateTime) {
            $isAvailable = false;
            break;
        }
    }

    // Display time slot if available
    if ($isAvailable) {
        echo '<option value="' . $timeSlot . '">' . $timeSlot . '</option>';
    }
}

                        ?>
                    </select>
                </div>
                <button type="submit" name="create_appointment" class="btn btn-primary mt-4">Create
                    Appointment</button>
            </form>
        </div>
        <div class="col-sm-3">
            <?php
            if (isset($_SESSION['admin'])) {

                //Display times in order
                usort($appointments, function ($a, $b) {
                    return strtotime($a['start_time']) - strtotime($b['start_time']);
                });
                
                echo '<h2 class="mt-5">Appointments</h2>';
                echo '<ol>';
                foreach ($appointments as $appointment) {
                    echo '<li>' . $appointment['start_time'] . ' - ' . $appointment['end_time'] . ' ' . $appointment['username'] . '</li>';
                }
                echo '</ul>';
            
            }
            ?>
        </div>
    </div>
</div>
<?php
}
?>
<?= include "includes/footer.php";?>