<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Use your database connection details
     define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM medicine_stock WHERE id = $id");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $medicine_name = $row["medicine_name"];
        $quantity = $row["quantity"];
        $type = $row["type"];
        $date = $row["date"];
    } else {
        echo "Entry not found.";
        exit;
    }

    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale Medicine Stock Entry</title>
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

<div class="container">
    <h2>Edit Sale Medicine Stock Entry</h2>

    <!-- Form to edit sale entry -->
    <form action="update_sell.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="medicine_name">Medicine Name:</label>
        <input type="text" name="medicine_name" value="<?php echo $medicine_name; ?>" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $quantity; ?>" required>

        <label for="type">Type:</label>
        <input type="text" name="type" value="<?php echo $type; ?>" required>

        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo $date; ?>" required>

        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>
