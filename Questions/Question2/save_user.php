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
$email = $_POST['email'];
$phone = $_POST['phone'];
$userClass = $_POST['class'];

// Additional validation if needed
if (!preg_match('/^[A-Za-z]+$/', $name)) {
    echo "Invalid name format";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

if (!preg_match('/^[0|6|9][0-9]{9}$/', $phone)) {
    echo "Invalid phone format";
    exit;
}

if (!in_array($userClass, ['silver', 'gold', 'platinum'])) {
    echo "Invalid class";
    exit;
}

$sql = "INSERT INTO users (name, email, phone, class) VALUES ('$name', '$email', '$phone', '$userClass')";
if ($conn->query($sql) === TRUE) {
    echo "User details saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
