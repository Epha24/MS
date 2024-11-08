<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$msg = "";
$error = 0;
$title = "Booked Services";
$cur = "booked";
if($_SESSION['role'] != 'customer'){
    header("Location:../logout.php");
}

?>
<!DOCTYPE html>
<?php include 'includes/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_GET['car'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
        <?php if($_GET['car'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Car</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Plate Number</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT car_res.resid, car_res.cid, car_res.sno, car.pid, car.tno, car.model, car.tsno, car.from_s, car.to_s, car.price FROM car_res JOIN car ON car.pid = car_res.cid AND car_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['from_s'];?></a></td>
                  <td><?php echo $row['to_s'];?></td>
                  <td><?php echo $row['tno'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><a href="pdf.php?generate-car=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-car=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Plate Number</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['plane'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
         <?php if($_GET['plane'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Car</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Plate Number</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT plane_res.resid, plane_res.pid, plane_res.sno, plane.pid, plane.tno, plane.model, plane.tsno, plane.from_s, plane.to_s, plane.price FROM plane_res JOIN plane ON plane.pid = plane_res.pid AND plane_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['from_s'];?></a></td>
                  <td><?php echo $row['to_s'];?></td>
                  <td><?php echo $row['tno'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><a href="pdf.php?generate=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-plane=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Plate Number</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['cinema'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?php if($_GET['cinema'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Cinema</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Movie Title</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT cinema.cid, cinema.mtitle, cinema.wdate, cinema.wtime, cinema.price, cinema_res.resid, cinema_res.cid FROM cinema JOIN cinema_res ON cinema.cid = cinema_res.cid AND cinema_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['mtitle'];?></a></td>
                  <td><?php echo $row['wdate'];?></td>
                  <td><?php echo $row['wtime'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><a href="pdf.php?generate-cinema=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-cinema=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Plate Number</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['room'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
         <?php if($_GET['room'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Room</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Room Type</th>
                  <th>Room No</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT room.rid, room.rtype, room.rno, room.price, room_res.resid, room_res.rid FROM room JOIN room_res ON room.rid = room_res.rid AND room_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['rtype'];?></a></td>
                  <td><?php echo $row['rno'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><a href="pdf.php?generate-room=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-room=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Room Type</th>
                  <th>Room No</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['tour'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
         <?php if($_GET['tour'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Tour</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Starting Date</th>
                  <th>Ending Date</th>
                  <th>Location</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT tour.tid, tour.sdate, tour.edate, tour.location, tour_res.resid, tour_res.tid, tour_res.price FROM tour JOIN tour_res ON tour.tid = tour_res.tid AND tour_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['sdate'];?></a></td>
                  <td><?php echo $row['edate'];?></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><a href="pdf.php?generate-tour=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-tour=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Starting Date</th>
                  <th>Ending Date</th>
                  <th>Location</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['food'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Booked Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="booked.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="booked.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="booked.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?php if($_GET['food'] == 'success-cancel'){ ?>

            <div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Canceled Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>

          <?php } ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Food</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="booked.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Food Name</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT food.fname, food.fprice, food_res.resid, food_res.fid FROM food JOIN food_res ON food.fid = food_res.fid AND food_res.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['fname'];?></a></td>
                  <td><?php echo $row['fprice'];?></td>
                  <td><a href="pdf.php?generate-cinema=<?php echo $row['resid']; ?>"><i class="fa fa-file-pdf" style="color: blue;" title="Generate Recit"></i></a>&nbsp;  | &nbsp; <a href="../action.php?cancel-food=<?php echo $row['resid']; ?>"><i class="fa fa-times" style="color: red;" title="Cancel Reservation"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Food Name</th>
                  <th>Price</th> 
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </form>
            </div>
          </div>
        </div> 
<?php } ?>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  
 function change_program(){
     var xmlhttp = new XMLHttpRequest();
     var program = document.getElementById("program").value;
     xmlhttp.open("GET","select.php?program="+program,false);     
     xmlhttp.send(null);
     document.getElementById("dep").innerHTML = xmlhttp.responseText;
} 
  
</script>