<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Remaining Medicine Stock</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Manage Remaining Medicine Stock</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Date Purchased</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $lowStockClass = ($row["quantity"] < 50) ? 'low-stock' : '';
                    echo "<tr class='$lowStockClass'>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["medicine_name"] . "</td>
                            <td>" . $row["quantity"] . "</td>
                            <td>" . $row["type"] . "</td>
                            <td>" . $row["date_purchased"] . "</td>
                          </tr>";
                }
            } else {
                echo "No medicine stock available";
            }
            ?>

        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
