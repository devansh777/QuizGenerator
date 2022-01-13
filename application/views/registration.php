<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/font1.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap_min.css">
	<script src="<?php echo base_url();?>assets/assets/js/logn.js" ></script>
	<script src="<?php echo base_url();?>assets/assets/js/my.js" ></script> 
</head>
<body><center>
	<div class="modal-dialog text-centre">
		<div class="col-sm-9 "><br><br><br><br>
			<h1>Sign Up </h1><br>
			<div class="modal-content">
			
				<div class="col-12 user-img">
					
				</div>
				<div class="col-12 form-input">
					<form action="<?php echo base_url();?>index.php/Mcq_controller/addusr" method="POST">
						<div class="form-group">
						 <input type="username" class="form-control" name="txtuname" placeholder="Username">	
						</div>
						<div class="form-group">
						 <input type="email" class="form-control" name="txtemail" placeholder="E-mail">	
						</div>
						<div class="form-group">
						 <input type="password" class="form-control" name="txtpassword" placeholder="Password">	
						</div>
						<button type="submit" name="btnLogin" class="btn btn-success">Sign up </button>
					</form>
				</div>
				<br>
				
			</div>
			<br>
		</div>
		
	</div>
</center>
</body>
</html>
