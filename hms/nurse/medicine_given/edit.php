<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Edit Entry</h2>

    <?php
    $servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $entry_id = $_GET['id'];

        $sql = "SELECT * FROM given_medicine_list WHERE id = $entry_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $medicine_name = $row['medicine_name'];
            $quantity = $row['quantity'];
            $date = $row['date'];
        } else {
            echo "Entry not found.";
            exit();
        }
    } else {
        echo "Entry ID not provided.";
        exit();
    }
    ?>

    <form action="update.php" method="post">
        <input type="hidden" name="entry_id" value="<?php echo $entry_id; ?>">

        <label for="medicine_name">Medicine Name:</label>
        <input type="text" name="medicine_name" value="<?php echo $medicine_name; ?>" readonly>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $quantity; ?>" required>

        <label for="date_given">Date Given:</label>
        <input type="date" name="date" value="<?php echo $date; ?>" required>

        <button type="submit">Update Entry</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("update-btn").addEventListener("click", function () {
                var xhr = new XMLHttpRequest();
                var formData = new FormData(document.getElementById("edit-form"));
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Redirect to index.php after successful update
                        window.location.href = "index.php";
                    }
                };
                xhr.open("POST", "update.php", true);
                xhr.send(formData);
            });
        });
    </script>
</body>
</html>
