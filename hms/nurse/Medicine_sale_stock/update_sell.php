<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use your database connection details
      define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];
    $medicine_name = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];
    $type = $_POST["type"];
    $date = $_POST["date"];

    $sql = "UPDATE medicine_stock SET medicine_name='$medicine_name', quantity=$quantity, type='$type', date='$date' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_sell.php");
    } else {
        echo "Error updating entry: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
