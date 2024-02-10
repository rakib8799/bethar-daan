<?php
// view_file.php

// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Fetch file details from the database
    $query = "SELECT * FROM medical_history WHERE id = $fileId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = "../admin/uploads/" . $row['file_name'];

        // Check if the file exists
        if (file_exists($filePath)) {
            // Display file content
            echo "<h2>Medical History File: {$row['file_name']}</h2>";
            echo "<p>Uploaded By: {$row['uploaded_by']}</p>";
            echo "<p>Date Uploaded: {$row['date_uploaded']}</p>";
            echo "<embed src='{$filePath}' type='application/pdf' width='100%' height='500px'>";
            echo "<br><button onclick='window.print()'>Print</button>";
        } else {
            echo "File not found. Please ensure that the file path is correct.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "File ID not specified.";
}

$conn->close();
?>
