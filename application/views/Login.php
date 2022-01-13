<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/font1.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap_min.css">
	<script src="<?php echo base_url();?>assets/assets/js/logn.js" ></script>
	<script src="<?php echo base_url();?>assets/assets/js/my.js" ></script> 
</head>
<body><center>
			<br><br><br>
	<fieldset><legend><font face="veranda" size="6" color="purple"><b>Login Page</b></font></legend>
	<div class="modal-dialog text-centre">
		
			<div class="modal-content">
				<div class="col-12 user-img">
					<img src="<?php echo base_url();?>assets/login.jpg ">
				</div>
				<form action="<?php echo base_url();?>index.php/Mcq_controller/loginchk" method="POST">
				<div class="col-12 form-input">
					
						<div class="form-group">
						 <input type="email" class="form-control" name="txtemail" placeholder="E-mail">	
						</div>
						<div class="form-group">
						 <input type="password" class="form-control" name="txtpassword" placeholder="Password">	
						</div>
						<button type="submit" name="btnLogin" class="myButton">Login </button>
					</form>
				</div>
				<br>
				<!-- <div class="col-12 forgot"><a href="#">Forgot Password?</a></div> -->
				<div class="col-12 forgot"><a href="<?php echo base_url();?>index.php/Mcq_controller/Registration">Sign Up</a></div><br>
			</div>
			<br>

		</div>
		
</fieldset>
</center>
</body>
</html>
