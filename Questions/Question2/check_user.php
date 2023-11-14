<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ques2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];

if (!preg_match('/^[A-Za-z]+$/', $name)) {
    echo "Invalid name format";
    exit;
}

$sql = "SELECT * FROM users WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "User already exists with the following details:<br>";
    echo "Name: " . $row["name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Phone: " . $row["phone"] . "<br>";
    echo "Class: " . $row["class"] . "<br>";
} else {
    echo '';
}

$conn->close();
?>
