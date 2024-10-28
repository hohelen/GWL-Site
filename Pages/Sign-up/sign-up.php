<?php
    $firstname = $_POST['firstName'];
    $lastname = $_POST['firstName'];
    $usertype = $_POST['usertype'];
    $email = $_POST['firstName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'test');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, userType, email, username, password)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi",$firstname, $lastname, $usertype, $email, $username, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>