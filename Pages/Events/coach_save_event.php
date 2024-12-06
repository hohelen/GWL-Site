<!-- 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'tmei'; // Default user ID
}

if (isset($_POST['coach-save-event'])) {
    $username = $_POST['username']; // assuming you have the userID stored in a session variable
    $title = 'Practice';
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $details = $_POST['details'];
    // Prepare SQL according to whether time fields are provided
    $stmt = $connection->prepare("INSERT INTO events (username, title, start_date, start_time, end_date, end_time, details) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$username, $title, $start_date, $start_time, $end_date, $end_time, $details);
    // Execute query and check for success
    if ($stmt->execute()) {
        header('Location: coach-events.php');
        exit();
    } else {
        $msg = "Event not created";
    }

    // Close the statement
    $stmt->close();
}
?> -->
<!-- <?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

// Include connection and start session
include('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    // This should usually be a redirect to login, using 'tmei' for your context
    $_SESSION['username'] = 'tmei';
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username']; // From the form selection
    $title = 'Practice';  // Static title or you can make it dynamic
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $details = $_POST['details'];

    // Check if the username exists in the users table
    $userCheckStmt = $connection->prepare("SELECT username FROM users WHERE username = ?");
    $userCheckStmt->bind_param("s", $username);
    $userCheckStmt->execute();
    $userCheckStmt->store_result();

    if ($userCheckStmt->num_rows > 0) {
        $userCheckStmt->close();

        // Prepare SQL statement
        $stmt = $connection->prepare(
            "INSERT INTO events (username, title, start_date, start_time, end_date, end_time, details) 
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        if ($stmt === false) {
            error_log('Prepare failed: ' . htmlspecialchars($connection->error));
            die('Prepare failed: ' . htmlspecialchars($connection->error));  // For direct feedback when debugging
        }

        $stmt->bind_param("sssssss", $username, $title, $start_date, $start_time, $end_date, $end_time, $details);

        // Execute the query and handle the result
        if ($stmt->execute()) {
            $stmt->close();
            $connection->close();
            // Redirect back to the events-coach page
            header('Location: events-coach.php');
            exit();
        } else {
            // Record the error message
            error_log('Execute failed: ' . htmlspecialchars($stmt->error));
            die('Execute failed: ' . htmlspecialchars($stmt->error));  // For direct feedback when debugging
        }
    } else {
        // Username not found in users table
        $userCheckStmt->close();
        error_log('Username not found: ' . htmlspecialchars($username));
        die('Username not found: ' . htmlspecialchars($username));  // For direct feedback when debugging
    }
} else {
    // If the form wasn't submitted properly, redirect back
    header('Location: events-coach.php');
    exit();
}
?> -->