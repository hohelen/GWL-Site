<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "userdb";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if username and password match
    $stmt = $conn->prepare("SELECT firstname FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];

        session_start();
        $_SESSION['name'] = $firstname;
        // Redirect if email or username is already in use
        header("Location: ../Profile/Profile.php");        
        exit();
    }
    else {
        header("Location: ../Login/login-page.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();

?>