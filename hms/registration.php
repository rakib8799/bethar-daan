<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
// $fname=$_POST['full_name'];
// $address=$_POST['address'];
// $users=$_POST['users'];
// $gender=$_POST['gender'];
// $email=$_POST['email'];
extract($_POST);
$password=md5($_POST['password']);
print_r($_POST);
if(isset($input_field_session, $input_field_roll)){
$query=mysqli_query($con,"insert into users(fullName,department,users,student_session,student_roll,gender,email,password) values('$full_name','$department','$users','$input_field_session','$input_field_roll','$gender','$email','$password')");
}
else{
	$query=mysqli_query($con,"insert into users(fullName,department,users,student_session,student_roll,gender,email,password) values('$full_name','$department','$users', NULL , NULL ,'$gender','$email','$password')");
}
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> <strong>
   <font color ="berry red"> BDMCMS | Patient Registration </font></strong></h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<span style="color:red;"><?php if(isset( $_SESSION['errmsg'])) echo $_SESSION['errmsg']; 
							else
							echo $_SESSION['errmsg']="";?> </span>
							<div class="form-group">
							<label for="full_name">
																Enter Full Name
															</label>
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" id="full_name" required>
							</div>
							<div class="form-group">
							<label for="department">
																Enter Department Name
															</label>
								<input type="text" class="form-control" name="department" placeholder=" Write Department Name Such as CSE, EEE, Administration, Transport" id="department" required>
							</div>
							<!-- <div class="form-group">
							<label for="full_name">
																Enter Type of User
															</label>
								<input type="text" class="form-control" name="city" placeholder="Write the type of users like Student, Teacher, Officer, Workers or others" required>
							</div> -->
							<div class="form-group">
								<label for="users"><b>Enter Type of User:</b></label>
								<div class="input-group">
									<select class="form-select" name="users" id="users" onchange="selectStudents()" required style="width: 25.5vw;">
										<option value="">Please select any user</option>
										<option value="student">Student</option>
										<option value="teacher">Teacher</option>
										<option value="officer">Officer</option>
										<option value="doctor">Doctor</option>
										<option value="staff">Worker's/Staff</option>
									</select>
								</div>
							</div>
							<div class="row justify-content-center" id="create_div">

							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> BDMCMS</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>

		<script>
                function selectStudents() {
                    var create_author_label_name_affiliation_designation_email_div;
                    let user = document.getElementById("users").value;

                    let e = document.getElementById("create_div");
                    var child = e.lastElementChild;
                    while (child) {
                        e.removeChild(child);
                        child = e.lastElementChild;
                    }

                    if (user==="student") {
                        let create_div = document.getElementById("create_div");

                        let create_div_element = document.createElement("DIV");
                        create_div_element.className = "form-group";


                        create_div.appendChild(create_div_element);

                        let input_field_name = document.createElement("INPUT");
                        let input_field_affiliation = document.createElement("INPUT");
                        let input_field_email = document.createElement("INPUT");
                        let input_field_label = document.createElement("LABEL");

                        input_field_name.type = "text";
                        input_field_name.className = "form-control mt-2";
                        input_field_name.name = `input_field_session`;
                        input_field_name.required = true;
                        input_field_name.placeholder = `Enter Student Session`;

                        input_field_affiliation.type = "text";
                        input_field_affiliation.className = "form-control mt-2";
                        input_field_affiliation.name = `input_field_roll`;
                        input_field_affiliation.required = true;
                        input_field_affiliation.placeholder = `Enter Student Roll`;

                        input_field_label.className = "fw-bold mt-2";
                        input_field_label.innerHTML = `Student Information :`;

                        create_div_element.appendChild(input_field_label);
                        create_div_element.appendChild(input_field_name);
                        create_div_element.appendChild(input_field_affiliation);
                    }
                }
            </script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	<!-- end: BODY -->
</html>