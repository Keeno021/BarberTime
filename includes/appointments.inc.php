<?php 
include "includes/dbconnection.php";
function getAppointments($conn, $date, $start_time) {
    $appointments = array();
    
    $sql = "SELECT start_time, end_time, user_id FROM appointments WHERE start_time = ? AND date = ?";
    $stmt = mysqli_stmt_init($conn);

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $start_time, $date); 
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }
        $stmt->close();
    }
    return $appointments;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected date and start time from the form
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];

$existing_appointments = getAppointments($conn, $date, $start_time);

// Generate time slots
$start = strtotime('17:00');
$end = strtotime('22:00');
$time_slots = array();

while ($start <= $end) {
    $current_time = date('H:i', $start);
    
    // Check if the time slot is available
    $is_available = true;
    foreach ($existing_appointments as $appointment) {
        $appointment_start = strtotime($appointment['start_time']);
        $appointment_end = strtotime($appointment['end_time']);
        
        if ($start >= $appointment_start && $start < $appointment_end) {
            $is_available = false;
            break;
        }
    }
    
    // Add the available time slot to the array
    if ($is_available) {
        $time_slots[] = $current_time;
    }
    
    $start = strtotime('+30 minutes', $start);
}

}

// Now, $time_slots contains the available time slots
// print_r($time_slots);
?>
