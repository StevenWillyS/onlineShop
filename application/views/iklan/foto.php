 <?php
	if(!isset($_SESSION['login'])){
		redirect('/member/login');
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
			<?php echo form_open_multipart('iklan/foto'); ?>
		</div>
		<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
		<div class="row">
			<div class="large-3 columns">
				<label>
					Foto<input type="file" name="foto[]" multiple="multipart" required>
				</label>
			</div>
			<div class="large-3 columns end" style="font-size:10px;color:red">
				<br><br>
				<?php  ?>
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