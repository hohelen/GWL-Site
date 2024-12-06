<?php
session_start();
include('connection.php');

header('Content-Type: application/json');

// Enable error reporting and log errors
ini_set('log_errors', 1);
ini_set('log_errors', 'error_log.txt');
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'hohelen'; // Default user ID
    $query = "SELECT 
                title, 
                start_date, 
                start_time, 
                end_date, 
                end_time, 
                details 
            FROM 
                events
            WHERE 
                username = ?";

    $stmt = $connection->prepare($query);
    if ($stmt === false) {
        error_log('prepare() failed: ' . htmlspecialchars($connection->error));
        echo json_encode(['error' => 'Query preparation failed']);
        exit;
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        error_log('execute() failed: ' . htmlspecialchars($stmt->error));
        echo json_encode(['error' => 'Query execution failed']);
        exit;
    }

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => $row['title'],
            'start' => $row['start_date'] . 'T' . $row['start_time'],
            'end' => $row['end_date'] . 'T' . $row['end_time'],
            'details' => $row['details']
        ];
    }
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT 
                title, 
                start_date, 
                start_time, 
                end_date, 
                end_time, 
                details 
            FROM 
                events
            WHERE 
                username = ?";

    $stmt = $connection->prepare($query);
    if ($stmt === false) {
        error_log('prepare() failed: ' . htmlspecialchars($connection->error));
        echo json_encode(['error' => 'Query preparation failed']);
        exit;
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        error_log('execute() failed: ' . htmlspecialchars($stmt->error));
        echo json_encode(['error' => 'Query execution failed']);
        exit;
    }

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => $row['title'],
            'start' => $row['start_date'] . 'T' . $row['start_time'],
            'end' => $row['end_date'] . 'T' . $row['end_time'],
            'details' => $row['details']
        ];
    }
}

echo json_encode($events);
?>