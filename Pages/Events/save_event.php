<?php
include('../Login/login.php');  // Include your database connection

if (isset($_POST['title']) && isset($_POST['start_date']) && isset($_POST['start_time']) && isset($_POST['end_date']) && isset($_POST['end_time'])) {
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];
    $description = $_POST['description'];

    $query = "INSERT INTO tbl_event (title, start_date, start_time, end_date, end_time, description) VALUES ('$title', '$start_date', '$start_time', '$end_date', '$end_time', '$description')";
    if (mysqli_query($connection, $query)) {  // Assuming $connection is your database connection variable
        echo "Event created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Invalid input";
}
mysqli_close($connection);
?>