<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/foundation.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/app.css'?>">
		<title>Register</title>
	</head>
	<body>
		<div class="row">
			<div class="large-12 columns">
				<h2>Register</h2>
			</div>
			<?php echo form_open_multipart('member/register'); ?>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>
					Username<input type="text" name="username" value="<?php echo set_value('username'); ?>" required>
				</label>
			</div>
			<div class="large-4 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php if(form_error('username')) echo "Username sudah terdaftar"; ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Password<input type="password" id='password' name="password" required>
				</label>
			</div>
			<div class="large-3 columns">
				<label>
					Re-Password<input type="password" name="repassword" required data-equalto="password">
				</label>
			</div>
			<div class="large-3 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php echo form_error('repassword'); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Nama<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" required>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Tanggal Lahir<input type="text" name="tglLahir" value="<?php echo set_value('tglLahir'); ?>"
					placeholder="YYYY-MM-DD ex: 1997-01-25" required>
				</label>
			</div>
			<div class="large-3 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php if(form_error('tglLahir')) echo "invalid date"; ?>
			</div>
			
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					No HP<input type="text" name="noHP" required value="<?php echo set_value('noHP'); ?>">
				</label>
			</div>
			<div class="large-3 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php if(form_error('noHP')) echo "invalid no HP"; ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Email<input type="text" name="email" required value="<?php echo set_value('email'); ?>">
				</label>
			</div>
			<div class="large-3 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php if(form_error('email')) echo 'Invalid/Duplicate Email'; ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<input type="submit" class="button" value="Register" name="register">
			</div>
		</div>
		<script src="<?php echo base_url().'js/vendor/jquery.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/what-input.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/foundation.js';?>"></script>
		<script src="<?php echo base_url().'js/app.js';?>"></script>
	</body>
</html>