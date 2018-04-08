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
			.tulis{
				font-size:15px;
			}
			.input{
				height:27px;
				padding:0;
				margin:0;
			}
		</style>
	</head>
	<body>
		<?php echo form_open_multipart('member/edit') ?>
		<div class="row" id="header">
			<div class="large-2 columns">
				<img class='foto' src="<?php echo base_url().'assets/img/'.$FotoProfil?>">
			</div>
			<div class="large-4 columns end">
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
						<label class='tulis' for='username'>
							Username:
						</label>
					</div>
					<div class="medium-8 columns">
						<input class="input" type='text' id='username' name='username'
						value="<?php echo $Username ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						<label class='tulis' for='nama'>
							Nama: 
						</label>
					</div>
					<div class="medium-8 columns">
						<input class="input" type='text' id='nama' name='nama'
						value="<?php echo $Nama; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						<label class='tulis' for='tglLahir'>
							Tanggal Lahir:
						</label>
					</div>
					<div class="medium-8 columns">
						<input class="input" type='text' id='tglLahir' name='tglLahir'
						value="<?php echo $TglLahir; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						<label class='tulis' for='noHP'>
							No HP:
						</label>
					</div>
					<div class="medium-8 columns">
						<input class="input" type='text' id='noHP' name='noHP'
						value="<?php echo $No_HP; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="medium-4 columns">
						<label class='tulis' for='email'>
							Email:
						</label>
					</div>
					<div class="medium-8 columns">
						<input class="input" type='text' id='email' name='email'
						value="<?php echo $Email; ?>" required>
					</div>
				</div><br>
				<input type="submit" class="button" value="Edit">
				<a href="profil" class="button">Cancel</button></a>
				<?php echo validation_errors(); ?>
			</div>
		</div>
	</body>
 </html>