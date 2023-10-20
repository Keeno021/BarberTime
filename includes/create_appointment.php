<?php
if (isset($_POST["create_appointment"])) {
    require_once dirname(__FILE__).'/config.php';
    include INCLUDES_PATH . 'dbconnection.php'; 
    include INCLUDES_PATH . 'appointments.inc.php'; 


    $username = $_POST["username"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];

    if (empty($username) || empty($date) || empty($start_time)) {
        header("location: ../index.php?error=emptyfields");
        exit();
    } else {
        // Get the user's username from the session
        session_start();
        if (isset($_SESSION['username'])) {
            $session_username = $_SESSION['username'];
        } else {
            header("location: ../index.php?error=loginorsignuptomakeappointment");
            exit();
        }

        // Check if the appointment time is already taken
        $sql = "SELECT start_time, date FROM appointments WHERE start_time = ? AND date = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $start_time, $date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("location: ../index.php?error=timetaken=" . $start_time);
            exit();
        } else {
            // Insert the appointment into the database
            $user_id = getUserID($conn, $username);
            $end_time = date('H:i', strtotime('+30 minutes', strtotime($start_time)));

            if ($user_id) {
                $sql = "INSERT INTO appointments (date, start_time, end_time, user_id) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $date, $start_time, $end_time, $user_id);
                    if (mysqli_stmt_execute($stmt)) {
                        // Appointment inserted successfully
                        header("location: ../index.php?appointment=created");
                        exit(); 
                    } else {
                        header("location: ../index.php?error=sqlerror");
                        exit();
                    }
                } else {
                    header("location: ../index.php?error=sqlerror");
                    exit();
                }
            } else {
                header("location: ../index.php?error=user_not_found");
                exit();
            }
        }
    }

}

// Function to retrieve user_id based on username
function getUserID($conn, $username) {
    $user_id = null;
    $query = "SELECT idUsers FROM users WHERE username = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->fetch();
    }
    
    return $user_id;
}
