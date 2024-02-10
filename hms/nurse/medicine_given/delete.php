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

    // Fetching medicine_name and quantity to be restored in purchasing_medicine_list
    $sql_fetch = "SELECT medicine_name, quantity FROM given_medicine_list WHERE id = $entry_id";
    $result_fetch = $conn->query($sql_fetch);

    if ($result_fetch->num_rows == 1) {
        $row_fetch = $result_fetch->fetch_assoc();
        $medicine_name = $row_fetch['medicine_name'];
        $quantity = $row_fetch['quantity'];

        // Deleting entry from given_medicine_list
        $sql_delete = "DELETE FROM given_medicine_list WHERE id = $entry_id";

        if ($conn->query($sql_delete) === TRUE) {
            // Restoring quantity in purchasing_medicine_list
            $sql_update = "UPDATE purchasing_medicine_list SET quantity = quantity + $quantity WHERE medicine_name = '$medicine_name'";
            $conn->query($sql_update);

            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting entry: " . $conn->error;
        }
    } else {
        echo "Entry not found.";
    }
}

$conn->close();
?>
