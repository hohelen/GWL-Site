
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gator Weightlifting</title>
    <link rel="stylesheet" href="../../Components/Overall/overall.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="../E-board/eboard.css">
</head>
<script>
    // Pass PHP session data to JavaScript as JSON
    const sessionData = <?php echo json_encode($_SESSION, JSON_PRETTY_PRINT | JSON_HEX_TAG); ?>;
    console.log("PHP Session Data:", sessionData);
</script>
<body>
    <div id="header-container"></div>
    <div class="page-title-container">
        <h1>E-board</h1>
    </div>
    <div class="eboard-row">
        <div class="eboard-group">
            <p class="name">Julian Maldonado</p>
            <p class="position">President</p>
            <p class="major">Electrical Engineering</p>
            <img src="../../Components/Eboard/julian.jpg"/>
        </div>
        <div class="eboard-group">
            <p class="name">Joshua Lamb</p>
            <p class="position">Vice President</p>
            <p class="major">Artificial Intelligence Systems</p>
            <img src="../../Components/Eboard/joshua.jpg"/>
        </div>
        <div class="eboard-group">
            <p class="name">Sofia Northrup</p>
            <p class="position">Senior Treasurer</p>
            <p class="major">Information Systems</p>
            <img src="../../Components/Eboard/sofia.jpg"/>
        </div>
    </div>
    <div class="eboard-row">
        <div class="eboard-group">
            <p class="name">Yona Ovdiyenko</p>
            <p class="position">Secretary</p>
            <p class="major">Applied Physiology & Kinesiology</p>
            <img src="../../Components/Eboard/yona.jpg"/>
        </div>
        <div class="eboard-group">
            <p class="name">Vanay Lyttle</p>
            <p class="position">Event Coordinator</p>
            <p class="major">Women's Studies</p>
            <img src="../../Components/Eboard/vanay.jpg"/>
        </div>
        <div class="eboard-group">
            <p class="name">Elijah Dy</p>
            <p class="position">Social Director</p>
            <p class="major">Applied Physiology & Kinesiology</p>
            <img src="../../Components/Eboard/elijah.jpg"/>
        </div>
    </div>
    <div class="eboard-row">
        <div class="eboard-group">
            <p class="name">Angela Philistin</p>
            <p class="position">Junior Treasurer Chair</p>
            <p class="major">Biomedical Engineering</p>
            <img src="../../Components/Eboard/angela.png"/>
        </div>
        <div class="eboard-group">
            <p class="name">Nicholas Solar</p>
            <p class="position">Merchandise Chair</p>
            <p class="major">Architecture</p>
            <img src="../../Components/Eboard/nick.jpg"/>
        </div>
        <div class="eboard-group">
            <p class="name">Yiwen Wu</p>
            <p class="position">Public Relations Chair</p>
            <p class="major">Mechanical Engineering</p>
            <img src="../../Components/Eboard/yiwen.jpg"/>
        </div>
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