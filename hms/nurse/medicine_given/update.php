<?php
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry_id = $_POST["entry_id"];
    $quantity = $_POST["quantity"];
    $date_given = $_POST["date_given"];

    $sql_update = "UPDATE given_medicine_list SET quantity = $quantity, date_given = '$date_given' WHERE id = $entry_id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating entry: " . $conn->error;
    }
}

$conn->close();
?>
