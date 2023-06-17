<?php

include_once "sideBar.php";
include_once "../controller/logoutController.php";
include_once "../controller/roomController.php";
include_once "../models/roomType.php";
$roomTypeList = roomType::getRoomTypeList();
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


<h3>Add Room</h3>
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Add Room</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  

    <form method="post" action="../controller/roomController.php" onsubmit="return validateForm()" name="myForm">
      <div class="row">
        <div class="col-sm-12">
          <!-- text input -->
          <div class="form-group">
            <label>Room Number</label>
            <input type="text" class="form-control" name="room_number">
          </div>
          <div class="form-group">
            <label for="room_type">Room Type:</label>
            <select name="room_type" required>
              <option value="">Select Room Type</option>
              <?php
              foreach ($roomTypeList as $roomType) {
                echo '<option value="' . $roomType->getId() . '">' . $roomType->getCategory() . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price">
          </div>
        </div>
        <div class="col-sm-2"> 
          <button type="submit" name="add" class="btn btn-block btn-success">Add Room</button>                
        </div> 
      </div> 
    </form>



  </div>
</div>
              
              <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Room Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
  <thead>
    <tr>
      <th>ID</th>
      <th>Room Number</th>
      <th>Room Type</th>
      <th>Price</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($roomList as $room) { ?>
    <tr>
        <td><?php echo $room->getId(); ?></td>
        <td><?php echo $room->getRoomNumber(); ?></td>
        <td><?php echo $room->getRoomCategoryObj()->getCategory(); ?></td>
        <td><?php echo $room->getPrice(); ?></td>
        <td>

        <a href="../controller/roomController.php?delete&id=<?php echo $room->getId(); ?>">Delete</a>        
        
        <td>

        <a href="../view/updateRoom.php?id=<?php echo $room->getId();?>">Update</a>
          </td>
    </tr>
<?php
}
?>
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
        var roomNumber = document.forms["myForm"]["room_number"].value;
        var roomType = document.forms["myForm"]["room_type"].value;
        var price = document.forms["myForm"]["price"].value;

        if (roomNumber == "") {
            alert("Room Number field must be filled out");
            return false;
        }
        if (roomType == "") {
            alert("Please select a room type");
            return false;
        }
        if (price == "") {
            alert("Price field must be filled out");
            return false;
        }
        if (isNaN(price)) {
            alert("Price must be a number");
            return false;
        }
    }
</script>
</html>
