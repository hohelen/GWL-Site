<?php
include('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'tmei'; // Default user ID
}

if (isset($_POST['save-event'])) {
    $username = $_SESSION['username']; // assuming you have the userID stored in a session variable
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $details = $_POST['details'];
    $stmt = $connection->prepare("INSERT INTO events (username, title, start_date, start_time, end_date, end_time, details) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$username, $title, $start_date, $start_time, $end_date, $end_time, $details);
    // Execute query and check for success
    if ($stmt->execute()) {
        header('Location: events.php');
        exit();
    } else {
        $msg = "Event not created";
    }

    // Close statement
    $stmt->close();
}
?>