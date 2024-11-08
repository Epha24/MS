<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$msg = "";
$error = 0;
$title = "Reserved Services";
$cur = "reserved";
if($_SESSION['role'] != 'customer'){
    header("Location:../logout.php");
}

if(isset($_POST['reserve-car'])){


             $pid = mysqli_escape_string($conn,$_POST['pid']);
             $sno = mysqli_escape_string($conn,$_POST['sno']);
             $username = $_SESSION['user_name'];


            $qry_insert = "INSERT INTO car_res(cid, sno, username) VALUES('$pid', '$sno', '$username')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Reserved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went Wrong.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }

  if(isset($_POST['reserve-plane'])){


             $pid = mysqli_escape_string($conn,$_POST['pid']);
             $sno = mysqli_escape_string($conn,$_POST['sno']);
             $username = $_SESSION['user_name'];


            $qry_insert = "INSERT INTO plane_res(pid, sno, username) VALUES('$pid', '$sno', '$username')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Reserved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went Wrong.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }

  if(isset($_POST['reserve-cinema'])){


             $cid = mysqli_escape_string($conn,$_POST['cid']);
             // $sno = mysqli_escape_string($conn,$_POST['sno']);
             $username = $_SESSION['user_name'];


            $qry_insert = "INSERT INTO cinema_res(cid, username) VALUES('$cid', '$username')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Reserved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went Wrong.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }

      if(isset($_POST['reserve-food'])){


             $fid = mysqli_escape_string($conn,$_POST['fid']);
             $username = $_SESSION['user_name'];


            $qry_insert = "INSERT INTO food_res(fid, username) VALUES('$fid', '$username')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Reserved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went Wrong.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }

          if(isset($_POST['reserve-room'])){


             $rid = mysqli_escape_string($conn,$_POST['rid']);
             $username = $_SESSION['user_name'];


            $qry_insert = "INSERT INTO room_res(rid, username) VALUES('$rid', '$username')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Reserved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went Wrong.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="service.php?car" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-car"></i> Car</a>
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
                    <a href="service.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Car</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="service.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>From</th>
                  <th>To</th> 
                  <th>Price</th> 
                  <th>Schedule</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT car.pid, car.tno, car.model, car.from_s, car.to_s, car.fdate, car.ftime, car.price, service.sid, service.oname, service.location FROM car JOIN service ON car.sid = service.sid";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><a href="#" title="<?php echo "Plate Number : ".$row['tno']." | Level : ".$row['model']; ?>"><?php echo $row['oname'];?></a></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['from_s'];?></td>
                  <td><?php echo $row['to_s'];?></td>
                  <td><?php echo $row['price']?></td>
                  <td><?php echo $row['fdate']?></td>
                  <td>&nbsp; <a href="service.php?reserve-car=<?php echo $row['pid']; ?>"><i class="fa fa-shopping-cart" style="color: blue;" title="Reserve"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>From</th>
                  <th>To</th> 
                  <th>Price</th> 
                  <th>Schedule</th> 
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="service.php?cinema" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Cinema</a>
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
                    <a href="service.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="service.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Cinema</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="service.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>Movie Title</th>
                  <th>Price</th> 
                  <th>Schedule</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT cinema.cid, cinema.mtitle, cinema.wdate, cinema.wtime, cinema.price, service.sid, service.oname, service.location FROM cinema JOIN service ON cinema.sid = service.sid";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['oname'];?></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['mtitle'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><?php echo "Date : ".$row['wdate']." | Time : ".$row['wtime'];?></td>
                  <td>&nbsp; <a href="service.php?reserve-cinema=<?php echo $row['cid']; ?>"><i class="fa fa-shopping-cart" style="color: blue;" title="Book"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>Movie Title</th>
                  <th>Price</th> 
                  <th>Schedule</th> 
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="service.php?food" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Food</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="service.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Food</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="service.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>Food</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT food.fid, food.fname, food.fprice, service.sid, service.oname, service.location FROM food JOIN service ON food.sid = service.sid";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['oname'];?></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['fname'];?></td>
                  <td><?php echo $row['fprice'];?></td>
                  <td>&nbsp; <a href="service.php?reserve-food=<?php echo $row['fid']; ?>"><i class="fa fa-shopping-cart" style="color: blue;" title="Order"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>Food</th>
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="service.php?room" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Room</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="service.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Room</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="service.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>Room Type</th>
                  <th>Room No</th>
                  <th>Price</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT room.rid, room.rno, room.price, room.rtype, service.sid, service.oname, service.location FROM room JOIN service ON room.sid = service.sid";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['oname'];?></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['rtype'];?></td>
                  <td><?php echo $row['rno'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td>&nbsp; <a href="service.php?reserve-room=<?php echo $row['rid']; ?>"><i class="fa fa-shopping-cart" style="color: blue;" title="View Detail & Apply"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
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
<?php } if(isset($_GET['plane'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="service.php?plane" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Plane</a>
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
                    <a href="service.php?car" class="nav-link">
                      <i class="fas fa-plus"></i> Car
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?cinema" class="nav-link">
                      <i class="fas fa-plus"></i> Cinema
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?food" class="nav-link">
                      <i class="fas fa-plus"></i> Food
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="service.php?plane" class="nav-link">
                      <i class="fas fa-plus"></i> Plane
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0 t">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?room" class="nav-link">
                      <i class="fas fa-plus"></i> Room
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="service.php?tour" class="nav-link">
                      <i class="fas fa-plus"></i> Tour
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Plane</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="service.php?car" method="POST" enctype="multipart/form-data">
                <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>From</th>
                  <th>To</th> 
                  <th>Price</th> 
                  <th>Schedule</th> 
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT plane.pid, plane.tno, plane.model, plane.from_s, plane.to_s, plane.fdate, plane.ftime, plane.price, service.sid, service.oname, service.location FROM plane JOIN service ON plane.sid = service.sid";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><a href="#" title="<?php echo "Tail No : ".$row['tno']." | Model : ".$row['model']; ?>"><?php echo $row['oname'];?></a></td>
                  <td><?php echo $row['location'];?></td>
                  <td><?php echo $row['from_s'];?></td>
                  <td><?php echo $row['to_s'];?></td>
                  <td><?php echo $row['price']?></td>
                  <td><?php echo "Date : ".$row['fdate']." | Time :".$row['ftime']?></td>
                  <td>&nbsp; <a href="service.php?reserve-plane=<?php echo $row['pid']; ?>"><i class="fa fa-shopping-cart" style="color: blue;" title="Reserve"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization</th>
                  <th>Location</th>
                  <th>From</th>
                  <th>To</th> 
                  <th>Price</th> 
                  <th>Schedule</th> 
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
<?php } if(isset($_GET['reserve-car'])){

        $id = $_GET['reserve-car'];;
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Reserve Ticket</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="service.php?car" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Reserve Ticket</h3>
                <a href="service.php?car" class="float-sm-right" title="View Car"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">
                <input type="hidden" name="username" value="<?php echo $_GET['reserve-car']?>">

                  <?php
                    $qry = "SELECT car.pid, car.tno, car.model, car.from_s, car.to_s, car.fdate, car.ftime, car.price, service.sid, service.oname, service.location FROM car JOIN service ON car.sid = service.sid AND car.pid = '".$_GET['reserve-car']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 
                  <div class="row">
                  <div class="col-sm-7">
                  <div class="form-row">
                  <div class="form-group col-sm-6">

                    <input type="text" class="form-control" name="from" value="From : <?php echo $row['from_s'] ?>" readonly>
                    <input type="hidden" class="form-control" name="pid" value="<?php echo $row['pid'] ?>">
                    <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="to" value="To : <?php echo $row['to_s'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="level" value="Level : <?php echo $row['model'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="pnumber" value="Plate Number : <?php echo $row['tno'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="sdate" value="Date : <?php echo $row['fdate'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="stime" value="Time : <?php echo $row['ftime'] ?>" readonly>
                  </div>

                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="price" value="Price : <?php echo $row['price'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Avialable Seat :</label>
                    <select class="form-control" name="sno">
                      <?php 
                      $no = 1;
                       $tsnumber = mysqli_query($conn, "SELECT tsno FROM car WHERE pid = '".$row['pid']."'");
                      $snumber = mysqli_fetch_array($tsnumber);
                      $total = $snumber['tsno'];
                      for($i = 1; $i <= $total; $i++){ 
                            $qcc = mysqli_query($conn, "SELECT *FROM car_res WHERE cid = '".$row['pid']."' AND sno = '$i'");
                            if(mysqli_num_rows($qcc) > 0){
                            while($res = mysqli_fetch_array($qcc)){
                              if($res['sno'] != $i) {
                        ?>
                        <option><?=$i;?></option>
                
                     <?php }  } } else{ ?>
                        <option><?=$i;?></option>
                     <?php } } ?>
                    </select>
                  </div>
                </div>
                </div>
                  <div class="col-sm-5">
                    
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reserve-car" class="btn btn-primary">Reserve</button>
                </div>
            </div>
          </form>
      <?php } if(isset($_GET['reserve-plane'])){

        $id = $_GET['reserve-plane'];;
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Reserve Ticket</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="service.php?plane" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Reserve Ticket</h3>
                <a href="service.php?plane" class="float-sm-right" title="View Plane"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">

                  <?php
                    $qry = "SELECT plane.pid, plane.tno, plane.tsno, plane.model, plane.from_s, plane.to_s, plane.fdate, plane.ftime, plane.price, service.sid, service.oname, service.location FROM plane JOIN service ON plane.sid = service.sid AND plane.pid = '".$_GET['reserve-plane']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 
                  <div class="row">
                  <div class="col-sm-7">
                  <div class="form-row">
                  <div class="form-group col-sm-6">

                    <input type="text" class="form-control" name="from" value="From : <?php echo $row['from_s'] ?>" readonly>
                    <input type="hidden" class="form-control" name="pid" value="<?php echo $row['pid'] ?>">
                    <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="to" value="To : <?php echo $row['to_s'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="model" value="Model : <?php echo $row['model'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="pnumber" value="Plate Number : <?php echo $row['tno'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="sdate" value="Date : <?php echo $row['fdate'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="stime" value="Time : <?php echo $row['ftime'] ?>" readonly>
                  </div>

                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="price" value="Price : <?php echo $row['price'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Avialable Seat :</label>
                    <select class="form-control" name="sno">
                      <?php 
                      $no = 1;
                       $tsnumber = mysqli_query($conn, "SELECT tsno FROM plane WHERE pid = '".$row['pid']."'");
                      $snumber = mysqli_fetch_array($tsnumber);
                      $total = $snumber['tsno'];
                      for($i = 1; $i <= $total; $i++){ 
                            $qcc = mysqli_query($conn, "SELECT *FROM plane_res WHERE pid = '".$row['pid']."' AND sno = '$i'");
                            if(mysqli_num_rows($qcc) > 0){
                            while($res = mysqli_fetch_array($qcc)){
                              if($res['sno'] != $i) {
                        ?>
                        <option><?=$i;?></option>
                
                     <?php }  } } else{ ?>
                        <option><?=$i;?></option>
                     <?php } } ?>
                    </select>
                  </div>
                </div>
                </div>
                  <div class="col-sm-5">
                    
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reserve-plane" class="btn btn-primary">Reserve</button>
                </div>
            </div>
          </form>
      <?php } if(isset($_GET['reserve-food'])){

        $id = $_GET['reserve-food'];;
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Order Food</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="service.php?food" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Order Food</h3>
                <a href="service.php?food" class="float-sm-right" title="View Food"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">
                <input type="hidden" name="username" value="<?php echo $_GET['reserve-food']?>">

                  <?php
                    $qry = "SELECT food.fid, food.fname, food.fprice, service.sid, service.oname, service.location FROM food JOIN service ON food.sid = service.sid AND food.fid = '".$_GET['reserve-food']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 
                  <div class="row">
                  <div class="col-sm-7">
                  <div class="form-row">
                  <div class="form-group col-sm-6">

                    <input type="text" class="form-control" name="from" value="Food Name : <?php echo $row['fname'] ?>" readonly>
                    <input type="hidden" class="form-control" name="fid" value="<?php echo $row['fid'] ?>">
                    <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="to" value="Price : <?php echo $row['fprice'] ?>" readonly>
                  </div>
                </div>
                </div>
                  <div class="col-sm-5">
                    
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reserve-food" class="btn btn-primary">Order</button>
                </div>
            </div>
          </form>
      <?php } if(isset($_GET['reserve-room'])){

        $id = $_GET['reserve-room'];;
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Order Food</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="service.php?room" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Order Food</h3>
                <a href="service.php?room" class="float-sm-right" title="View Food"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">
                <input type="hidden" name="username" value="<?php echo $_GET['reserve-room']?>">

                  <?php
                    $qry = "SELECT room.rid, room.rtype, room.price, room.rno, service.sid, service.oname, service.location FROM room JOIN service ON room.sid = service.sid AND room.rid = '".$_GET['reserve-room']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 
                  <div class="row">
                  <div class="col-sm-7">
                  <div class="form-row">
                  <div class="form-group col-sm-12">

                    <input type="text" class="form-control" name="from" value="Room Type : <?php echo $row['rtype'] ?>" readonly>
                    <input type="hidden" class="form-control" name="rid" value="<?php echo $row['rid'] ?>">
                    <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="rno" value="Room No : <?php echo $row['rno'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="price" value="Price : <?php echo $row['price'] ?>" readonly>
                  </div>
                </div>
                </div>
                  <div class="col-sm-5">
                    
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reserve-room" class="btn btn-primary">Book</button>
                </div>
            </div>
          </form>
      <?php } if(isset($_GET['reserve-cinema'])){

        $id = $_GET['reserve-cinema'];;
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Reserve Ticket</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="service.php?cinema" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Reserve Ticket</h3>
                <a href="service.php?cinema" class="float-sm-right" title="View Car"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">
                <input type="hidden" name="username" value="<?php echo $_GET['reserve-cinema']?>">

                  <?php
                    $qry = "SELECT cinema.cid, cinema.mtitle, cinema.wdate, cinema.wtime, cinema.price, service.sid, service.oname, service.location FROM cinema JOIN service ON cinema.sid = service.sid AND cinema.cid = '".$_GET['reserve-cinema']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 
                  <div class="row">
                  <div class="col-sm-7">
                  <div class="form-row">
                  <div class="form-group col-sm-6">

                    <input type="text" class="form-control" name="mtitle" value="Title : <?php echo $row['mtitle'] ?>" readonly>
                    <input type="hidden" class="form-control" name="cid" value="<?php echo $row['cid'] ?>">
                    <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="wdate" value="Date : <?php echo $row['wdate'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="wtime" value="Time : <?php echo $row['wtime'] ?>" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="price" value="Price : <?php echo $row['price'] ?>" readonly>
                  </div>
                </div>
                </div>
                  <div class="col-sm-5">
                    
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="reserve-cinema" class="btn btn-primary">Reserve</button>
                </div>
            </div>
          </form>
      <?php } if(isset($_GET['responses'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Responses </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="job.php?jobs" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-graduation-cap"></i> Apply</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jobs</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="job.php?jobs" class="nav-link">
                      <i class="fas fa-th-list"></i> Jobs
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="job.php?responses" class="nav-link">
                      <i class="fas fa-th-list"></i> Responses
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Applied Jobs</h3>
              </div>
              <!-- /.card-header -->
             <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Applied Date</th>
                  <th>Status</th>  
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT job.job_id, job.position, applications.cv_id, applications.job_id, applications.username, applications.app_date, applications.app_month, applications.app_year, applications.status, emp_position.position_id, emp_position.position AS 'emp_pos' FROM job JOIN applications JOIN emp_position ON job.position = emp_position.position_id AND job.job_id = applications.job_id AND applications.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['emp_pos'];?></td>
                  <td><?php echo $row['app_month']." ".$row['app_date'].", ".$row['app_year']; ?></td>
                  <td> <?php if($row['status'] == 'Pending'){ echo "<span class='text-warning'>".$row['status']."</span>"; } if($row['status'] == 'Rejected'){ echo "<a href='job.php?reson=".$row['cv_id']."' style='color:red; text-decoration:none; cursor : pointer;'>".$row['status']."</a>"; } if($row['status'] == 'Accepted'){ echo "<a href='job.php?reson=".$row['cv_id']."' class='text-success' style='cursor:pointer;'>".$row['status']."</a>"; } ?></td>
                  <td>&nbsp; <a href="job.php?view-detail=<?php echo $row['job_id']; ?>"><i class="fa fa-graduation-cap" style="color: blue;" title="View Detail"></i></a> &nbsp;</td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Applied Date</th>
                  <th>Status</th>  
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
          </div>
        </div> 
<?php } if(isset($_GET['reson'])){ ;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Responses </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="job.php?jobs" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-graduation-cap"></i> Apply</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jobs</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="job.php?jobs" class="nav-link">
                      <i class="fas fa-th-list"></i> Jobs
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="job.php?responses" class="nav-link">
                      <i class="fas fa-th-list"></i> Responses
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Reson</h3>
              </div>
              <!-- /.card-header -->
             <div class="card-body">
              <?php $qry_r = mysqli_query($conn, "SELECT *FROM applications WHERE cv_id = '".$_GET['reson']."'");
              $res = mysqli_fetch_array($qry_r);
              echo "<textarea class='form-control'>".$res['note']."</textarea>" ?>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
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