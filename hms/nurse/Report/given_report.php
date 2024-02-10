<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Given Medicine Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin: 20px;
        }

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

        button {
            display: block;
            margin: 20px auto;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
  <a href="../dashboard.php" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Go to Dashboard</a>
    <h2>Given Medicine Report</h2>

    <?php
    $servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-d');
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT medicine_name, quantity, date
                FROM given_medicine_list
                WHERE date BETWEEN '$start_date' AND '$end_date'
                ORDER BY date";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['medicine_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['date']}</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No entries found between the selected date range.";
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required value="<?php echo $start_date; ?>">

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" required value="<?php echo $end_date; ?>">

        <button type="submit">Generate Report</button>
    </form>

    <button onclick="window.print()">Print Report</button>

    <?php $conn->close(); ?>
</body>
</html>
