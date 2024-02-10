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
    $medicine_name = $_POST["medicine_name"];
    $quantity = $_POST["quantity"];

    // Update quantity in the available medicines table
    $sql_update_quantity = "UPDATE available_medicines SET quantity = quantity - $quantity WHERE medicine_name = '$medicine_name'";
    $conn->query($sql_update_quantity);

    // Add the entry to the given medicine list table
    $sql_add_given = "INSERT INTO given_medicine_list (medicine_name, quantity) VALUES ('$medicine_name', $quantity)";
    
    if ($conn->query($sql_add_given) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql_add_given . "<br>" . $conn->error;
    }
}

$conn->close();
?>
