<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM given_medicine_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Date </th>
                <th>Actions</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['medicine_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['date']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No entries found.";
}

$conn->close();
?>
