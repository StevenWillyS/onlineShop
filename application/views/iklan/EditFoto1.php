 		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<h2 style="text-align: center; margin-bottom: 50px;">Update Foto</h2>
					<div class="col-md-12" style="text-align:center;"><a class="btn btn-success" href="<?php echo base_url("iklan/edit/$data->ID_Iklan") ?>">Back</a></div>	
				</div>	
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="col-md-12" style="border-style: solid; border-color: #6b8fc8; margin-top: 2em; padding-bottom:2em">
						<?php foreach($foto as $f) {
							if($f=='') continue;
						?>
						<div class="col-md-4" style="margin-top: 20px;border: 2px solid #6b8fc8; text-align:center;">
							<?php echo form_open_multipart(base_url("iklan/edit/foto/$data->ID_Iklan/$f/edit")); ?>
							<img src="<?php echo base_url("assets/img/iklan/$f"); ?>" style="height: 200px; width: 100%;">
							<input required type='file' name='foto'>
							<a onclick="return konfirm()" class="btn btn-danger" href="<?php echo base_url("iklan/edit/foto/$data->ID_Iklan/$f/delete");?>">Hapus</a>
							<input type="submit" class="btn btn-info" value="Edit" name="buat">
							</form>
						</div>
						<?php } ?>
						<div class="col-md-4" style="margin-top: 20px;border: 2px solid #6b8fc8; text-align:center;">
							<?php echo form_open_multipart(base_url("iklan/edit/foto/$data->ID_Iklan/null/tambah")); ?>
							<div class="form-group">
								<img src="<?php echo base_url("assets/img/iklan/default.png"); ?>" style="height: 200px; width: 100%;">
								<input type="file" name="tambahFoto" required>
								<input class = "btn btn-info" type="submit" value="Tambah Foto">
							</div>
							</form>
						</div>
					</div>
				</div>
				<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>
			</div>	
		</div>
		<script>
			function konfirm(){
				if(confirm("Hapus Foto Iklan?")!=true){
					return false
				}
			}
		</script>
	</body>
</html>