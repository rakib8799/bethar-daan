<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $availability_status = $_POST['availability_status'];

    // Check if the location already exists in the database
    $sql = "SELECT * FROM ambulance_availability WHERE location = '$location'";
    $ret = $con->query($sql);

    if ($ret->num_rows > 0) {
        // Location exists, update the record
        $sql = "UPDATE ambulance_availability SET availability_status = '$availability_status' WHERE location = '$location'";
    } else {
        // Location doesn't exist, insert a new record
        $sql = "INSERT INTO ambulance_availability (location, availability_status) VALUES ('$location', '$availability_status')";
    }

    if ($con->query($sql) === TRUE) {
        echo "Ambulance availability updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}





  }
?>
