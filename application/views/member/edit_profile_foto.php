		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<ul class="nav nav-pills" style="margin-bottom: 50px; border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; padding-bottom: 30px; ">
					<li><a href="<?php echo base_url('member/profile');?>">Personal Information</a></li>
						<li class="active"><a>Update Personal Information</a></li>
						<li><a href="<?php echo base_url('iklan/buatIklan');?>">Add Item for Sale</a></li>
						<li> <a href="<?php echo base_url('iklan/daftarIklan');?>">My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">Ganti Foto</h2>
					<div class="col-md-5"></div>
					<?php echo form_open_multipart('member/editFoto'); ?>
					<div class="col-md-4" style="border-style: solid; border-color: black; width: 250px; height: 300px; text-align:center;">
						<img src="<?php echo base_url("assets/img/$FotoProfil"); ?>" style="width: 100%; height: 80%"> <br>
						<input name="foto" type="file" required/>
						<input type="submit" class="btn btn-info" value="Ganti Foto">
					</div>
					</form>
					<div class="col-md-1"></div>
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