<?php
// Database connection
$host = 'localhost';
$db   = 'form';
$user = 'root';
$pass = 'Root';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve POST data
$reg = $_POST['Reg'];  // Reg number should be passed to match the student
$dsa = $_POST['DSA'];
$java = $_POST['Java'];
$python = $_POST['Python'];
$cloud = $_POST['Cloud_Computing'];
$cyber = $_POST['Cybersecurity'];
$web = $_POST['Web_Dev'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students_scores (reg_number, dsa, java, python, cloud_computing, cybersecurity, web_dev) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiiiiii", $reg, $dsa, $java, $python, $cloud, $cyber, $web);

if ($stmt->execute()) {
    echo "Student scores saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
