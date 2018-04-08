 		<div class="row">
		<?php 
		 foreach($query->result() as $data){ 
			$pic = explode(';',$data->Foto);
		 ?>
			<div class="large-4 columns end iklan">
				<div class="row">
					<div class="medium-12 columns">
						<img class='iklanF' src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
					</div>
				</div>
				<div class="row">
					<div class="medium-12 columns">
					 <p style='font-size:20px;margin:0px;'><?php echo $data->Judul;?>
					 <br></p>
					 <?php if($data->Deskripsi>100){ 
						  echo substr($data->Deskripsi,0,100).'...';
						} else {
						  echo $data->Deskripsi;
						}
					 ?><br>
					 Kategori: <?php echo $data->Kategori;?><br>
					 Rp <?php echo $data->Harga;?><br>
					 <div class="row">
						<div class="small-6 columns">
							<a class="button" href="../iklan/edit/<?php echo $data->ID_Iklan;?>">Edit</a>
						</div>
						 <div class="small-6 columns">
							 <?php
								if($data->Verifikasi==0){
									echo "<p style='text-align:right;color:red;'>Belum terverifikasi</p>";
								} else {
									echo "<p style='text-align:right;color:green;'>Sudah terverifikasi</p>";
								}
							 ?>
						 </div>
					 </div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
 
	</body>
 </html>