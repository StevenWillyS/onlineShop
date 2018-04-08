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
						<li class="active"><a>Add Item for Sale</a></li>
						<li> <a href="item_list.php">My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">My Profile</h2>
					<div class="col-md-1"></div>
					<div class="col-md-3" style="border-style: solid; border-color: black; width: 250px; height: 250px">
						<img src="img/default.jpg" style="width: 100%; height: 90%"> <br>
						<input name="dpicture" type="file" />
			 		</div>
					<div class="col-md-1"></div>
					<div class="col-md-6" style="padding-left: 2em; line-height: 2em;" >


						<div class="form-group">
							<label for="subject">Judul</label>
							<input class="form-control" name="judul" placeholder="Masukan Judul" type="text" />
							<label for="subject">Kategori</label>
							<select name="kategori" class="form-control">
								<option value="">---Pilih Kategori---</option>
								<option value="1">Alat Olahraga</option>
								<option value="2">Alat Dapur</option>
								<option value="3">Kendaraan</option>
								<option value="4">HP & Laptop</option>
								<option value="5">Elektronik</option>
							</select>
							<label for="email">Harga</label>
							<input class="form-control" name="harga" placeholder="Masukan Harga " type="text"  />
							<label for="subject">Jumlah</label>
							<input class="form-control" name="jumlah" placeholder="Jumlah" type="number" />
							<label for="subject">Deskripsi (max 2000 karakter)</label>
							<textarea name="deskripsi" placeholder="aku suka kamu" class="form-control"></textarea>
							<br>
							<button name="submit" type="submit" class="btn btn-info" style="width: 100%; text-align: center"><h4>Save Changes</h4></button>
							<!--<span class="text-danger"><?php echo form_error('nohp'); ?></span>-->
						</div>

					</div>
				</div>
			</div>	
		</div>
	</body>
</html>