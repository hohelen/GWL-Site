<?php
    session_start(); 
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
<script>
    // Encode PHP session data into JSON and log it in the browser console
    const sessionData = <?php echo json_encode($_SESSION, JSON_PRETTY_PRINT | JSON_HEX_TAG); ?>;
    console.log("PHP Session Data:", sessionData);
</script>
<body>
    <div id="header-container"></div>
    <div class="page-title-container">
        <img class="profile-bg" src="../../Components/Assets/ark2.png">
        <p class="profile-text">HELLO <?php echo htmlspecialchars(strtoupper($_SESSION['firstname'])); ?></p>
    </div>
    <div id="footer-container"></div>
    <script src="../Header/header.js"></script>
    <script src="../Footer/footer.js"></script>
</body>
</html>