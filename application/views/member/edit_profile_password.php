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
					<h2 style="text-align: center; margin-bottom: 50px;">Edit Password</h2>
					<div class="col-md-3"></div>
					<div class="col-md-6" style="padding-left: 2em; line-height: 2em;" >
						<?php echo form_open('member/editPass'); ?>
						<div class="form-group">
							<label for="subject">Password Lama</label>
							<input class="form-control" name="plama" placeholder="Password Lama" type="password" />
							<label for="subject">Password Baru</label>
							<input class="form-control" name="pbaru" placeholder="Password Baru" type="password" />
							<br>
							<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h4>Save Changes</h4></button>
						</div>

					</div>
				</div>
			</div>	
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>