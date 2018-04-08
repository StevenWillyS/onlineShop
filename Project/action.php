<?php
include "db.php";
if(isset($_POST["kategori"])){
	$kategori_query = "SELECT * FROM kategori";
	$run_query = mysqli_query($con, $kategori_query);
	echo "
		<div class='nav nav-pills bav-stacked'>
			<li class='active'><a href='#''><h4>Categories<h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["kat_id"];
			$cat_name = $row["kat_title"];
			echo "
			<li><a href='#' class= 'kategori' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["getProduct"])){
	$produk_query = "SELECT * FROM produk ORDER BY RAND() LIMIT 0,9";
	$run_query = mysqli_query($con, $produk_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id = $row['produk_id'];
			$pro_cat = $row['produk_cat'];
			$pro_title = $row['produk_title'];
			$pro_price = $row['produk_price'];
			$pro_image = $row['produk_image'];
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$pro_title</div>
						<div class='panel-body'>
							<img src='img/$pro_image' style = 'width:160px; height:250px;'/>
						</div>
						<div class='panel-heading'>Rp $pro_price.
						<button pid='$pro_id' style='float: right;' class='btn btn-danger btn-xs'>AddToCart</button>
						</div>
					</div>
				</div>
			";
		}
	}
}
if(isset($_POST["get_selected_Category"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * from produk WHERE produk_cat = '$id'";
	}else{
		$keyword = $_POST["keyword"];
		$sql = "SELECT * from produk WHERE produk_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id = $row['produk_id'];
			$pro_cat = $row['produk_cat'];
			$pro_title = $row['produk_title'];
			$pro_price = $row['produk_price'];
			$pro_image = $row['produk_image'];
			echo "
				<div class='col-md-4'>
					<div class='panel panel-info'>
						<div class='panel-heading'>$pro_title</div>
						<div class='panel-body'>
							<img src='img/$pro_image' style = 'width:160px; height:250px;'/>
						</div>
						<div class='panel-heading'>Rp $pro_price.
						<button pid='$pro_id' style='float: right;' class='btn btn-danger btn-xs'>AddToCart</button>
						</div>
					</div>
				</div>
			";
	}
}

?>