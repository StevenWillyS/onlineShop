<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/foundation.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/app.css'?>">
		<title>Daftar Pesan</title>
	</head>
	<body>
		<div class="row">
			<div class="large-12 columns">
				Daftar Pesan Anda
			</div>
		</div>
		<?php foreach($query->result() as $data){?>
		<div class="row">
			<div class="large-12 columns">
				<?php $id = $data->ID_Member1==$_SESSION['id']? $data->ID_Member2 : $data->ID_Member1;  ?>
				<?php echo $id; ?>
				<a class="button" href="../bukapesan/<?php echo $data->ID_Pesan.'/'.$id; ?>">Chat</a>
			</div>
		</div>
		<?php } ?>
	</body>
</html>