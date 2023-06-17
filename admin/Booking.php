<?php
  include_once "sideBar.php";
  include_once "../controller/logoutController.php";
  include_once "../controller/bookingController.php";

  include_once "../models/paymentMethod.php";
  $payment = paymentMethod::getPaymentMethodList();
  $guestList = user::getGuestList();


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="user.php" class="nav-link">Home</a>
      </li>
      <!-- _______________________________________________________Left navbar links _______________________________________________________________________________________-->
      <li class="nav-item d-none d-sm-inline-block">
      
        
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
      <form action="../controller/logoutController.php" method="post">
      <button name="logout" type="submit">Logout</button>
      </form>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="user.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

<h3>Booking table</h3>
<div class="card card-warning">
<div class="card-header">
    <h3 class="card-title">Booking</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <form method="post" action="../controller/bookingController.php" onsubmit="return validateForm()">
        <div class="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                <label>Guest Id</label>
                <select name="guest_id" required class="form-control">
                    <option value="">Select Guest</option>
                    <?php
                    foreach ($guestList  as $guest) {
                      echo '<option value="' . $guest->getId() . '">' . $guest->getId() . ' - ' . $guest->getFullName() . '</option>';
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                    <label>Booking date</label>
                    <input type="date" class="form-control" name="booking_date">
                </div>
                <div class="form-group">
                    <label>Duration of stay</label>
                    <input type="number" class="form-control" name="duration">
                </div>
                <div class="form-group">
                    <label>Check in date</label>
                    <input type="date" class="form-control" name="check_in">
                </div>
                <div class="form-group">
                    <label>Check out date</label>
                    <input type="date" class="form-control" name="check_out">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Total Rooms booked</label>
                    <input type="number" class="form-control" name="rooms_booked">
                </div>
                <div class="form-group">
                    <label for="payment_type">Payment type:</label>
                    <select name="payment_type" required class="form-control">
                        <option value="">Select Payment Method</option>
                        <?php
                        foreach ($payment as $pay) {
                            echo '<option value="' . $pay->getId() . '">' .$pay->getName(). '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <button type="submit" name="add" class="btn btn-block btn-success">Add Booking</button>
            </div>
        </div>
    </form>
</div>
    </div>
</div>

              <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bookings Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
              <thead>
        <tr>
            <th>ID</th>
            <th>guest ID</th>
            <th>Booking Date</th>
            <th>Duration Of Stay</th>
            <th>Check In Date</th>
            <th>Check out Date</th>
            <th>Payment Method</th>
            <th>Total rooms booked</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($booking as $book) { ?>
            <tr>
              <td><?php echo $book->getId(); ?></td>
                <td><?php echo $book->getGuestIdObj()->getId(); ?></td>
                <td><?php echo $book->getBookingDate(); ?></td>
                <td><?php echo $book->getDurationOfStay(); ?></td>
                <td><?php echo $book->getCheckInDate(); ?></td>
                <td><?php echo $book->getCheckOutDate(); ?></td>
                <td><?php echo $book->getBookingPaymentMethodObj()->getName(); ?></td>
                <td><?php echo $book->getTotalRoomsBooked(); ?></td>
                
                <td>
                <a href="../view/updateBooking.php?id=<?php echo $book->getId();?>">Update</a>
                </td>
                <td>
                <a href="../controller/bookingController.php?delete=<?php echo $book->getId(); ?>&id=<?php echo $book->getId(); ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="6">
                
            </td>
        </tr>
    </tbody>
</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>

<script>
function validateForm() {
    var guestId = document.forms["booking-form"]["guest_id"].value;
    var bookingDate = document.forms["booking-form"]["booking_date"].value;
    var duration = document.forms["booking-form"]["duration"].value;
    var checkIn = document.forms["booking-form"]["check_in"].value;
    var checkOut = document.forms["booking-form"]["check_out"].value;
    var roomsBooked = document.forms["booking-form"]["rooms_booked"].value;
    var amount = document.forms["booking-form"]["amount"].value;
    var paymentType = document.forms["booking-form"]["payment_type"].value;

    if (guestId == "") {
        alert("Guest Id field must be filled out");
        return false;
    }
    if (bookingDate == "") {
        alert("Booking date field must be filled out");
        return false;
    }
    if (duration == "") {
        alert("Duration of stay field must be filled out");
        return false;
    }
    if (checkIn == "") {
        alert("Check in date field must be filled out");
        return false;
    }
    if (checkOut == "") {
        alert("Check out date field must be filled out");
        return false;
    }
    if (roomsBooked == "") {
        alert("Total Rooms booked field must be filled out");
        return false;
    }
    if (amount == "" && amount < 1) {
        alert("Total amount field must be filled out");
        return false;
    }
    if (paymentType == "") {
        alert("Please select a payment type");
        return false;
    }
}
</script>

</html>
