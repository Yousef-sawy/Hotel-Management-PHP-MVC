<?php
session_start();
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

    <title>Booking</title>

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
   
      <?php
  include_once "../models/paymentMethod.php";
  include_once "../models/user.php";
  include_once "../models/booking.php";
  $payment = paymentMethod::getPaymentMethodList();
  $guestList = user::getGuestList();

  if (isset($_SESSION["user_id"])) {
    $GuestId = $_SESSION["user_id"];
    $guest = booking::getBookingById($GuestId);
  } else {
    $guest = false;
  }
?>

<!-- Page Content -->
<div class="page-heading about-heading header-text" style="background-image: url(assets/images/1600480260_4.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4></h4>
          <h2>Booking</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="products call-to-action">
  <div class="container">
    <div class="inner-content">
      <div class="contact-form">
        <form method="post" action="../controller/bookingController.php">
          <div class="row">
            <div class="col-sm-6 col-xs-12">
            <label for="guest_id" class="control-label">Guest ID:</label>
              <select name="guest_id" required class="form-control">
                <option value="">Select Guest</option>
                <?php
                foreach ($guestList as $user) {
                  if ($user->getId() == $GuestId) {
                    echo '<option value="' . $user->getId() . '">' . $user->getId() . ' - ' . $user->getFullName() . '</option>';
                  }
                }
                ?>
              </select>
        </div>
        <div class="col-sm-6 col-xs-12">
        </div>
      </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Check-in Date:</label>
                <input type="date" id="check-in-date" class="form-control" name="check_in" required>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Check-out Date:</label>
                <input type="date" id="check-out-date" class="form-control" name="check_out" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Duration of Stay:</label>
                <input type="text" id="duration-of-stay" class="form-control" name="duration" readonly>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Date of Booking:</label>
                <input type="text" id="today-date" class="form-control" name="booking_date" value="<?php echo date('Y-m-d'); ?>" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Rooms Booked:</label>
                <input type="number" id="rooms-booked" class="form-control" name="rooms_booked" min="1" required>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="payment_type">Payment Type:</label>
                <select name="payment_type" required class="form-control">
                  <option value="">Select Payment Method</option>
                  <?php
                  foreach ($payment as $pay) {
                    echo '<option value="' . $pay->getId() . '">' . $pay->getName() . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">
              <input type="checkbox">
              I agree with the <a href="terms.php" target="_blank">Terms &amp; Conditions</a>
            </label>
          </div>
          <div class="clearfix">
            <a href="products.php" class="filled-button pull-left">Back</a>
            <button type="submit" name="new" class="filled-button pull-right">Book</button>
          </div>
        </form>
        
        
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>

    <script>
    // Calculate the duration of stay
    function calculateDuration() {
      var checkInDate = new Date($('#check-in-date').val());
      var checkOutDate = new Date($('#check-out-date').val());
      var duration = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
      $('#duration-of-stay').val(duration);
    }
    
    // Update duration of stay whenever the check-in or check-out dates change
    $('#check-in-date, #check-out-date').on('change', function() {
      calculateDuration();
    });
    
    // Validate the form and prevent submission if rooms booked is less than 1
    $('#booking-form').on('submit', function(event) {
      var roomsBooked = $('#rooms-booked').val();
      if (roomsBooked < 1) {
        event.preventDefault();
        alert("Please book at least 1 room.");
      }
    });
  </script>
  
  </body>

</html>




