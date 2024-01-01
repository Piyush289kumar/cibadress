<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ciba Garments</title>
    <link rel="shortcut icon" type="x-con" href="../img/logo.png">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="style.css" />

  </head>

  <body >
    
    <!-- Head Section Start -->
    <section id="header">
      <a href="#"><img src="img/logo.png" alt="logo" class="logo" /></a>

      <!-- Nav Bar -->
      <div>
        <ul id="navbar">
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="index.php">Shop</a></li>
          <li><a href="index.php">About</a></li>
          <li><a href="index.php">Contact</a></li>
          <li><a href="admin/index.php"><i class="far fa-user"></i></a></li>
          <li id="lg-bag"><i id="darkModeIcon" class="far fa-solid fa-moon" onclick="toggleFnc(this)"></i></li>
          <a href="#" id="clone"><i class="far fa-times"></i></a>
        </ul>
      </div>
      <div id="mobile">
        <i id="darkModeIcon" class="far fa-solid fa-moon" onclick="toggleFnc(this)"></i>
        <i id="bar" class="fas fa-outdent"></i>
      </div>
    </section>
    <!-- Head Section End -->
    
    
   
    <!-- Banner Section Start -->
    <section id="hero">
      <h4>Uniforms & Dresses</h4>
      <!-- <h2>Super value deals</h2> -->
      <h1>Ciba Dresses</h1>
      <h4>(The Tailor Shop)</h4>
      <p>Computer Embroidery, Army Name Plate, Unifroms, Blezers, Stitching, Logo Design & many more..</p>
      <button>Shop Now</button>
      <button style="background-color: #fff; padding: 8px 10px; margin-top: 25px; font-weight: 600;"><a href="tel:+91 9300623768" style="color: #222; background: #fff !important;">📞 +91 93006-23768</a></button>

      <button style="background-color: #fff; padding: 8px 10px; margin-top: 5px; font-weight: 600;"><a href="tel:+91 9977366665" style="color: #222; background: #fff !important;">📞 +91 99773-66665</a></button>
    </section>
    <!-- Banner Section End -->

    <!-- Feature Section -->
    <section id="feature" class="section-p1">
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/computerEmbroidoery.jpg" alt="Computer Embroidery" />
        <h6>Computer Embroidery</h6>
      </div>
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/logoDesign.svg" alt="Logo Design" />
        <h6>Logo Design</h6>
      </div>
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/serviceUniform.svg" alt="Service Uniform" />
        <h6>Service Uniform</h6>
      </div>
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/namePlate.jpg" alt="Name Plate" />
        <h6>Name Plate</h6>
      </div>
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/Blezer.svg" alt="Blezer's" />
        <h6>Blezer's</h6>
      </div>
      <!-- Feature Box Child -->
      <div class="fe-box">
        <img src="img/features/schoolDress.svg" alt="School Dress" />
        <h6>School Dress</h6>
      </div>
    </section>

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
    
    <hr>

    <!-- Discount Banner Section
    <section id="banner" class="section-m1">
      <h4>Repair Services</h4>
      <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
      <button class="normal">Explore More</button>
    </section>
    Discount Banner Section -->
    
    
    <!-- New Arrivals Products Section -->
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

    <!-- Newsletter Section Start 
    <section id="newsletter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletter</h4>
        <p>
          Get E-Mail updates about our latest shop and
          <span>special offers.</span>
        </p>
      </div>

      <form action="#" class="form">
        <input type="email" placeholder="Your Email Address" />
        <button type="submit" class="normal">Sign Up</button>
      </form>
    </section>

     Footer Section Start -->
   <?php include('footer.php');?>