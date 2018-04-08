		<div class="row">
			<div class="large-12 columns" >
				<table>
					<tr>
						<th>ID Member</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Tanggal Lahir</th>
						<th>No HP</th>
						<th>Email</th>
					</tr>
					<?php foreach($query->result() as $data){ ?>
					<tr>
						<td><?php echo $data->ID_Member?></td>
						<td><?php echo $data->Username?></td>
						<td><?php echo $data->Nama?></td>
						<td><?php echo $data->TglLahir?></td>
						<td><?php echo $data->No_HP?></td>
						<td><?php echo $data->Email?></td>
						<td><a onclick="return konfirm()" href="deleteMember/<?php echo $data->ID_Member?>">Delete</a></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<a href="logout" class="button alert">Logout</a>
		</div>
		<script>
			function konfirm(){
				if(confirm("Hapus user permanen?")!=true){
					return false
				}
			}
		</script>
	</body>
</html>