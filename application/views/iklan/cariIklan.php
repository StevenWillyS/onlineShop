<?php 
foreach($iklan->result() as $data){ 
	$pic = explode(';',$data->Foto);
?>
<div class="col-md-4">
	<?php if(isset($_SESSION['login'])){
		echo form_open('beli/tambahCart');
		$kirim = array(
			'ID_Iklan' => $data->ID_Iklan,
			'jumlah' => 1,
			'page' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
		);
		echo form_hidden($kirim);
		}
	?>
	<div class="panel panel-info">
		<div class="panel-heading"><a href='<?php echo base_url("iklan/lihat/$data->ID_Iklan"); ?>'><?php echo $data->Judul; ?></a></div>
		<div class="panel-body">
			<img style="height: 300px; width: 100%;" src="<?php echo base_url().'assets/img/iklan/'.$pic[0]?>">
		</div>
		<div class="panel-heading">Rp <?php echo number_format($data->Harga,2,",","."); ?>
		<input type="submit" style="float: right;" class="btn btn-danger btn-xs" value="AddToCart"
		<?php if($data->Jumlah==0) echo "disabled"; ?>></div>
	</div>
	<?php if(isset($_SESSION['login'])) echo '</form>'; ?>
</div>
<?php } ?>