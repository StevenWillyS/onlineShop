	<p><br/></p>
	<p><br/></p>
	<div id="container">
		<div id="carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="<?php echo base_url('assets/img/slide/tron.jpg');?>" alt="gadget" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Looking for something for your beloved ones?</h3>
                <p>Gifts and souvenirs for those people you cherish!</p>
              </div>
            </div>

            <div class="item">
              <img src="<?php echo base_url('assets/img/slide/truck.jpg');?>" alt="Kendaraan" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Heading to the secondhand car?</h3>
                <p>We have everything you need</p>
              </div>
            </div>

            <div class="item">
              <img src="<?php echo base_url('assets/img/slide/jogging.png');?>" alt="Jogging" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Building a healthy life style?</h3>
                <p>Scroll thru our huge list of sportswear</p>
              </div>
            </div>
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
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<div class="nav nav-pills bav-stacked">
					<li class="active"><a href="#"><h4>Categories<h4></a></li>
					<li><a onclick="loadKategori(this)" id="Alat-Olahraga">Alat Olahraga</a></li>
					<li><a onclick="loadKategori(this)" id="Elektronik">Elektronik</a></li>
					<li><a onclick="loadKategori(this)" id="HP-%26-Laptop">HP & laptop </a></li>
					<li><a onclick="loadKategori(this)" id="Kendaraan">Kendaraan</a></li>
					<li><a onclick="loadKategori(this)" id="Alat-Dapur">Alat Dapur</a></li>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">Products<br>
					<?php if(isset($cari)) echo $cari; ?></div>
					<div class="panel-body" style="text-align:center;">
						<span style="color:blue;">Alat Olahraga</span>
					</div>
					<div class="panel-body" id="produk">
						<?php 
						foreach($alatOlahraga->result() as $data){ 
							$pic = explode(';',$data->Foto);
						?>
						<div class="col-md-4">
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
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
								</div>
								<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
								<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
								<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
							</div>
							<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						</div>
						<?php } ?>
					</div>
					<div class="panel-body" style="text-align:center;">
						<span style="color:blue;">Elektronik</span>
					</div>
					<div class="panel-body" id="produk">
						<?php 
						foreach($elektronik->result() as $data){ 
							$pic = explode(';',$data->Foto);
						?>
						<div class="col-md-4">
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
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
								</div>
								<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
								<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
								<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
							</div>
							<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						</div>
						<?php } ?>
					</div>
					<div class="panel-body" style="text-align:center;">
						<span style="color:blue;">HP & Laptop</span>
					</div>
					<div class="panel-body" id="produk">
						<?php 
						foreach($hpLaptop->result() as $data){ 
							$pic = explode(';',$data->Foto);
						?>
						<div class="col-md-4">
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
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
								</div>
								<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
								<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
								<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
							</div>
							<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						</div>
						<?php } ?>
					</div>
					<div class="panel-body" style="text-align:center;">
						<span style="color:blue;">Kendaraan</span>
					</div>
					<div class="panel-body" id="produk">
						<?php 
						foreach($kendaraan->result() as $data){ 
							$pic = explode(';',$data->Foto);
						?>
						<div class="col-md-4">
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
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
								</div>
								<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
								<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
								<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
							</div>
							<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						</div>
						<?php } ?>
					</div>
					<div class="panel-body" style="text-align:center;">
						<span style="color:blue;">Alat Dapur</span>
					</div>
					<div class="panel-body" id="produk">
						<?php 
						foreach($alatDapur->result() as $data){ 
							$pic = explode(';',$data->Foto);
						?>
						<div class="col-md-4">
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
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
								</div>
								<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
								<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
								<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
							</div>
							<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
						</div>
						<?php } ?>
					</div>
					
					<div class="panel-footer">&copy; 2017</div>
				</div>
			</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>
	</div>
		<script>
			function loadKategori(data){
				var url = "<?php echo base_url('home/kategori/'); ?>";  
				var id = data.id;
				$('#produk').load(url+id);
			}
		</script>
		<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	</body>
</html>
<?php 
if(isset($_SESSION['notif'])){
	echo '<script>alert("'.$_SESSION['notif'].'")</script>';
	unset($_SESSION['notif']);
}
?>