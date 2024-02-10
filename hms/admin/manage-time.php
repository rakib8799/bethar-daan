<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

$beds = array();
	$sql = "SELECT * FROM bed";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $beds[] = $row;
    }

} 

if (isset($_POST['update_bed_status'])) {
    $bedId = $_POST['bed_id'];
    $newStatus = $_POST['bed_status'];
	$sql = "UPDATE bed SET booked = $newStatus WHERE id = $bedId";
    mysqli_query($con, $sql);

}
if (isset($_POST['submit'])) {
	$sql = "INSERT INTO bed(booked) VALUES('0')";
    $result=mysqli_query($con, $sql);
	if($result){
		$_SESSION['msg']="Bed Issued Successfully !!";
		header('location:manage-bed.php');
	}
	else{
		$_SESSION['msg']="Error : Bed Not Issued";
	}

}

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
<h1 class="mainTitle">Admin | Time Management</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>Time Management</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Time <span class="text-bold">MANAGEMENT</span></h5>


<!DOCTYPE html>
<html>
<head>
    <title>Time Management - Admin Dashboard</title>
</head>
<body>

	<form action="" method="post">
	<button type="submit" name="submit" class="btn btn-primary">
			Add New time
		</button>
	</form>

    <h1>View time </h1>

    <table class="table table-striped">
        <tr>
            <th>Time Number</th>
            <th>Issued by (Doctor Id) </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($beds as $bed): ?>
            <tr>
                <td><?php echo $bed['id']; ?></td>
                <td><?php echo $bed['doctor']; ?></td>
                <td><?php echo $bed['booked']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="bed_id" value="<?php echo $bed['id']; ?>">
                        <select name="bed_status">
							<?php if($bed['booked']): ?>
                            <option value="0">Vacant</option>
                            <option selected value="1">Occupied</option>
							<?php else: ?>
								<option selected  value="0">Vacant</option>
                            <option value="1">Occupied</option>
							<?php endif; ?>
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
