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
						<li  class="active"><a>Personal Information</a></li>
						<li><a href="edit_profile.php">Update Personal Information</a></li>
						<li><a href="tambang_barang.php">Add Item for Sale</a></li>
						<li> <a href="item_list.php">My Items for Sale</a></li>
					</ul>
					<h2 style="text-align: center; margin-bottom: 50px;">My Profile</h2>
				<div class="col-md-1"></div>
					<div class="col-md-3" style="border-style: solid; border-color: black; width: 250px;">
				<img src="img/default.jpg" style="width: 100%; ">
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-6" ">
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">ID Member : </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Username : </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Nama : </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Tanggal Lahir : </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">No Hp : </h3>
						<h3 style="border-bottom: 1px solid rgba(0, 0, 0, 0.15) ; padding-bottom: 10px;">Email : </h3>
					</div>
				</div>
			</div>
		</div>
			<p style="border-bottom: 1px solid rgba(0, 0, 0, 0.55) ; margin : 50px 100px 50px 100px "><br/></p>

		<!-- <div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">Asus Zenfone 2</div>
						<div class="panel-body">
								<img style="height: 300px; width: 100%;" src="img/gadget/hp-asus.jpg">
						</div>
						<div class="panel-heading">Rp 3.000.000
							<button style="float: right;" class="btn btn-warning btn-xs"><span class="fa fa-edit"></span>Edit Iklan</button>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">Asus Zenfone 2</div>
						<div class="panel-body">
								<img style="height: 300px; width: 100%;" src="img/gadget/hp-asus.jpg">
						</div>
						<div class="panel-heading">Rp 3.000.000
							<button style="float: right;" class="btn btn-warning btn-xs"><span class="fa fa-edit"></span>Edit Iklan</button>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">Asus Zenfone 2</div>
						<div class="panel-body">
								<img style="height: 300px; width: 100%;" src="img/gadget/hp-asus.jpg">
						</div>
						<div class="panel-heading">Rp 3.000.000
							<button style="float: right;" class="btn btn-warning btn-xs"><span class="fa fa-edit"></span>Edit Iklan</button>
						</div>
					</div>
				</div> -->

			<!-- </div>
		</div> -->
	</body>	
</html>