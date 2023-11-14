<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    // Common processing for both login and signup
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = ""; // No password in this case
    $database = "form";

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($action == 'signup') {
        // Additional processing for signup
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO form (name, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $address, $hashedPassword);
        $stmt->execute();

        // Check for success
        if ($stmt->affected_rows > 0) {
            echo "Signup successful! User data stored in the database.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($action == 'login') {
        // Verify login credentials
        $stmt = $conn->prepare("SELECT * FROM form WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Check if the provided password matches the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Login successful
                $_SESSION['user_email'] = $email;
                echo "Login successful!";
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "User not found.";
        }

        $stmt->close();
    } else {
        echo "Invalid action.";
    }

    // Close the database connection
    $conn->close();
}
?>
