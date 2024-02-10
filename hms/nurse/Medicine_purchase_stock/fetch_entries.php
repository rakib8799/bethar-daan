<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM purchasing_medicine_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Medicine Name</th><th>Quantity</th><th>Date</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['medicine_name']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "<td>{$row['date_added']}</td>";
        echo "<td><a href='edit.php?id={$row['id']}' class='edit-link' data-id='{$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}' class='delete-link' data-id='{$row['id']}'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No entries found.";
}

$conn->close();
?>
