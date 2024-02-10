<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT medicine_name FROM purchasing_medicine_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['medicine_name']}'>{$row['medicine_name']}</option>";
    }
} else {
    echo "<option value=''>No medicines available</option>";
}

$conn->close();
?>
