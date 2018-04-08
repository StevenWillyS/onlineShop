<?php
	if(isset($_SESSION['notif'])){
		echo '<script>alert("'.$_SESSION['notif'].'")</script>';
		unset($_SESSION['notif']);
	}
	if(isset($_COOKIE['notif'])){
		echo '<script>alert("'.$_COOKIE['notif'].'")</script>';
		setcookie('notif','');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/foundation.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/app.css'?>">
		<title>Login</title>
		<style>
			#kotak{
				margin-top: 10%;
				border: 2px solid black;
			}
		</style>
	</head>
	<body>
		<?php echo form_open('member/login'); ?>
		<div class="row">
			<div id='kotak' class="large-4 large-push-4 columns" style="text-align: center;">
				<div class="medium-12 columns">
					<p style="font-size:30px">Login</p>
				</div>
				<div class="medium-12 columns">				
					<label>
						Username<input type="text" name="username" required>
					</label>
				</div>
				<div class="medium-12 columns">				
					<label>
						Password<input type="password" name="password" required>
					</label>
				</div>
				<div class="medium-12 columns">				
					<input type="submit" name="login" class = "button" value="Login">
					<a href="register" class="button">Register</a>
				</div>
			</div>
		</div>
	</body>
</html>