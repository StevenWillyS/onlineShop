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
		<script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Siap Belanja</a>
			</div>	
			<?php echo form_open(base_url('cariIklan')); ?>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url('home'); ?>"><span class="fa fa-home"></span>Home</a></li>	
				<li style="width:400px;left:10px;top: 10px;"><input type="text" class="form-control" id="search" name="search"></li>
				<li style="top: 10px;left: 20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-shopping-cart"></span>Cart <span class="badge"><?php if(isset($_SESSION['login'])) echo $cart->num_rows(); ?></span></a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class ="panel-heading">
								<div class="row">
									<div class="col-md-2">ID</div>
									<div class="col-md-4">Nama</div>
									<div class="col-md-2">Jumlah</div>
									<div class="col-md-4">Harga</div>
								</div>
							</div>
							<div class="panel-body">
								<?php if(isset($_SESSION['login'])){
								foreach($cart->result() as $data){ ?> 
								<div class="row">
									<div class="col-md-2"><?php echo $data->ID_Iklan; ?></div>
									<div class="col-md-4"><?php echo $data->Judul;?></div>
									<div class="col-md-2"><?php echo $data->Jumlah;?></div>
									<div class="col-md-4"><?php echo number_format($data->Harga,2,',','.');?></div>
								</div>
								<?php }} ?>
							</div>
								
							<div class="panel-footer" style="text-align:right;">
								<a href="<?php if(isset($_SESSION['login'])) echo base_url('beli'); ?>" class="btn btn-success">Beli</a>
								<a href="<?php if(isset($_SESSION['login'])) echo base_url('clearCart'); ?>" class="btn btn-danger">Hapus</a>	
							</div>
						</div>
					</div>
				</li>
				<?php if(!isset($_SESSION['login'])){?>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width: 300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<?php echo form_open('member/login'); ?>
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" required>
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" required>
									<p><br/></p>
									<input type="submit" class="btn btn-success" style="float: right;" id="login" value="Login">
									</form>
									<a href="<?php echo base_url('admin/login'); ?>">admin</a>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="<?php echo base_url('register')?>"><span class="fa fa-user"></span>SignUp</a></li>
				<?php } else {?>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span><?php echo $_SESSION['login']; ?></a>
					<ul class="dropdown-menu">
						<div class="panel-body" style="text-align:right;">
							<a href="<?php echo base_url('member/profile'); ?>">Profil Saya</a><br>
							<a href="<?php echo base_url('member/edit'); ?>">Edit Profil</a><br>
							<a href="<?php echo base_url('iklan/buatIklan'); ?>">Buat Iklan</a><br>
							<a href="<?php $idM = $_SESSION['id']; echo base_url("pesan/tampilkanDaftar/$idM"); ?>">Daftar Pesan</a>
						</div>
					</ul>
				</li>
				<?php
					$cek = 0;
					foreach($notif->result() as $data){
						if($data->Terbaca==0){
							$cek = 1;
							break;
						}
					}
				?>
				<li><a id="klik" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bell"><span id = 'notif'>Notifikasi<?php if($cek==1) echo '<span class="fa fa-exclamation">'?></span></a>
					<ul class="dropdown-menu" style="width:250px;height:250px;overflow:auto;">
						<div class="panel-body" style="text-align:right;">
							<table class="table table-striped">
							<?php
								foreach($notif->result() as $data){
									echo '<tr><td>'.$data->Pesan.'</td></tr>';
								}
							?>
							</table>
						</div>
					</ul>
					<script>
						$("#klik").click(function(){
							$.post("<?php echo base_url('notif/bacaNotif/'); ?>");
							document.getElementById('notif').innerHTML = "Notifikasi";
						});
					</script>
				</li>
				<li><a href="<?php echo base_url('logout')?>"><span class="fa fa-user"></span>Logout</a></li>			
				<?php } ?>
			</ul>
		</div>
	</div>