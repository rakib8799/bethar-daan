<?php
session_start();
// error_reporting(0);
include('include/config.php');
// include('include/checklogin.php');
// check_login();
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $name=$_POST['name'];
    $strength=$_POST['strength'];
    $quantity=$_POST['quantity'];
   
 
      $query=mysqli_query($con, "insert into medicine(name,strength,quantity)value('$name','$strength','$quantity')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-.php'</script>";
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
		<title>Nurse | Medicines</title>
		
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
		<script src="https://cdnjs.cloudflare.com/ajax/listrength/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
<h1 class="mainTitle">s | Medicine</h1>
</div>
<ol class="breadcrumb">
<li>
<span>s</span>
</li>
<li class="active">
<span>Medicine</span>
</li>
</ol>
</div>
</section>
<button class="btn btn-secondary" id="generate-pdf">Generate Pdf</button>
<div class="container-fluid container-fullw bg-white"  id="content">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">s <span class="text-bold">Medicine</span></h5>

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >Medicine</th> 
  </tr>
  <tr>

  <td>


  
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from medicine where id='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>


<div class="form-group">
<label for="name"> Name</label>
<input type="text" name="name" class="form-control"  placeholder=" Name" value="<?php  echo $row['name'];?>">
</div>
<div class="form-group">
<label for="email"> Quantity</label>
<input type="text" name="strength" class="form-control"  placeholder=" Name" value="<?php  echo $row['strength'];?>mg">
</div>
<div class="form-group">
<label for="phone">Quantity</label>
<input type="text" name="quantity" class="form-control"  placeholder="Quantity" value="<?php  echo $row['quantity'];?>">
</div>



<?php }?>

 
</tr>

</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medicine</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Medicine</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit" action="">

      <tr>
    <th>Name :</th>
    <td>
    <input type="text" name="name" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>strength :</th>
    <td>
    <input type="text" name="strength" placeholder="strength" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>quantity :</th>
    <td>
    <input type="text" name="quantity" placeholder="quantity" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <td rowspan='2'>
      <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </td>
  </tr>
                                 </form>
   
</table>


                         
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

		<script>
   document.getElementById('generate-pdf').addEventListener('click', function() {
      const element = document.getElementById('content');
      html2pdf().from(element).save('appointment.pdf');
    });
  </script>
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
