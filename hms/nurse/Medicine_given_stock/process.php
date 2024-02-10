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
    $medicine_name = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];

    $sql = "INSERT INTO given_medicine_list (medicine_name, quantity, date) VALUES ('$medicine_name', $quantity, '$date')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
