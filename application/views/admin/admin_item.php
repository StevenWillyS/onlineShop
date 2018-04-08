		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-3"></div>
				<div class="col-md-2"></div>
					<ul class="nav nav-pills">
						<li><a href="<?php echo base_url('admin/showMember');?>">Member List</a></li>
						<li  class="active"><a>Item Verification</a></li>
					</ul>
			</div>
		</div>
		<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>

		<div class="col-md-12">
				<div class="col-md-3"></div>
				<h2 style="text-align: center; margin-bottom: 50px;">Item Verification</h2>
		</div>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<?php						
						 foreach($query->result() as $data){ 
							$pic = explode(';',$data->Foto);
						 ?>
						<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="<?php echo base_url("assets/img/iklan/$pic[0]"); ?>">
									by: <a href='<?php echo base_url("member/profile/$data->Username"); ?>'><?php echo $data->Username; ?></a><br>
									Rp.<?php echo number_format($data->Harga,2,',','.'); ?><br>
									<?php
										if($data->Verifikasi==0){
											echo "<p style='font-size:12px;color:red;'>Belum terverifikasi</p>";
										} else {
											echo "<p style='font-size:12px;color:green;'>Sudah terverifikasi</p>";
										}
									 ?>
								</div>
								<div class="panel-heading">
									<a onclick="return konfirm()" class="btn btn-danger" href="<?php echo base_url("admin/hapus/$data->ID_Iklan"); ?>">Hapus</a>
									<a class="btn btn-success" href="verifikasi/<?php echo $data->ID_Iklan?>"
									<?php if($data->Verifikasi==1) echo 'disabled'?>>Verifikasi</a>
								</div>
							</div>
						</div>
						 <?php } ?>
					</div>
					<div class="panel-footer">&copy; 2017</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>
	<script>
			function konfirm(){
				if(confirm("Hapus iklan permanen?")!=true){
					return false
				}
			}
		</script>
	</body>
</html>
<?php 
	if(isset($_SESSION['tanda'])){
		echo '<script>alert("'.$_SESSION['tanda'].'");</script>';
		unset($_SESSION['tanda']);
	}
?>