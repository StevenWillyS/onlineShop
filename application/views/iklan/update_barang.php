		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<h2 style="text-align: center; margin-bottom: 50px;">Update My Item</h2>
				</div>

				<div class="col-md-1"></div>
				<div class="col-md-9">
					<div class="col-md-12" style="border-style: solid; border-color: #6b8fc8; margin-top: 2em">
						<div class="col-md-3" style="text-align:center">
							<img src="<?php $foto = explode(';',$Foto); echo base_url("assets/img/iklan/$foto[0]"); ?>" style="height: 200px; width: 100%; margin-top: 20px;">
							<a href='<?php echo base_url("iklan/edit/foto/$ID_Iklan"); ?>' class="btn btn-info">Update Foto</a>
						</div>
						<div class="col-md-9">
							<?php echo form_open(base_url("iklan/edit/$ID_Iklan")); ?>
							<div class="form-group">
								<label for="subject">Kategori</label>
								<select name="kategori" class="form-control">
									<option value="">---Pilih Kategori---</option>
									<option <?php if($Kategori=='Alat Olahraga') echo 'selected'?> value="Alat Olahraga">Alat Olahraga</option>
									<option <?php if($Kategori=='Alat Dapur') echo 'selected'?> value="Alat Dapur">Alat Dapur</option>
									<option <?php if($Kategori=='Kendaraan') echo 'selected'?> value="Kendaraan">Kendaraan</option>
									<option <?php if($Kategori=='HP & Laptop') echo 'selected'?> value="HP & Laptop">HP & Laptop</option>
									<option <?php if($Kategori=='Elektronik') echo 'selected'?> value="Elektronik">Elektronik</option>
								</select>
								<label for="subject">Judul</label>
								<input class="form-control" name="judul" placeholder="Masukan Judul" value="<?php echo $Judul;?>" type="text" />
								<label for="email">Harga</label>
								<input class="form-control" name="harga" placeholder="Masukan Harga " value="<?php echo $Harga;?>" type="text"  />
								<label for="subject">Jumlah</label>
								<input class="form-control" name="jumlah" placeholder="Jumlah" value="<?php echo $Jumlah;?>" type="number" />
								<label for="subject">Deskripsi (max 2000 karakter)</label>
								<textarea name="deskripsi" placeholder="aku suka kamu" class="form-control"><?php echo $Deskripsi;?></textarea>
								<br>
								<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h4>Save Changes</h4></button>
							</div>
						</div>
					</div>
				</div>
				<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>
			</div>	
		</div>
	</body>
</html>