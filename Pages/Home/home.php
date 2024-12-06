<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gator Weightlifting</title>
    <link rel="stylesheet" href="../Home/home.css">
    <link rel="stylesheet" href="../../Components/Overall/overall.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>
<script>
    // Pass PHP session data to JavaScript as JSON
    const sessionData = <?php echo json_encode($_SESSION, JSON_PRETTY_PRINT | JSON_HEX_TAG); ?>;
    console.log("PHP Session Data:", sessionData);
</script>
<body>
    <div id="header-container"></div>
    <div class="welcome-container">
        <img class="club_picture" src="../../Components/Assets/club_picture.png">
        <img class="club_name" src="../../Components/Assets/club_name.png">
    </div>
    <div class="homepage-container">
        <p class="info-header">ABOUT US</p>
        <div class="homepage-inner-container">
            <img class="intro-logo" src="../../Components/Assets/logo3.png">
            <div class="intro-text">
                <p>Established in 2018, our club has steadily grown into the</p>
                <p>premier college weightlifting program it is today. We strive</p>
                <p>to improve our athletes on and off the platform by</p>
                <p>fostering a strong and supportive community that values</p>
                <p>dedication, teamwork, and grit. We hope to hear from you</p>
                <p>or see you at the Ark!</p>
            </div>
        </div>
    </div >
    <div class="achievements-container">
        <img class="achievements-img" src="../../Components/Assets/achievements.png">
        <div class="achievements-inner-container">
            <p class="achievements-title">ACHIEVEMENTS</p>
            <p>2022 & 2024 Women's Team National Champions</p>
            <p>2023 & 2024 Men's Team National Champions</p>
            <p>2023 Coed Team Runner Up</p>
            <p>Multiple Individual National Champions and Medalists</p>
            <p>2023 Southeast Regional Champions</p>
            <p>RecSports Excellence in Health and Wellness by an Organization 2024</p>
        </div>
    </div>
    <div class="practice-container">
            <p class="info-header">PRACTICE SCHEDULE</p>
            <img class="practice-img" src="../../Components/Assets/practice.jpg">
    </div>
    <div id="footer-container"></div>
    <script src="../Footer/footer.js"></script>
    <script>
        async function loadTemplate() {
            // Retrieve the user type from the session data passed to JavaScript
            let userType = sessionData.usertype || 'Guest'; // Default to 'Guest' if usertype is not set
            let templateUrl = '../Header/general-header.html'; // Default template

            // Change the template URL based on the user type
            if (userType === 'Coach') {
                templateUrl = '../Header/coach-header.html';
            } else if (userType === 'Member' || userType === 'Officer') {
                templateUrl = '../Header/internal-header.html';
            }

            // Fetch and load the appropriate header template
            try {
                const response = await fetch(templateUrl);
                const template = await response.text();
                document.getElementById('header-container').innerHTML = template;
            } catch (error) {
                console.error("Failed to load header template:", error);
            }
        }
        loadTemplate();
    </script>
</body>
</html>