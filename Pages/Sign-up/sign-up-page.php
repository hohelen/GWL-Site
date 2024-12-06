<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gator Weightlifting</title>
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Overall/overall.css">
    <link rel="stylesheet" href="../Sign-up/sign-up.css">
    <link rel="stylesheet" href="../Footer/footer.css">

</head>
<script>
    // Pass PHP session data to JavaScript as JSON
    const sessionData = <?php echo json_encode($_SESSION, JSON_PRETTY_PRINT | JSON_HEX_TAG); ?>;
    console.log("PHP Session Data:", sessionData);
</script>
<body>
    <div id="header-container"></div>
    <div class ="sign-up-container">
        <div class ="inner-sign-up-container">
        <h1 class = "title">Sign Up</h1>
        <form action ="sign-up.php" method="post">
            <div>
                <input type ="text" name="firstname" id="firstname-input" placeholder="First Name">
            </div>
            <div>
                <input type ="text" name="lastname" id="lastname-input" placeholder="Last Name">
            </div>
            <select name="usertype" id="usertype-input" placeholder="User Type">     
                <option value="Member">Member</option>
                <option value="Officer">Officer</option>
                <!-- If Officer or Coach: show access code option that member must submi -->
                <option value="Coach">Coach</option>
            </select>
            <div>
                <input type ="text" name="access-code" id="access-code-input" placeholder="Access Code">
            </div>
            <div>
                <input type ="email" name="email" id="email-input" placeholder="Email">
            </div>
            <div>
                <input type ="text" name="username" id="username-input" placeholder="Username">
            </div>
            <div>
                <input type ="password" name="password" id="password-input" placeholder="Password">
            </div>
            <div>
                <input type ="password" name="repeat-password" id="repeat-password-input" placeholder="Repeat Password">
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p class="new-text">Already have an account? <a href="../Login/login.html">Login</a></p>
        </div>
    </div>
    <div id="footer-container"></div>
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
    <script src="../Footer/footer.js"></script>
</body>
</html>