<?php
 include "includes/dbconnection.php"; 
// Function to generate 30min time slots
function generateTimeSlots()
{
    $timeSlots = array();
    $startTime = strtotime('17:00');
    $endTime = strtotime('22:00');

    while ($startTime <= $endTime) {
        $timeSlots[] = date('H:i', $startTime);
        // Add 30min
        $startTime += 30 * 60; 
    }

    return $timeSlots;
}

// Function to fetch available and taken time slots for a given date
function getAppointments($conn, $date)
{
    $appointments = array();

    $sql = "SELECT a.start_time, a.end_time, u.username FROM appointments a 
    INNER JOIN users u ON a.user_id = u.idUsers 
    WHERE a.date = ?";
    $stmt = mysqli_stmt_init($conn);

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }
        $stmt->close();
    }
    return $appointments;
}

// Chosen date
$selectedDate = isset($_GET['date']) ? $_GET['date'] : '';

$timeSlots = generateTimeSlots();

// Appointments for chosen date
$appointments = getAppointments($conn, $selectedDate);
?>
