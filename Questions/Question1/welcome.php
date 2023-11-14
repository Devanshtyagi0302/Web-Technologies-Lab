<!-- welcome.php -->
<?php
session_start(); // Ensure session_start() is present at the beginning

// Check if the user is logged in
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    echo "<h2>Welcome back, $user_email!</h2>";
} else {
    echo "<h2>Welcome to our Website!</h2>";
    echo "<p>You are not logged in. Please <a href='login.php'>sign in</a> or <a href='signup.php'>sign up</a>.</p>";
}
?>
