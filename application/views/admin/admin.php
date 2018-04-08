		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-3"></div>
				<div class="col-md-2"></div>
					<ul class="nav nav-pills" style=" ">
						<li  class="active"><a>Member List</a></li>
						<li><a href="<?php echo base_url('admin/showIklan'); ?>">Item Verification</a></li>
					</ul>
				</div>
			</div>
		</div>
		<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>

		<div class="col-md-12">
				<div class="col-md-3"></div>
				<h2 style="text-align: center; margin-bottom: 50px;">Member List</h2>
		</div>
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<table class='table table-bordered table-hover'>
					<tr>
						<th>ID Member</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Tanggal Lahir</th>
						<th>No HP</th>
						<th colspan='2'>Email</th>
					</tr>
					<?php foreach($query->result() as $data){ ?>
					<tr>
						<td><?php echo $data->ID_Member?></td>
						<td><?php echo $data->Username?></td>
						<td><?php echo $data->Nama?></td>
						<td><?php echo $data->TglLahir?></td>
						<td><?php echo $data->No_HP?></td>
						<td><?php echo $data->Email?></td>
						<td><a onclick="return konfirm()" href="<?php echo base_url("admin/deleteMember/$data->ID_Member");?>">Delete</a></td>
					</tr>
					<?php }?>
				</table>
			</div>
			</div>
		</div>
		<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>
		<script>
			function konfirm(){
				if(confirm("Hapus user permanen?")!=true){
					return false
				}
			}
		</script>
	</body>	
</html>