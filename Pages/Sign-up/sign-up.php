<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "userdb";

    // Access codes
    $correct_member_access_code = "GWLMEMBER2425";
    $correct_officer_access_code = "GWLOFFICER2425";
    $correct_coach_access_code = "GWLCOACH2425";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $required_fields = ['firstname', 'lastname', 'usertype', 'email', 'username', 'password', 'repeat-password'];

    $empty_fields = array_filter($required_fields, function($field) {
        return empty($_POST[$field]);
    });

    if (!empty($empty_fields)) {
        // Redirect to the sign-up page if any required field is empty
        header("Location: ../Sign-up/sign-up-page.php");
        exit();
    }


    // Check if email is valid
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Sign-up/sign-up-page.php");
        exit();
    }

    // Check if email or username in use
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $_POST['email'], $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirect if email or username is already in use
        header("Location: ../Sign-up/sign-up-page.php");
        exit();
    }


    // Check if passwords match
    if ($_POST['password'] !== $_POST['repeat-password']) {
        # ----------- DO THIS ----------------
        # MAKE THE SIGN-UP-PAGE CHANGE TO SIGNIFY THAT THE PASSWORDS DONT MATCH 
        header("Location: ../Sign-up/sign-up-page.php");
        exit();
    }

    // Check if usertype matches access code
    if(($_POST['usertype'] == "Member" && $_POST['access-code'] != $correct_member_access_code) ||
        ($_POST['usertype'] == "Officer" && $_POST['access-code'] != $correct_officer_access_code)||
        ($_POST['usertype'] == "Coach" && $_POST['access-code'] != $correct_coach_access_code)) {
        header("Location: ../Sign-up/sign-up-page.php");
        exit();
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['repeat-password'];


    // Hash password before saving
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, userType, email, username, password) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $firstname, $lastname, $usertype, $email, $username, $password);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['name'] = $firstname; 
        header("Location: ../Profile/Profile.php");
        exit();
    }

    $stmt->close();
    $conn->close();
?>