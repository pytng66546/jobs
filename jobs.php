<?php
include 'config.php'; // Database connection

// Retrieve jobs
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "Job Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
}

// Post a job
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $employer_id = $_SESSION['userid']; // the employer is logged in

    $sql = "INSERT INTO jobs (employer_id, title, description, location, salary) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssd", $employer_id, $title, $description, $location, $salary);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "New job posted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
