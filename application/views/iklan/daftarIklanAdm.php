		<div class="row">
		<?php 
		 foreach($query->result() as $data){ 
			$pic = explode(';',$data->Foto);
		 ?>
			<div class="large-4 columns iklan end">
				<div class="row">
					<div class="medium-12 columns">
						<img class='iklanF' src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
					</div>
				</div>
				<div class="row">
					<div class="medium-12 columns">
					 <p style='font-size:20px;margin:0px;'><?php echo $data->Judul;?><br></p>
					 Penjual:<a href='../member/profil/<?php echo $data->Username; ?>'><?php echo $data->Username?></a><br>
					 <?php if($data->Deskripsi>100){ 
						  echo substr($data->Deskripsi,0,100).'...';
						} else {
						  echo $data->Deskripsi;
						}
					 ?><br>
					 Kategori: <?php echo $data->Kategori;?><br>
					 Rp <?php echo $data->Harga;?><br>
					 <div class="row">
						<div class="small-4 columns">
							<a class="button success" href="verifikasi/<?php echo $data->ID_Iklan?>"
							<?php if($data->Verifikasi==1) echo 'disabled'?>>Verifikasi</a>
						</div>
						<div class="small-4 columns">
							<a class="button alert" href="hapus/<?php echo $data->ID_Iklan?>">Hapus</a>
						</div>
						<div class="small-4 columns">
							<?php
								if($data->Verifikasi==0){
									echo "<p style='font-size:12px;color:red;'>Belum terverifikasi</p>";
								} else {
									echo "<p style='font-size:12px;color:green;'>Sudah terverifikasi</p>";
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