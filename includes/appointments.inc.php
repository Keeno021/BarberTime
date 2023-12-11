<?php 
include "includes/dbconnection.php";
function getAppointments($conn, $date, $start_time) {
    $appointments = array();
    
    $sql = "SELECT start_time, end_time, user_id FROM appointments WHERE start_time = ? AND date = ?";
    $stmt = mysqli_stmt_init($conn);

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $date, $start_time);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }
        $stmt->close();
    }
    return $appointments;
}

$date = date('Y-m-d');
$existing_appointments = getAppointments($conn, $date, $start_time);

// Generate time slots
$start = strtotime('17:00');
$end = strtotime('22:00');
$time_slots = array();
while ($start <= $end) {
    $time = date('H:i', $start);
    
    // Check if the time slot is available
    $is_available = true;
    foreach ($existing_appointments as $appointment) {
        $start_time = strtotime($appointment['start_time']);
        $end_time = strtotime($appointment['end_time']);
        
        if ($start_time <= $start && $end_time > $start) {
            $is_available = false;
            break;
        }
    }
    
    // Add the available time slot to the array
    if ($is_available) {
        $time_slots[] = $time;
    }
    
    $start = strtotime('+30 minutes', $start);
}

// $time_slots now contains available time slots for the selected date
// print_r($time_slots);
