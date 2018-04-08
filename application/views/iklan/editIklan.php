 <?php
	if(!isset($_SESSION['login'])){
		redirect('/member/login');
	}
	if(isset($_COOKIE['error'])){
		echo '<script>alert("'.$_COOKIE['error'].'")</script>';
		setcookie('error','');
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
		<title>Iklan</title>
	</head>
	<body>
		<div class="row">
			<div class="large-12 columns">
				<h2>Edit Iklan</h2>
			</div>
			<?php echo form_open_multipart("iklan/edit/$ID_Iklan"); ?>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>
					Judul<input type="text" name="judul" value="<?php echo $Judul; ?>" required>
				</label>
			</div>
			<div class="large-4 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php echo form_error('judul'); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>
					Kategori<select name="kategori" required>
						<option <?php if($Kategori=="Alat Olahraga") echo 'selected'; ?>>Alat Olahraga</option>
						<option <?php if($Kategori=="Alat Dapur") echo 'selected'; ?>>Alat Dapur</option>
						<option <?php if($Kategori=="Elektronik") echo 'selected'; ?>>Elektronik</option>
						<option <?php if($Kategori=="Gadget") echo 'selected'; ?>>Gadget</option>
						<option <?php if($Kategori=="Kendaraan") echo 'selected'; ?>>Kendaraan</option>
					</select>
				</label>
				<?php echo form_error('kategori'); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Harga<input type="text" name="harga" value="<?php echo $Harga; ?>" required>
				</label>
			</div>
			<div class="large-4 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php echo form_error('harga'); ?>
			</div>
		</div><div class="row">
			<div class="large-3 columns">
				<label>
					Jumlah<input type="text" name="jumlah" value="<?php echo $Jumlah; ?>" required>
				</label>
			</div>
			<div class="large-4 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php echo form_error('jumlah'); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-7 columns">
				<label>
					Deskripsi (Max 2000 Karakter)<textarea name="deskripsi" required style="height:300px;resize:none;">
						<?php echo $Deskripsi ?>
					</textarea>
				</label>
			</div>			
		</div>
		<div class="row">
			<div class="large-3 columns">
				<a class="button" href="foto/<?php echo "$ID_Iklan"; ?>">Edit Foto</a>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<input type="submit" class="button" value="Edit Iklan" name="buat">
			</div>
		</div>
	
		<script src="<?php echo base_url().'js/vendor/jquery.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/what-input.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/foundation.js';?>"></script>
		<script src="<?php echo base_url().'js/app.js';?>"></script>
	</body>
 </html>