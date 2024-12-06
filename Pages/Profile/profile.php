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
    // Pass PHP session data to JavaScript as JSON
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
