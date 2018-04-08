		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-3"></div>
					<ul class="nav nav-pills" style="margin-bottom: 50px; border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; padding-bottom: 30px; ">
						<li  class="active"><a>Personal Information</a></li>
						<li><a href="<?php echo base_url('member/edit');?>">Update Personal Information</a></li>
						<li><a href="<?php echo base_url('iklan/buatIklan');?>">Add Item for Sale</a></li>
						<li> <a href="<?php echo base_url('iklan/daftarIklan');?>">My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">My Profile</h2>
				<div class="col-md-1"></div>
					<div class="col-md-3" style="border-style: solid; border-color: black; width: 250px;">
				<img src="<?php echo base_url("assets/img/$FotoProfil");?>" style="width: 100%; ">
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">ID Member </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Username  </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Nama </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Tanggal Lahir  </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">No Hp </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Email </h3>
					</div>
					<div class="col-md-3">
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $ID_Member; ?> </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $Username; ?> </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $Nama; ?> </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $TglLahir; ?> </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $No_HP; ?> </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">: <?php echo $Email; ?></h3>
					</div>
				</div>
			</div>
		</div>
			<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>

	</body>	
</html>
<?php 
	if(isset($_SESSION['tanda'])){
		echo '<script>alert("'.$_SESSION['tanda'].'")</script>';
		unset($_SESSION['tanda']);
	}
?>