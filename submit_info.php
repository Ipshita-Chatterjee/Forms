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
$name = $_POST['Name'];
$department = $_POST['Department'];
$reg = $_POST['Reg'];
$age = $_POST['Age'];
$year = $_POST['Year'];
$gpa = $_POST['GPA'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students_info (name, department, reg_number, age, year, gpa) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiisd", $name, $department, $reg, $age, $year, $gpa);

if ($stmt->execute()) {
    echo "Student info saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
