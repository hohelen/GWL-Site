<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gator Weightlifting</title>
    <link rel="stylesheet" href="../Join/join.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="../../Components/Overall/overall.css">
</head>
<script>
    // Pass PHP session data to JavaScript as JSON
    const sessionData = <?php echo json_encode($_SESSION, JSON_PRETTY_PRINT | JSON_HEX_TAG); ?>;
    console.log("PHP Session Data:", sessionData);
</script>
<body>
    <div id="header-container"></div>
    <div class="page-title-container">
        <h1>Join The Club</h1>
    </div>
    <div class="subtitle">
        <p>So you're interested in joining Gator Weightlifting...</p>
    </div>
    <div class="steps-container">
        <div class="step-group">
            <p class="step-title"><span class="step-number">Step 1:</span> Fill out an application.</p>
            <p class="info">If you haven't lifted at a USAW sanctioned event, please fill out the newbies application.</p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfJ0fLPURWwFTFsACZP3hDEcKJwsxgMukRvctBG6__yiwE1Ew/viewform" target="_blank">GWL Application (Newbies)</a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScMS0sCh_FwsRigVgACyBbru1gQmDRLrB10aToTX1O4chb_lg/viewform" target="_blank">GWL Application (Varsity)</a>
        </div>
        <div class="step-group">
            <p class="step-title"><span class="step-number">Step 2:</span> Fill out the RecSports Waiver.</p>
            <p class="info">Required by RecSports</p>
            <a href="https://rsconnect.recsports.ufl.edu/program/GetProgramDetails?courseId=b78354d4-26b8-4a12-8ff3-af85564e3bc4" target="_blank">RecSports Club Waiver</a>
        </div>
        <div class="step-group">
            <p class="step-title"><span class="step-number">Step 3:</span> Fill out the RecSports Club Membership Form.</p>
            <p class="info">Required by RecSports</p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSewyvT5QvhEhrpdiAkQz8h_5-9njx2Ve0BeU0Pl5M6z4lSQKg/viewform" target="_blank">RecSports Club Membership Form</a>
        </div>
        <div class="step-group">
            <p class="step-title"><span class="step-number">Step 4:</span> Join the Group Me.</p>
            <p class="info">Stay connected with the community!</p>
            <a href="https://groupme.com/join_group/95512588/QV7s9mbZ" target="_blank">GWL Group Me</a>
        </div>
        <div class="step-group">
            <p class="step-title"><span class="step-number">Step 5:</span> Wait for Coach Mike to email you!</p>
        </div>
    </div>
    <div class="gator">
        <img src="../../Components/Assets/blue_gator.png" />
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