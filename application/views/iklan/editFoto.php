 <?php
	if(!isset($_SESSION['login'])){
		redirect('/member/login');
	}
	if(isset($_SESSION['error'])){
		echo '<script>alert("'.$_SESSION['error'].'")</script>';
		unset($_SESSION['error']);
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
		<style>
			.kotak{
				border: 2px solid black;
			}
			.iklan{
				width:100%;
				height:250px;
			}
		</style>
	</head>
	<body>
		<div class="row">
			<div class="large-12 columns">
				<h2>Edit Foto Iklan</h2>
			</div>
		</div>
		<div class="row">
			<?php foreach($foto as $f) {
				if($f=='') continue;
			?>
			<div class="large-4 columns end kotak">
			<?php echo form_open_multipart("iklan/edit/foto/$data->ID_Iklan/$f/edit"); ?>
				<div class="row">
					<div class='medium-12 columns'>
						<?php echo '<img src=\''.base_url().'assets/img/iklan/'.$f."'><br>"; ?>
					</div>
					<div class='medium-3 columns'>
							<a class="button alert" href="<?php echo $data->ID_Iklan.'/'.$f?>/delete">Hapus</a>
					</div>
					<div class='medium-6 columns'>
						<input style='font-size:10px;margin-top:10px;' required type='file' name='foto'>
					</div>
					<div class='medium-3 columns'>
						<input type="submit" class="button" value="Edit" name="buat">
					</div>
				</div>
				</form>
			</div>
			<?php } ?>
			<div class="large-4 columns end kotak">
				<img  style ="width:50%;height:160px;margin-left:25%;" src= "<?php echo base_url(); ?>assets/img/iklan/default.png">
				<?php echo form_open_multipart("iklan/edit/foto/$data->ID_Iklan/null/tambah"); ?>
				<input type="file" name="tambahFoto">
				<input class = "button" type="submit" value="Tambah Foto">
			</div>
		</div>
	
		<script src="<?php echo base_url().'js/vendor/jquery.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/what-input.js';?>"></script>
		<script src="<?php echo base_url().'js/vendor/foundation.js';?>"></script>
		<script src="<?php echo base_url().'js/app.js';?>"></script>
	</body>
 </html>