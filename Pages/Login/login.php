<?php
    session_start(); // Move session_start() to the top

    error_reporting(E_ALL);
    ini_set('[REDACTED]', 1);

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
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['firstname'] = $row['firstName'];
        $_SESSION['lastname'] = $row['lastName'];
        $_SESSION['usertype'] = $row['userType'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password']; // consider storing a hashed password instead of plain text

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