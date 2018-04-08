		<div class="container-fluid">
				<div class="col-md-12">
					<h2 style="text-align: center; margin-bottom: 30px;">Daftar Iklan</h2>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-10" style="margin-bottom: 50px; border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; padding-bottom: 30px; ">
					<?php foreach($iklan->result() as $dt){
							$foto = explode(';',$dt->Foto);
						?>
					<div class="col-md-12" style="border-style: solid; border-color: #6b8fc8; margin-top: 2em">
						<div class="col-md-3">
							<img src="<?php echo base_url("assets/img/iklan/$foto[0]")?>" style="height: 200px; width: 100%; margin-top: 20px;">
						</div>
						<div class="col-md-9">
							<div id="itemlist_desc" style="padding: 5px;">
								<p style="font-size: 1.5em ;">Nama : <a href='<?php echo base_url("iklan/lihat/$dt->ID_Iklan"); ?>'><?php echo $dt->Judul; ?></a></p>
								<p>Kategori : <?php echo $dt->Kategori; ?></p>
								<p>Harga : <?php echo 'Rp '.number_format($dt->Harga,2,',','.'); ?></p>
								<p>Jumlah : <?php echo $dt->Jumlah; ?></p>
								<p>Deskripsi : <?php echo $dt->Deskripsi; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
						

				</div>
			</div>	
		</div>
	</body>
</html>
<?php 
	if(isset($_SESSION['tanda'])){
		echo '<script>alert("'.$_SESSION['tanda'].'")</script>';
		unset($_SESSION['tanda']);
	}
?>