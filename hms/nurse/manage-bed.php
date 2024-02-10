<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | View Beds</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | Bed Management</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>Bed Management</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">BED <span class="text-bold">MANAGEMENT</span></h5>

<?php
// Include your database connection code here
// Example:
// include 'db_connection.php';

// Function to retrieve all beds from the database
function getAllBeds() {
    // Implement your SQL query to fetch all beds from the database
    // Example:
    // $sql = "SELECT * FROM beds";
    // $result = mysqli_query($connection, $sql);
    // return mysqli_fetch_all($result, MYSQLI_ASSOC);
    return array(
        array('id' => 1, 'bed_number' => '101', 'status' => 'Vacant'),
        array('id' => 2, 'bed_number' => '102', 'status' => 'Occupied'),
        array('id' => 3, 'bed_number' => '103', 'status' => 'Vacant'),
        // Add more data as needed
    );
}

// Function to update the status of a bed
function updateBedStatus($bedId, $newStatus) {
    // Implement your SQL query to update the bed status in the database
    // Example:
    // $sql = "UPDATE beds SET status = '$newStatus' WHERE id = $bedId";
    // mysqli_query($connection, $sql);
    // return mysqli_affected_rows($connection) > 0;
    return true; // For the sake of this example, assume the update is always successful
}

// Check if a form is submitted to update bed status
if (isset($_POST['update_bed_status'])) {
    $bedId = $_POST['bed_id'];
    $newStatus = $_POST['bed_status'];

    if (updateBedStatus($bedId, $newStatus)) {
        // Status updated successfully
        // You can redirect or display a success message here
        header('Location: bed.php');
        exit;
    } else {
        // Error occurred during status update
        // You can redirect or display an error message here
    }
}

// Fetch all beds from the database
$beds = getAllBeds();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bed Management - Admin Dashboard</title>
</head>
<body>
    <h1>View Bed </h1>

    <table>
        <tr>
            <th>Bed ID</th>
            <th>Bed Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($beds as $bed): ?>
            <tr>
                <td><?php echo $bed['id']; ?></td>
                <td><?php echo $bed['bed_number']; ?></td>
                <td><?php echo $bed['status']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="bed_id" value="<?php echo $bed['id']; ?>">
                        <select name="bed_status">
                            <option value="Vacant">Vacant</option>
                            <option value="Occupied">Occupied</option>
                        </select>
                        <button type="submit" name="update_bed_status">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>





			<!-- start: FOOTER -->
	<!-- <?php include('include/footer.php');?> -->
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>
