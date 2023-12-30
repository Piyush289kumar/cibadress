<?php include('header.php');
include('config.php'); ?>
		
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/bg1.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<!-- <div class="text">
									<h1>We Provide <span>Education</span> That You Can <span>Trust!</span></h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
									<div class="button">
										<a href="#" class="btn">Enquiry Button</a>
										<a href="#" class="btn primary">Learn More</a>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/bg2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<!-- <div class="text">
									<h1>We Provide <span>Education</span> That You Can <span>Trust!</span></h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
									<div class="button">
										<a href="#" class="btn">Enquiry Button</a>
										<a href="#" class="btn primary">Learn More</a>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/bg3.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<!-- <div class="text">
									<h1>We Provide <span>Education</span> That You Can <span>Trust!</span></h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
									<div class="button">
										<a href="#" class="btn">Enquiry Button</a>
										<a href="#" class="btn primary">Learn More</a>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa-solid fa-trophy"></i>
										<!-- <i class="fa fa-ambulance"></i> -->
									</div>
									<div class="single-content">
										<!-- <span>Uniforms & Dresses</span> -->
										<h4>Uniforms & Dresses</h4>
										<p>Advocate Uniforms, School Uniforms, Security Guard Uniforms, Doctor and Nurses Uniforms & Other Service Uniforms.</p>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="fa-solid fa-school"></i>
										<!-- <i class="icofont-prescription"></i> -->
									</div>
									<div class="single-content">
										<h4>Blezers</h4>
										
										<p>Advocate Blezers, School Blezers,
											Security Guard Blezers, Doctor Blezers<br>& Other Service Blezers.</p>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<!-- <i class="icofont-ui-clock"></i> -->
										<i class="fa-solid fa-user-graduate"></i>
									</div>
									<div class="single-content">
										<h4>Opening Hours & Contact</h4>
										<ul class="time-sidual">
											<li class="day">Sunday - Saturday:<span>10.00 AM -08.00 PM</span></li>
											<li class="day">Monday: <span>Close</span></li>
											
											<li class="day" style="padding-top: 13px;">Mobile 1: <span>93006-23768</span></li>
											<li class="day">Mobile 1: <span>99773-66665</span></li>
											
										</ul>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->




		 <!-- Featured Products Section -->
		 <section id="product1" class="section-p1">
			<h2>Featured Products</h2>
			<p>Summer Collection New Morden Design</p>
			<div class="pro-container">
	  
	   
							<?php
							  include("config.php");
							  
							  $sql_show_user = "SELECT * FROM post WHERE category = 'First Block' ORDER BY post_id DESC LIMIT 0, 8";
							  $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
							  if (mysqli_num_rows($result_sql_show_user) > 0) {
								  while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
	  
									  ?> 
			  <!-- Product Card Start -->
			  <div class="pro">
				<img src="<?php echo 'admin/upload/'. $row['post_img']; ?>" alt="product picture" /> 
				<!-- <img src="img/products/f2.jpg" alt="product picture" /> -->

				<div class="des">

 				  <!-- <span>Adidas</span> -->
				  <h5><?php echo $row['title']; ?></h5>
				 
				 
				  <div class="star">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				  </div>

				 
				  

				 
				  <h4>₹ <?php echo $row['pro_price']; ?>/-</h4>
				  
				</div>
				<a href="enquery.php?post_id=<?php echo ($row["post_id"]) ?>" class='cart' style='width:110px;'>Enquery</a>
				<!-- <a href="#" class='cart' style='width:110px;'>Enquery</a> -->
			  </div>
			  <!-- Product Card End -->
			<?php }} ?> 
	  
	  
			</div>
		  </section>


		     <!-- Small Banner -->
			 <div id="sm-banner" class="section-p1">
				<!-- Banner Box -->
				<div class="banner-box">
				  <h4></h4>
				  <h2>Service Uniform</h2>
				  <!-- <span>The best classic dress is on sale at cara</span> -->
				  <!-- <button class="white">learn More</button> -->
				</div>
		  
				<!-- Banner Box -->
				<div class="banner-box banner-box2">
				  <!-- <h4>School Uniform</h4> -->
				  <h2>School Uniform</h2>
				  <!-- <span>The best classic dress is on sale at cara</span> -->
				  <!-- <button class="white">Learn More</button> -->
				</div>
			  </div>
		  
			  <!-- subBanner Section Start -->
			  <div id="banner3">
				<!-- Banner Box -->
				<div class="banner-box">
				  <h2>Docter &<br>Nurse</h2>
				  <h3>Uniform</h3>
				</div>
		  
				<!-- Banner Box -->
				<div class="banner-box banner-box2">
				  <h2>Advocate</h2>
				  <h3>Uniform & Blezer</h3>
				</div>
		  
				<!-- Banner Box -->
				<div class="banner-box banner-box3">
				  <h2>Flag Stitching</h2>
				  <h3>& Many more</h3>
				</div>
			  </div>
			  <!-- subBanner Section End -->

		




		 <!-- Featured Products Section -->
		 <section id="product1" class="section-p1">
			<h2>New Arrivals</h2>
			<p>Summer Collection New Morden Design</p>
			<div class="pro-container">
	  
	   
							<?php
							  include("config.php");
							  
							  $sql_show_user = "SELECT * FROM post WHERE category = 'Second Block' ORDER BY post_id DESC LIMIT 0, 8";
							  $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
							  if (mysqli_num_rows($result_sql_show_user) > 0) {
								  while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
	  
									  ?> 
			  <!-- Product Card Start -->
			  <div class="pro">
				<img src="<?php echo 'admin/upload/'. $row['post_img']; ?>" alt="product picture" />
				<!-- <img src="img/products/f2.jpg" alt="product picture" /> -->

				<div class="des">

 				  <!-- <span>Adidas</span> -->
				  <h5><?php echo $row['title']; ?></h5>
				 
				 
				  <div class="star">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				  </div>

				 
				  

				 
				  <h4>₹ <?php echo $row['pro_price']; ?>/-</h4>
				  
				</div>
				<a href="enquery.php?post_id=<?php echo ($row["post_id"]) ?>" class='cart' style='width:110px;'>Enquery</a>
				
			  </div>
			  <!-- Product Card End -->
									  <?php }} ?>
	  
	  
			</div>
		  </section>





		  <?php include('footer.php');