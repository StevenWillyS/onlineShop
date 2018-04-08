<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIAPBELANJA</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style1.css'?>">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Siap Belanja</a>
				</div>	
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('home')?>"><span class="fa fa-home"></span>Home</a></li>
				</ul>
			</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Customer SignUp Form</div>
						<div class="panel-body">
							<?php echo form_open_multipart('member/register'); ?>
							<div class="row">
								<div class="col-md-8">
									<label for="username">Username</label>
									<input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required>
									<span style="color:red"><?php if(form_error('username')) echo "Username sudah terdaftar"; ?></span>
								</div>
								<div class="col-md-6">
									<label for="password">Password</label>
									<input type="Password" id="password" name="password" class="form-control" required>
								</div>
								<div class="col-md-6">
									<label for="password">Re-Password</label>
									<input type="Password" id="password" name="repassword" class="form-control" required>
									<span style="color:red"><?php echo form_error('repassword'); ?></span>
								</div>
								<div class="col-md-8">
									<label for="nama">Nama</label>
									<input type="text" id="nama" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required>
								</div>
								<div class="col-md-8">
									<label for="handphone">No HP</label>
									<input type="text" id="handphone" name="noHP" class="form-control" value="<?php echo set_value('noHP'); ?>" required>
									<span style="color:red"><?php if(form_error('noHP')) echo "invalid no HP"; ?></span>
								</div>
								<div class="col-md-8">
									<label for="lahir">Tanggal Lahir</label>
									<input type="text" id="lahir" name="tglLahir" value="<?php echo set_value('tglLahir'); ?>" 
									placeholder="YYYY-MM-DD ex: 1997-01-25" class="form-control" required>
									<span style="color:red"><?php if(form_error('tglLahir')) echo "invalid date"; ?></span>
								</div>
								<div class="col-md-8">
									<label for="alamat">Email</label>
									<input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
									<span style="color:red"><?php if(form_error('email')) echo 'Invalid/Duplicate Email'; ?></span>
								</div>
							</div>
						</div>
						<div class="panel-footer"><input type="submit" value="Register" class="btn btn-primary"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>