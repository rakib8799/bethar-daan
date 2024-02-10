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

    $sql = "DELETE FROM purchasing_medicine_list WHERE id = $entry_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting entry: " . $conn->error;
    }
}

$conn->close();
?>
