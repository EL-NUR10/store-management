<?php 
include_once './includes/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Liquor Store - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./indexPage/css/animate.css">
    
    <link rel="stylesheet" href="./indexPage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./indexPage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./indexPage/css/magnific-popup.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" href="./indexPage/css/flaticon.css">
    <link rel="stylesheet" href="./indexPage/css/style.css">
  </head>
  <body>

  	
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="./">Smart <span>store</span></a>
	      <div class="order-lg-last btn-group">
          <div class="dropdown-menu dropdown-menu-right">
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-1.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Bacardi 151</h4>
				    		<p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity: 01</span></p>
				    	</div>
				    </div>
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-2.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Jim Beam Kentucky Straight</h4>
				    		<p class="mb-0"><a href="#" class="price">$30.89</a><span class="quantity ml-3">Quantity: 02</span></p>
				    	</div>
				    </div>
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-3.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Citadelle</h4>
				    		<p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity: 01</span></p>
				    	</div>
				    </div>
				    <a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
				    	View All
				    	<span class="ion-ios-arrow-round-forward"></span>
				    </a>
				  </div>
        </div>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="./" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
	          
	          <li class="nav-item"><a href="products" class="nav-link">Product</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="./">Home <i class="fas fa-chevron-right"></i></a></span> <span>Products <i class="fas fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Products</h2>
          </div>
        </div>
      </div>
    </section>


			<!-- Selecting Product Start -->
			<?php 
                    $selecting_products = mysqli_query($connect,'SELECT * FROM `products` 
                    INNER JOIN `category`
                    ON `products`.`category_id` = `category`.`category_id`');
                ?>
            <!-- Selecting Product End -->


    <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
						<?php 
						$prd_no = 0;
                            while ($row = mysqli_fetch_assoc($selecting_products)) {
								$prd_no++;
                                $product_name = $row["product_name"];
                                $category_name = $row["category_name"];
                                $selling_price = $row["selling_price"];
                                $discount_price = $selling_price - 120;
                                $quantity = $row["quantity"];
                                $product_details = $row["product_details"];

                                echo '
							<div class="col-md-4 d-flex">
								<div class="product ftco-animate">
									<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/prod-'. $prd_no .'.jpg);">
										<div class="desc">
											<p class="meta-prod d-flex">
												<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
												<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
												<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
											</p>
										</div>
									</div>
									<div class="text text-center">
										<span class="category">'. $category_name .'</span>
										<h2>'. $product_name .'</h2>
										<p class="mb-0"><span class="price price-sale">'. $selling_price .'</span> <span class="price">'. $discount_price .'</span></p>
									</div>
								</div>
							</div>
                                ';
                            }
                        ?>
						</div>
						<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
					</div>

			<!-- Selecting Categories Start -->
				<?php 
					$selecting_categories = mysqli_query($connect,'SELECT * FROM `category`');
				?>
            <!-- Selecting Categories End -->

					<div class="col-md-3">
						<div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Product Types</h3>
                <ul class="p-0">
				<?php 
                                while ($row = mysqli_fetch_assoc($selecting_categories)) {
                                    $category_name = $row["category_name"];
                                    echo '
										<li>
											<a href="#">'. $category_name .' <span class="fas fa-chevron-right"></span></a>
										</li>
                                    ';
                                }
                            ?>
                	
                </ul>
              </div>
            </div>

					</div>
				</div>
			</div>
		</section>


		<div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-8 col-md-6 col-lg-3 m-auto">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
	          </div>
	        </div>
      	</div>
      </div>
    

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="./indexPage/js/jquery.min.js"></script>
  <script src="./indexPage/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="./indexPage/js/popper.min.js"></script>
  <script src="./indexPage/js/bootstrap.min.js"></script>
  <script src="./indexPage/js/jquery.easing.1.3.js"></script>
  <script src="./indexPage/js/jquery.waypoints.min.js"></script>
  <script src="./indexPage/js/jquery.stellar.min.js"></script>
  <script src="./indexPage/js/owl.carousel.min.js"></script>
  <script src="./indexPage/js/jquery.magnific-popup.min.js"></script>
  <script src="./indexPage/js/jquery.animateNumber.min.js"></script>
  <script src="./indexPage/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script src="./indexPage/js/main.js"></script>
    
  </body>
</html>