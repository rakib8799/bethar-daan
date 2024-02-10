<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicineName = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];
    $type = $_POST["type"];
    $date = $_POST["date"];

    $sql = "INSERT INTO medicine (medicine_name, quantity, type, date_purchased) 
            VALUES ('$medicineName', $quantity, '$type', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine stock added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Purchase Medicine Stock</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Manage Purchase Medicine Stock</h2>
        <form method="post" action="purchase.php">
            Medicine Name: <input type="text" name="medicine_name" required><br>
            Quantity: <input type="number" name="quantity" required><br>
            Type: <input type="text" name="type" required><br>
            Date: <input type="date" name="date" required><br>
            <input type="submit" value="Add Medicine Stock">
        </form>
    </div>
</body>
</html>
