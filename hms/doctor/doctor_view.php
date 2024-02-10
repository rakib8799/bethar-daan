<?php
// doctor_view.php

// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM medical_history";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <title>Doctor - Medical History View</title>
</head>
<body>
    <div class="container">
	
        <h2>Doctor - Medical History List</h2>
        <table>
            <tr>
                <th>File Name</th>
                <th>Uploaded By</th>
                <th>Date Uploaded</th>
                <th>Action</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['file_name']}</td>
                                <td>{$row['uploaded_by']}</td>
                                <td>{$row['date_uploaded']}</td>
                                <td><a href='view_file.php?id={$row['id']}' target='_blank'>View</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No files available.</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
