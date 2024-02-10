<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry_id = $_POST["entry_id"];
    $medicine_name = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];

    $sql = "UPDATE purchasing_medicine_list SET medicine_name = '$medicine_name', quantity = $quantity, date_added = '$date' WHERE id = $entry_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating entry: " . $conn->error;
    }
}

$conn->close();
?>
