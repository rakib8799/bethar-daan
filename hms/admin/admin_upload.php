<?php
// admin_upload.php

// Database Connection
   $servername = "localhost";
$username = "root";
$password = '';
$dbname = "hms1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // extract($_POST);

    // if (!empty($_FILES['image']['name'])) {
    //     $speaker_image_name = $_FILES['image']['name'];
    //     $speaker_image_tmp_name = $_FILES['image']['tmp_name'];
    //     $image_size = $_FILES['image']['size'];

    //     $path_info = strtolower(pathinfo($speaker_image_name, PATHINFO_EXTENSION));
    //     echo $path_info;
    //     $speaker_image_name = uniqid() . ".$path_info";

    //     $arr = array("jpg", "png", "jpeg");
    //     if (!in_array($path_info, $arr)) {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image format is not supported</p>";
    //     } else if ($image_size >= 5242880) {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image size cannot be larger than 5 MB</p>";
    //     } else {
    //         $timestamps = date("Y-m-d h:i:s", time());

    //         $insert_sql = "INSERT INTO `speakers`(`speaker_name`,`speaker_university`,`speaker_designation`,`speaker_position`,`speaker_topic`,`speaker_country`,`speaker_image`,`speaker_status`,`created_at`) VALUES('$name','$university','$designation','$position','$topic','$country','$speaker_image_name','$speaker_status','$timestamps')";
    //         $run_insert_qry = mysqli_query($conn, $insert_sql);
    //         if ($run_insert_qry) {
    //             move_uploaded_file($speaker_image_tmp_name, "../Images/speaker_images/" . $speaker_image_name);
    //             header("location: view_speaker_details.php");
    //             ob_end_flush();
    //         } else {
    //             echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
    //         }
    //     }
    // } else {
    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
    // }
    $uploadedBy = 'Admin';
    $uploadDir = dirname(__FILE__) . "/uploads/";

    $fileName = $_FILES['upload_file']['name'];
    $filePath = $uploadDir . $fileName;
    // move_uploaded_file($_FILES['upload_file']['tmp_name'], $filePath);
    // echo $filePath;

    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $filePath)) {
        $query = "INSERT INTO medical_history (file_name, uploaded_by, date_uploaded) VALUES ('$fileName', '$uploadedBy', NOW())";

        if ($conn->query($query) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file to the database: " . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <title>Admin - Medical History Upload</title>
</head>
<body>

    <div class="container">
	
        <h2>Admin - Upload Medical History</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="upload_file">Select Upload:</label>
            <input type="file" name="upload_file" id="upload_file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
</body>
</html>
