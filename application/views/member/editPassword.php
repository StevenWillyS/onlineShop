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
		</style>
	</head>
	<body>
		<div class="row" id="header">
			<div class="large-2 columns">
				<img class='foto' src="<?php echo base_url().'assets/img/'.$FotoProfil?>">
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
			</div>
			<?php echo form_open_multipart('member/editPass'); ?>
			<div class="large-5 columns end">
				<div class="row">
					<div class="medium-7 columns">
						<label class='tulis' for='plama'>
							Password Lama:
						<input class="input" type='password' id='plama' name='plama' required>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="medium-7 columns">
						<label class='tulis' for='pbaru'>
							Password Baru:
						<input class="input" type='password' id='pbaru' name='pbaru' required>
						</label>
					</div>
				</div>
				<input type="submit" class="button" value="Ganti Password">
				<a href="profil" class="button">Cancel</button></a>
			</div>
			
		</div>
	</body>
 </html>