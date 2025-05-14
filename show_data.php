<?php
$conn = new mysqli("localhost", "root", "", "student_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Join both tables to show all info
$sql = "SELECT i.name, i.department, i.reg_number, i.age, i.year, i.gpa,
               s.dsa, s.java, s.python, s.cloud_computing, s.cybersecurity, s.web_dev
        FROM students_info i
        JOIN students_scores s ON i.reg_number = s.reg_number";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr>
            <th>Name</th><th>Dept</th><th>Reg#</th><th>Age</th><th>Year</th><th>GPA</th>
            <th>DSA</th><th>Java</th><th>Python</th><th>Cloud</th><th>Cyber</th><th>Web Dev</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td><td>{$row['department']}</td><td>{$row['reg_number']}</td>
                <td>{$row['age']}</td><td>{$row['year']}</td><td>{$row['gpa']}</td>
                <td>{$row['dsa']}</td><td>{$row['java']}</td><td>{$row['python']}</td>
                <td>{$row['cloud_computing']}</td><td>{$row['cybersecurity']}</td><td>{$row['web_dev']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
$conn->close();
?>
