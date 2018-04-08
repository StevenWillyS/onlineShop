		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/foundation.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/app.css'?>">
		<script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
		<title>Pesan</title>
		<style>
			p{
				margin:0px;
			}
			.merah{
				color:red;
			}
			.biru{
				color:blue;
			}
			.kotak{
				padding:10px;
				border: 2px solid black;
				height:400px;
				overflow:auto;
			}
			.kiri{
				text-align:left;
				background-color:powderblue;
				border-radius:5px;
				padding:10px;
			}
			.kanan{
				text-align:right;
				background-color:lavender;
				border-radius:5px;
				padding:10px;
			}
		</style>
	</head>
	<body>
		<br><br><br>
		<div class="row">
			<div class="large-12 columns kotak" id="teks">
				<?php 
					$a = false;
					foreach($teks as $t){
						if($t=='') continue;
						if($a==false){
							echo '<div class=kiri>'.$t.'<br></div>';
							$a=true;
						} else {
							echo '<div class=kanan>'.$t.'<br></div>';
							$a=false;
						}
					}
				?>
			</div>
		</div>
		<?php echo form_open('pesan/kirimPesan'); ?>
		<div class="row">
			<div class="large-12 columns" style="border: 2px solid black;">
				Anda:
				<input type="text" name="pesan">
			</div>
		</div>
		<input type='hidden' name='id' value='<?php echo $query->ID_Pesan; ?>'>
		<input type='hidden' name='idM' value='<?php echo $query->ID_Member1==$_SESSION['id']? $query->ID_Member2 : $query->ID_Member1; ?>'>
		<input type='hidden' name='pesanLama' value='<?php echo $query->Pesan; ?>'>
	<script>
		// var url      = window.location.href;  
		// setInterval(function(){
		   // $('#teks').load(url+'/true');
		// }, 1000)
	</script>
	</body>
</html>