<?php
    session_start(); 
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gator Weightlifting</title>
    <link rel="stylesheet" href="../Profile/profile.css">
    <link rel="stylesheet" href="../../Components/Overall/overall.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>
<body>
    <div id="header-container"></div>
    <div class="page-title-container">
        <img class="profile-bg" src="../../Components/Assets/ark2.png">
        <p class="profile-text">HELLO <?php echo htmlspecialchars(strtoupper($name)); ?></p>
    </div>
    <div id="footer-container"></div>
    <script src="../Header/header.js"></script>
    <script src="../Footer/footer.js"></script>
</body>
</html>