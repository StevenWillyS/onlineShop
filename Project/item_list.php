<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIAPBELANJA</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Siap Belanja</a>
				</div>	
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="fa fa-home"></span>Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-shopping-cart"></span>Cart <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class ="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in IDR</div>
								</div>	
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width: 300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" required>
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" required>
									<p><br/></p>
									<a href="#" style="color: white; list-style: none">Lupa Password</a><input type="submit" class="btn btn-success" style="float: right;" id="login" value="Login">
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="customer_registration.php"><span class="fa fa-user"></span>SignUp</a></li>
			</ul>
			</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<ul class="nav nav-pills" style="margin-bottom: 50px; border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; padding-bottom: 30px; ">
						<li><a href="profile.php">Personal Information</a></li>
						<li><a href="edit_profile.php">Update Personal Information</a></li>
						<li><a href="tambah_barang.php">Add Item for Sale</a></li>
						<li class="active"> <a>My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">My Item</h2>
				</div>

				<div class="col-md-1"></div>
				<div class="col-md-9">
					<div class="col-md-12" style="border-style: solid; border-color: #6b8fc8; margin-top: 2em">
						<div class="col-md-3">
							<img src="img/default.jpg" style="height: 200px; width: 100%; margin-top: 20px;">
						</div>
						<div class="col-md-9">
							<div id="itemlist_desc" style="padding: 5px;">
								<p style="font-size: 1.5em ;">Nama : Carrier Bag 50L by Trail</p>
								<p>Kategori : Camping </p>
								<p>Harga : Rp. 1.200.000 </p>
								<p>Status : On Sale</p>
								<p>Deskripsi : Masih baru dan siap pakai buat camping! (Hanya tersedia dalam warna hijau saja)</p>
							</div>
							<div class="form-group">
								<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h5><a href="update_barang.php" style="text-decoration: none; color: white">Update Item Profile</a></h5></button>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="border-style: solid; border-color: #6b8fc8; margin-top: 2em">
						<div class="col-md-3">
							<img src="img/default.jpg" style="height: 200px; width: 100%; margin-top: 20px;">
						</div>
						<div class="col-md-9">
							<div id="itemlist_desc" style="padding: 5px;">
								<p style="font-size: 1.5em ;">Nama : Carrier Bag 50L by Trail</p>
								<p>Kategori : Camping </p>
								<p>Harga : Rp. 1.200.000 </p>
								<p>Status : On Sale</p>
								<p>Deskripsi : Masih baru dan siap pakai buat camping! (Hanya tersedia dalam warna hijau saja)</p>
							</div>
							<div class="form-group">
								<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h5><a href="#" style="text-decoration: none; color: white">Update Item Profile</a></h5></button>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="text-align: center">
						<ul class="pagination pagination-lg">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
						</ul>
					</div>	

				</div>
			</div>	
		</div>
	</body>
</html>