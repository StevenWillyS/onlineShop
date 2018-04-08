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
				<h2>Buat Iklan</h2>
			</div>
			<?php echo form_open_multipart('iklan/buatIklan'); ?>
		</div>
		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
		<div class="row">
			<div class="large-4 columns">
				<label>
					Judul<input type="text" name="judul" value="<?php echo set_value('judul'); ?>" required>
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
						<option>Alat Olahraga</option>
						<option>Alat Dapur</option>
						<option>Elektronik</option>
						<option>Handphone & Laptop</option>
						<option>Kendaraan</option>
					</select>
				</label>
				<?php echo form_error('kategori'); ?>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Harga<input type="text" name="harga" value="<?php echo set_value('harga'); ?>" required>
				</label>
			</div>
			<div class="large-4 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php echo form_error('harga'); ?>
			</div>
		</div><div class="row">
			<div class="large-3 columns">
				<label>
					Jumlah<input type="text" name="jumlah" value="<?php echo set_value('jumlah'); ?>" required>
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
						<?php echo set_value('deskripsi'); ?>
					</textarea>
				</label>
			</div>			
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>
					Foto<input type="file" name="foto[]" multiple="multipart" required value="<?php echo set_value('foto'); ?>">
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<input type="submit" class="button" value="Buat Iklan" name="buat">
			</div>
		</div>
	
		<script src="<?php echo base_url().'js/vendor/jquery.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/what-input.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/foundation.js';?>"></script>
		<script src="<?php echo base_url().'js/app.js';?>"></script>
	</body>
 </html>