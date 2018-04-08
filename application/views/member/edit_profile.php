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
					<h2 style="text-align: center; margin-bottom: 50px;">Edit Profile</h2>
					<div class="col-md-1"></div>
					<div class="col-md-3" style="border-style: solid; border-color: black; width: 250px; height: 250px; text-align:center;">
						<img src="<?php echo base_url("assets/img/$FotoProfil");?>" style="width: 100%; height: 90%"> <br>
						<a href="<?php echo base_url('member/editFoto');?>">Ganti Foto</a>
			 		</div>
					<div class="col-md-1"></div>
					<div class="col-md-6" style="padding-left: 2em; line-height: 2em;" >
						<?php echo form_open(base_url('member/edit')) ?>
						<div class="form-group">
							<label for="subject">Nama</label>
							<input class="form-control" value="<?php echo $Nama ?>" name="nama" placeholder="Masukan Nama Anda" type="text" required />
							<label for="subject">Tanggal Lahir</label>
							<input class="form-control" value="<?php echo $TglLahir ?>" name="tglLahir" placeholder="Masukan Tgl Lahir Anda (ex: 1997-01-31)" type="text" required/>
							<label for="email">Email</label>
							<input class="form-control" value="<?php echo $Email ?>" name="email" placeholder="Masukan Alamat Email Anda" type="text" required />
							<label for="email">No HP</label>
							<input class="form-control" value="<?php echo $No_HP ?>" name="noHP" placeholder="Masukan No HP Anda" type="text" required />
							<br>
							<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h4>Save Changes</h4></button>
							<br>
							<h4><a href="<?php echo base_url('member/editPass'); ?>">Ganti Password</a></h4>
						</div>
						</form>
					</div>
				</div>
			</div>	
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
<?php 
	if(isset($_SESSION['tanda'])){
		echo '<script>alert("'.$_SESSION['tanda'].'")</script>';
		unset($_SESSION['tanda']);
	}
?>