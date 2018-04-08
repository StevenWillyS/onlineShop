 <?php
	if(isset($_SESSION['tanda'])){
		echo '<script>alert("'.$_SESSION['tanda'].'")</script>';
		unset($_SESSION['tanda']);
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
		<title>Profil</title>
		<style>
			.foto{
				height:150px;
				width:150px;
				border: 2px solid white;
				border-radius:150px;
			}
			#header{
				background-color:powderblue;
			}
			.iklan{
				height:400px;
				border: 2px solid black;
			}
			.iklanF{
				width:100%;
				height:250px;
			}
		</style>
	</head>
	<body>
		<div class="row" id="header">
			<div class="large-2 columns">
				<img class='foto' src="<?php echo base_url().'assets/img/'.$FotoProfil?>">
				<a href="editFoto" class="button alert">Ganti Foto Profil</a>
			</div>
			<div class="large-4 columns">
				<div class="row">
					<div class="medium-4 columns">
						ID_Member
					</div>
					<div class="medium-6 columns end">
						:<?php echo $ID_Member ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						Username
					</div>
					<div class="medium-6 columns end">
						:<?php echo $Username ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						Nama
					</div>
					<div class="medium-6 columns end">
						:<?php echo $Nama ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						Tanggal Lahir
					</div>
					<div class="medium-6 columns end">
						:<?php echo $TglLahir ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						No HP
					</div>
					<div class="medium-6 columns end">
						:<?php echo $No_HP ?>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						Email
					</div>
					<div class="medium-6 columns end">
						:<?php echo $Email ?>
					</div>
				</div>
				<a href="logout" class="button alert">Logout</a>
				<a href="edit" class="button alert">Edit</a>
				<a href="editPass" class="button alert">Ganti Password</a>
				<a href="../iklan/buatIklan" class="button alert">BuatIklan</a>
			</div>
			<div class="large-4 columns end"><br>
				<a class="button" href="<?php echo base_url(); ?>index.php/pesan/tampilkanDaftar/
				<?php echo $ID_Member ?>">Daftar Pesan</a>
			</div>
		</div><br>
		