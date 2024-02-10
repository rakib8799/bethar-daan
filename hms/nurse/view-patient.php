<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert tblmedicalhistory(PatientID,pname,age,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$name',$age,'$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Manage Patients</title>
		
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
<h1 class="mainTitle">Doctor | Manage Patients</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Doctor</span>
</li>
<li class="active">
<span>Manage Patients</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >
    <b>Bethar Dan Medical Center</b> <br>
    <b>Jatiya Kabi Kazi Nazrul Islam University</b> <br>
    <b>Trishal Mymensingh</b>
   </th> 
  </tr>
  <tr align="center">
   <th colspan="8" >Medical History</th> 
  </tr>

  <tr>

  <td width="50%">


  
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>


<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" >Patient Name</span>
<input type="text" name="name" class="form-control"  aria-describedby="name" placeholder="Patient Name" value="<?php  echo $row['PatientName'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="email">Patient Email</span>
<input type="text" email="name" class="form-control"  placeholder="Patient Name" value="<?php  echo $row['PatientEmail'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="phone">Phone Number</span>
<input type="text" name="phone" class="form-control"  placeholder="Phone Number" value="<?php  echo $row['PatientContno'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="address">Address</span>
<input type="text" name="address" class="form-control"  placeholder="Patient Name" value="<?php  echo $row['PatientAdd'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="Gender">Patient Gender</span>
<input type="text" name="Gender" class="form-control"  placeholder="Patient Gender" value="<?php  echo $row['PatientGender'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="Age">Patient Age</span>
<input type="text" name="Age" class="form-control"  placeholder="Patient Age" value="<?php  echo $row['PatientAge'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Patient Medical History(if any)</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Patient Medical History(if any)" value="<?php  echo $row['PatientMedhis'];?>">
</div>
<div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="RegDate">Patient Reg Date</span>
<input type="datetime-local" name="RegDate" class="form-control"  placeholder="Patient Reg Date" value="<?php  echo $row['CreationDate'];?>">
</div>



<?php }?>



  <?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
while ($row=mysqli_fetch_array($ret)) { 
  ?>
  
  <div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Blood Pressure</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Blood Pressure" value="<?php  echo $row['BloodPressure'];?>">
</div><div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Weight</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Weight" value="<?php  echo $row['Weight'];?>">
</div><div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Blood Sugar</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Blood Sugar" value="<?php  echo $row['BloodSugar'];?>">
</div><div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Body Temprature</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Body Temprature" value="<?php  echo $row['Temperature'];?>">
</div><div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Medical Prescription</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Medical Prescription" value="<?php  echo $row['MedicalPres'];?>">
</div><div class="input-group mt-3" style="margin-top:15px;">
<span class="input-group-addon" style="background:transparent; color:black;" for="medhistory">Visit Date</span>
<input type="text" name="medhistory" class="form-control"  placeholder="Visit Date" value="<?php  echo $row['CreationDate'];?>">
</div>
  </td>
  
    
<?php } ?>
<td width="50%">
  Date: <?php echo date("d-m-Y"); ?>
</td>

<tr>
  <td rowspan="2">
  <button class="btn btn-secondary" id="generate-pdf">Save As Pdf</button>
  <button class="btn btn-secondary" id="print-pdf">Print</button>
  </td>
</tr>
</tr>

</table>



<script>
   document.getElementById('generate-pdf').addEventListener('click', function() {
      const element = document.getElementById('datatable');
      html2pdf().from(element).save('appointment.pdf');
    });
   document.getElementById('print-pdf').addEventListener('click', function() {
            var actContents = document.getElementById('datatable');
            window.print();
         });
  </script>

  

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-spanledby="exampleModalspan" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalspan">Add Medical History</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-span="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                 <tr>
    <th>Patient Name :</th>
    <td>
    <input name="name" placeholder="Patient Name" class="form-control wd-450" required="true"></td>
  </tr> 
      <tr>
    <th>Age :</th>
    <td>
    <input name="age" placeholder="Age" class="form-control wd-450" required="true"></td>
  </tr> 
      <tr>
    <th>Patient ID :</th>
    <td>

    <input name="id" value="<?php echo $vid; ?>" readonly placeholder="ID" class="form-control wd-450" required="true"></td>
  </tr> 
      <tr>
    <th>Blood Pressure :</th>
    <td>
    <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
  </tr>  

     <tr>
    <th>Blood Sugar :</th>
    <td>
    <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Weight :</th>
    <td>
    <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Body Temprature :</th>
    <td>
    <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Other  Symptoms :</th>
    <td>
    <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
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
<?php }  ?>
