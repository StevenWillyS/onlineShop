		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-4">
						<div id="container">
							<div id="carousel">
					        <div id="myCarousel" class="carousel slide" data-ride="carousel">
					          <!-- Indicators -->
					          <ol class="carousel-indicators">
								<?php 
									$a = 0;
									foreach($foto as $f) {
									if($f=='') continue;
								?>
					            <li data-target="#myCarousel" data-slide-to="<?php echo $a++;?>"></li>
					            <?php } ?>
							  </ol>	
					          <!-- Wrapper for slides -->
					          <div class="carousel-inner">
								<?php $a=true;
									foreach($foto as $f) {
									if($f=='') continue;
								?>
					            <div class="item <?php if($a==true) {echo 'active'; $a=false; }?>">
					              <img src="<?php echo base_url("assets/img/iklan/$f");?>" style="width:100%; height: 450px;">
								</div>
								<?php } ?>
					          </div>
					          <!-- Left and right controls -->
					          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					            <span class="glyphicon glyphicon-chevron-left"></span>
					            <span class="sr-only">Previous</span>
					          </a>
					          <a class="right carousel-control" href="#myCarousel" data-slide="next">
					            <span class="glyphicon glyphicon-chevron-right"></span>
					            <span class="sr-only">Next</span>
					          </a>
					        </div>
					      </div>
						</div>
					</div>
					<div class="col-md-1"></div>
					<?php if(isset($_SESSION['login'])){
						echo form_open('beli/tambahCart');
						$kirim = array(
							'ID_Iklan' => $data->ID_Iklan,
							'jumlah' => 1,
							'page' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
						);
						echo form_hidden($kirim);
						}
					?>
					<div class="col-md-6">
						<h3><span style="color:red;"><?php if($data->Jumlah==0) echo "<span class='fa fa-check-circle'></span>Sudah Laku Gan!"; ?></span></h3>
						<h2 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15)">Nama Barang: <?php echo $data->Judul;?></h2>
						<h4 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15)">Kategori: <?php echo $data->Kategori; ?></h4>
						<h4 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15)">Penjual: <a href='<?php echo base_url("member/profile/$data->Username"); ?>'><?php echo $data->Username; ?></a></h4>
						<h4 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15)">Jumlah: <?php echo $data->Jumlah; ?></h4>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15)">Deskripsi Barang</h3>
						<h4>
							<?php echo $data->Deskripsi;?>
						</h4>
						<h3 style="margin-top: 50px;">Rp.<?php echo number_format($data->Harga,2,',','.'); ?></h3>
						<input type="submit" class="btn btn-info" value="Add to Cart" <?php if($data->Jumlah==0) echo "disabled"; ?>>
						<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						<?php 
							if(isset($_SESSION['login'])){
								echo form_open('iklan/tulisKomen');
								$kirim = array(
									'ID_Iklan' => $data->ID_Iklan,
									'ID_Member' => $_SESSION['id'],
									'ID_Member2' => $data->ID_Member,
									'page' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
								);
								echo form_hidden($kirim);
							}
						?>
						<textarea name="komentar" placeholder="komentar" class="form-control" <?php if($data->Jumlah==0) echo "disabled"; ?>></textarea>
						<input class='btn btn-info' type="submit" style="margin-bottom: 100px;" value="Tulis" <?php if($data->Jumlah==0) echo "disabled"; ?>>
						<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
					</div>
				</div>
					<h3 style="  text-align: center">Kolom Komentar</h3>
					<div class="col-md-2"></div>
					<div class="col-md-8" style="border: 1px solid black; margin-bottom: 50px;padding-bottom:10px">						
						<?php foreach($komentar->result() as $komen){?>
						<div class="col-md-12" style="border-bottom: 1px solid black;">
							<a href='<?php echo base_url("member/profile/$komen->Username"); ?>'><?php echo $komen->Username; ?></a>
							<p><?php echo $komen->Komentar; ?></p>
						</div>
						<?php } ?>
					</div>
			</div>
		</div>	

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>	
	</body>
</html>