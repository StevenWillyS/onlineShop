		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<ul class="nav nav-pills" style="margin-bottom: 50px; border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; padding-bottom: 30px; ">
						<li><a href="<?php echo base_url('member/profile');?>">Personal Information</a></li>
						<li><a href="<?php echo base_url('member/edit');?>">Update Personal Information</a></li>
						<li class="active"><a>Add Item for Sale</a></li>
						<li> <a href="<?php echo base_url('iklan/daftarIklan');?>">My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">Tambah Iklan</h2>
					<div class="col-md-3">
					</div>
					<div class="col-md-6" style="padding-left: 2em; line-height: 2em;" >
						<?php echo form_open_multipart(base_url('iklan/buatIklan')); ?>
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
							<label for="subject">Kategori</label>
							<select name="kategori" class="form-control" required>
								<option value="">---Pilih Kategori---</option>
								<option value="Alat Olahraga">Alat Olahraga</option>
								<option value="Alat Dapur">Alat Dapur</option>
								<option value="Kendaraan">Kendaraan</option>
								<option value="HP & Laptop">HP & Laptop</option>
								<option value="Elektronik">Elektronik</option>
							</select>
							<label for="subject">Judul</label>
							<input class="form-control" name="judul" placeholder="Masukan Judul" type="text" value="<?php echo set_value('judul'); ?>" required/>
							<span style="color:red"><?php echo form_error('judul'); ?></span>
							<label for="email">Harga</label>
							<input class="form-control" name="harga" placeholder="Masukan Harga " type="text" value="<?php echo set_value('harga'); ?>" required />
							<span style="color:red"><?php echo form_error('harga'); ?></span>
							<label for="subject">Jumlah</label>
							<input class="form-control" name="jumlah" placeholder="Jumlah" type="number" value="<?php echo set_value('jumlah'); ?>" required/>
							<span style="color:red"><?php echo form_error('jumlah'); ?></span>
							<label for="subject">Deskripsi (max 2000 karakter)</label>
							<textarea name="deskripsi" placeholder="aku suka kamu" class="form-control" required><?php echo set_value('deskripsi'); ?></textarea>
							<label for="foto">Foto</label>
							<input id="foto" type="file" name="foto[]" multiple="multipart" required>
							<span style="color:red"><?php if(isset($err)) echo $err ?></span>
							<br>
							<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h4>Save Changes</h4></button>
						</div>

					</div>
				</div>
			</div>	
		</div>
	</body>
</html>