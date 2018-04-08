<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIAPBELANJA</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/style1.css"> -->
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Siap Belanja</a>
			</div>	
			<ul class="nav navbar-nav">
				<li><a href="#"><span class="fa fa-home"></span>Home</a></li>
				<li style="width:400px;left:10px;top: 10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top: 10px;left: 20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
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
	<div id="container">
		<div id="carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="img/tron.jpg" alt="gadget" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Looking for something for your beloved ones?</h3>
                <p>Gifts and souvenirs for those people you cherish!</p>
              </div>
            </div>

            <div class="item">
              <img src="img/truck.jpg" alt="Kendaraan" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Heading to the secondhand car?</h3>
                <p>We have everything you need</p>
              </div>
            </div>

            <div class="item">
              <img src="img/jogging.png" alt="Jogging" style="width:100%; height: 450px;">
              <div class="carousel-caption">
                <h3>Building a healthy life style?</h3>
                <p>Scroll thru our huge list of sportswear</p>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
	</div>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills bav-stacked">
					<li class="active"><a href="#"><h4>Categories<h4></a></li>
					<li><a href="#">Alat Olahraga</a></li>
					<li><a href="#">Elektronik</a></li>
					<li><a href="#">Handphone & laptop </a></li>
					<li><a href="#">Kendaraan</a></li>
					<li><a href="#">Alat Dapur</a></li>
				</div>-->
			</div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!-- here we get product with jquery ajax request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Asus Zenfone 2</div>
								<div class="panel-body">
									<img style="height: 300px; width: 100%;" src="img/gadget/hp-asus.jpg">
								</div>
								<div class="panel-heading">Rp 3.000.000
								<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button></div>
							</div>
						</div>-->
					</div>
					<div class="panel-footer">&copy; 2017</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>



		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>