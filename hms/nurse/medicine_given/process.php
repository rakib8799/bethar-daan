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

    $sql_insert = "INSERT INTO given_medicine_list (medicine_name, quantity, date) VALUES ('$medicine_name', $quantity, '$date')";
    
    if ($conn->query($sql_insert) === TRUE) {
        $sql_update = "UPDATE purchasing_medicine_list SET quantity = quantity - $quantity WHERE medicine_name = '$medicine_name'";
        $conn->query($sql_update);

        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
