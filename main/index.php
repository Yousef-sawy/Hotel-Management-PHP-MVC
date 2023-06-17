<?php
session_start();


if (isset($_SESSION["user_id"])) {
  $userId = $_SESSION["user_id"];
  // Use the $userId as needed
  echo "User ID: " . $userId;
  $booking_url = 'booking.php?user_id=' . $userId;
} else {
  echo "User ID not found in session";
}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Motel Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Al Shams <em>Motel</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
 
                <li class="nav-item"><a class="nav-link" href="products.php">Rooms</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="<?php echo $booking_url; ?>">Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li> -->
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
 
                <li class="nav-item dropdown active">
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
  
                     <div class="dropdown-menu">
                       <a class="dropdown-item active" href="about-us.php">About Us</a>
                       <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                       <a class="dropdown-item" href="terms.php">Terms</a>
                     </div>
                 </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
 

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Book your room today!</h4>
            <h2>AL SHAMS MOTEL</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4></h4>
            <h2></h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4></h4>
            <h2></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Rooms</h2>
              <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/single.jpg" alt=""></a>
              <div class="down-content">
                <a href="booking.php"><h4>Single Room</h4></a>
                <h6>$100.00/Night</h6>
                <p>This is a room that is suitable for one person.</p>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/double.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Double Room</h4></a>
                <h6>$250.00/Night</h6>
                <p>This is a room that is suitable for two people.</p>
              </div>
            </div>
          </div> -->

          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/triple.jpg" alt=""></a>
              <div class="down-content">
                <a href="booking.php"><h4>Triple Room</h4></a>
                <h6><small><del>$350.00</del></small>$325.00/Night</h6>
                <p>This is a room that is suitable for 3 people.</p>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/king.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>King Size</h4></a>
                <h6><small><del>$500.00</del></small>$450.00</h6>
                <p>This is a king sized room.</p>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/product-5-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$999.00 </del></small> $779.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta voluptas quia dolor fuga odit.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php"><img src="assets/images/product-6-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.php"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$999.00 </del></small> $779.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta voluptas quia dolor fuga odit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>At Al Shams Motel, we’re passionate about providing exceptional hospitality and top-notch service to our guests. Our team is dedicated to making your stay as comfortable and convenient as possible, whether you’re traveling for business or pleasure.</p>
              <!-- <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
              </ul> -->
              <a href="about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/other-image-fullscren-1-1920x900.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Clients</h2>

              <a href="testimonials.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>John Smith</h4>
                  <p class="n-m"><em>"I had a wonderful stay at Al Shams Motel. I would definitely recommend it to anyone visiting the area."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jane Johnson</h4>
                  <p class="n-m"><em>"My experience at Al Shams Motel was fantastic. I will definitely be returning on my next trip."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Michael Brown</h4>
                  <p class="n-m"><em>"I can't say enough good things about Al Shams Motel. It truly felt like a home away from home."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>John Doe</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jane Smith</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Antony Davis</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Al Shams Motel is located in the beautiful coastal town of Dahab, Egypt.</h4>
                  <p>Comfortable and affordable!</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
          
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>