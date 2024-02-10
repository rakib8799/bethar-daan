<?php
// Use your database connection details
  define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM medicine_stock WHERE type='sale'");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["medicine_name"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td><a href='edit_sell.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_sell.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No entries found</td></tr>";
}

$conn->close();
?>
