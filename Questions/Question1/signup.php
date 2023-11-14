<!-- signup.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="styles.css">

    <script>
        function validateForm() {
            var name = document.forms["signupForm"]["name"].value;
            var email = document.forms["signupForm"]["email"].value;
            var phone = document.forms["signupForm"]["phone"].value;
            var address = document.forms["signupForm"]["address"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;

            // Basic validation
            if (!name || !email || !phone || !address || !password || !confirmPassword) {
                alert("Please fill in all fields.");
                return false;
            }

            if (name.length < 10) {
                alert("Name must be at least 10 characters.");
                return false;
            }

            if (password.length < 2 || !/[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[_@$]/.test(password)) {
                alert("Password must have at least 2 characters, 1 uppercase letter, 1 digit, and 1 special character (_@$).");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }

        function submitForm() {
            if (validateForm()) {
                var formData = new FormData(document.getElementById("signupForm"));

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "process.php?action=signup", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Handle the server response
                            console.log(xhr.responseText);
                            alert(xhr.responseText); // Display the response
                            // Redirect to the welcome page after successful signup
                            window.location.replace("welcome.php");
                        } else {
                            alert("Error: " + xhr.statusText);
                        }
                    }
                };
                xhr.send(new URLSearchParams(formData)); // Send the form data
            }
        }
    </script>
</head>
<body>

<h2>Signup Form</h2>
<form id="signupForm" onsubmit="event.preventDefault(); submitForm();">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Phone: <input type="tel" name="phone" required><br>
    Address: <input type="text" name="address" required><br>
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirmPassword" required><br>
    <input type="submit" value="Signup">
</form>
<p>Already have an account? <a href="login.php">Login here</a>.</p>

</body>
</html>
