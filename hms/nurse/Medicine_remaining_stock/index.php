<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remaining Medicine List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr.below-50 {
            background-color: #ff8080;
        }
    </style>
</head>
<body>
  <a href="../dashboard.php" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Go to Dashboard</a>
    <h2>Remaining Medicine List</h2>

    <?php
    $servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate remaining medicine quantity
    $sql = "SELECT p.medicine_name, p.quantity - IFNULL(g.quantity, 0) AS remaining_quantity
            FROM purchasing_medicine_list p
            LEFT JOIN (
                SELECT medicine_name, SUM(quantity) AS quantity
                FROM given_medicine_list
                GROUP BY medicine_name
            ) g ON p.medicine_name = g.medicine_name";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Medicine Name</th>
                    <th>Remaining Quantity</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            $medicine_name = $row['medicine_name'];
            $remaining_quantity = $row['remaining_quantity'];

            echo "<tr" . ($remaining_quantity < 50 ? " class='below-50'" : "") . ">
                    <td>{$medicine_name}</td>
                    <td>{$remaining_quantity}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No entries found.";
    }

    $conn->close();
    ?>
</body>
</html>
