<!-- login.php -->
<?php
session_start(); // Ensure session_start() is present at the beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">

    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            // Basic validation
            if (!email || !password) {
                alert("Please enter both email and password.");
                return false;
            }

            return true;
        }

        function submitForm() {
            if (validateForm()) {
                var formData = new FormData(document.getElementById("loginForm"));

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "process.php?action=login", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the server response, if needed
                        console.log(xhr.responseText);
                        // Redirect to the welcome page after successful login
                        window.location.replace("welcome.php");
                    }
                };
                xhr.send(formData);
            }
        }
    </script>
</head>
<body>

<h2>Login Form</h2>
<form id="loginForm" onsubmit="event.preventDefault(); submitForm();">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>

</body>
</html>
