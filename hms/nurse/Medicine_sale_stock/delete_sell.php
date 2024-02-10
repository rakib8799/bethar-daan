<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

   define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'hms1');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("DELETE FROM medicine_stock WHERE id = $id");

    if ($result) {
        header("Location: index_sell.php");
    } else {
        echo "Error deleting entry: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
