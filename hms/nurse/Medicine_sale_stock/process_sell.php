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

    $medicine_name = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];
    $type = 'sale'; // Set the type for sale entries
    $date = $_POST["date"];

    $sql = "INSERT INTO medicine_stock (medicine_name, quantity, type, date) VALUES ('$medicine_name', $quantity, '$type', '$date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_sell.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
