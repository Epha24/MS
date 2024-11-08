<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";
$cur = 'services';
 $title = "Services";

 if($_SESSION['role'] != 'company'){
    header("Location:../logout.php");
 }

if(isset($_POST['request'])){


             $oname = mysqli_escape_string($conn,$_POST['oname']);
             $scategory = mysqli_escape_string($conn,$_POST['scategory']);
             $stitle = mysqli_escape_string($conn,$_POST['stitle']);
             $location = mysqli_escape_string($conn,$_POST['location']);
             $description = mysqli_escape_string($conn,$_POST['description']);
             $req_date = date("Y-m-d");

             $qry_or = mysqli_query($conn, "SELECT sid FROM service WHERE stitle = '".$stitle."' AND oname = '$oname' AND scategory = '$scategory'" );
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same service exists</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO service(oname, scategory, stitle, location, description, username) VALUES('$oname', '$scategory', '$stitle', '$location', '$description', '".$_SESSION['user_name']."')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Requested Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

            



}

if(isset($_POST['save_cinema'])){


             $mtitle = mysqli_escape_string($conn,$_POST['mtitle']);
             $tsno = mysqli_escape_string($conn,$_POST['tsno']);
             $wdate = mysqli_escape_string($conn,$_POST['wdate']);
             $wtime = mysqli_escape_string($conn,$_POST['wtime']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT cid FROM cinema WHERE mtitle = '".$mtitle."' AND wdate = '".$wdate."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same movie exists!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO cinema(mtitle, wdate, wtime, price, sid) VALUES('$mtitle', '$wdate', '$wtime', '$price', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['save_tour'])){


             $sdate = mysqli_escape_string($conn,$_POST['sdate']);
             $edate = mysqli_escape_string($conn,$_POST['edate']);
             $tlocation = mysqli_escape_string($conn,$_POST['tlocation']);
             $tguider = mysqli_escape_string($conn,$_POST['tguider']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT tid FROM tour WHERE location = '".$tlocation."' AND sdate = '".$sdate."' AND tguide = '".$tguider."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Guider is other tour!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO tour(sdate, edate, location, tguide, price, sid) VALUES('$sdate', '$edate', '$tlocation', '$tguider', '$price', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['save_plane'])){


             $tno = mysqli_escape_string($conn,$_POST['tno']);
             $model = mysqli_escape_string($conn,$_POST['model']);
             $tsno = mysqli_escape_string($conn,$_POST['tsno']);
             $from = mysqli_escape_string($conn,$_POST['from']);
             $to = mysqli_escape_string($conn,$_POST['to']);
             $date = mysqli_escape_string($conn,$_POST['date']);
             $time = mysqli_escape_string($conn,$_POST['time']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT pid FROM plane WHERE tno = '".$tno."' AND fdate = '".$date."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same flight exists!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO plane(tno, model, tsno, from_s, to_s, fdate, ftime, price, sid) VALUES('$tno', '$model', '$tsno', '$from', '$to', '$date', '$time', '$price', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['save_car'])){


             $tno = mysqli_escape_string($conn,$_POST['tno']);
             $level = mysqli_escape_string($conn,$_POST['level']);
             $tsno = mysqli_escape_string($conn,$_POST['tsno']);
             $from = mysqli_escape_string($conn,$_POST['from']);
             $to = mysqli_escape_string($conn,$_POST['to']);
             $date = mysqli_escape_string($conn,$_POST['date']);
             $time = mysqli_escape_string($conn,$_POST['time']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT pid FROM car WHERE tno = '".$tno."' AND fdate = '".$date."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same flight exists!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO car(tno, model, tsno, from_s, to_s, fdate, ftime, price, sid) VALUES('$tno', '$level', '$tsno', '$from', '$to', '$date', '$time', '$price', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['save_food'])){


             $fname = mysqli_escape_string($conn,$_POST['fname']);
             $fprice = mysqli_escape_string($conn,$_POST['fprice']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT fname FROM food WHERE fname = '".$fname."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same food exists!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO food(fname, fprice, sid) VALUES('$fname', '$fprice', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['save_room'])){


             $rno = mysqli_escape_string($conn,$_POST['rno']);
             $rtype = mysqli_escape_string($conn,$_POST['rtype']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

             $qry_or = mysqli_query($conn, "SELECT rno FROM room WHERE rno = '".$rno."'");
             if(mysqli_num_rows($qry_or)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>The same room exists!!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else {

              $qry_insert = "INSERT INTO room(rno, rtype, price, sid) VALUES('$rno', '$rtype', '$price', '$sid')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Saved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}

if(isset($_POST['update'])){


             $oname = mysqli_escape_string($conn,$_POST['oname']);
             $scategory = mysqli_escape_string($conn,$_POST['scategory']);
             $stitle = mysqli_escape_string($conn,$_POST['stitle']);
             $address = mysqli_escape_string($conn,$_POST['address']);
             $description = mysqli_escape_string($conn,$_POST['description']);
             $sid = mysqli_escape_string($conn,$_POST['sid']);

            $qry_insert = "UPDATE service SET oname = '$oname', scategory = '$scategory', stitle = '$stitle', location = '$address', description = '$description'  WHERE sid = '$sid'";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Updated Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooop!!! something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }


}

 include'includes/menu.php';
 ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_GET['add-service'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Services</a> / <a href="#" style="cursor: unset;">Request Service</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="services.php?add-service" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Request Service</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Services</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="services.php?add-service" class="nav-link">
                      <i class="fas fa-plus"></i> Request Service
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="services.php?update-service" class="nav-link">
                      <i class="far fa-edit"></i> Update Request
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
   <!-- form start -->
   <form role="form" action="services.php?add-service" method="POST">       
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Request Service</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                    <label>Organization Name :</label>
                    <input type="text" class="form-control" name="oname" placeholder="Enter organization name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Category :</label>
                    <select name="scategory" class="form-control">
                      <?php $qry_sel = mysqli_query($conn, "SELECT *FROM department ORDER BY department");
                      while($row_st = mysqli_fetch_array($qry_sel)){
                        echo "<option value=".$row_st['department_id'].">".$row_st['department']."</option>";
                      }
                   ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Title :</label>
                    <input type="text" class="form-control" name="stitle" placeholder="Enter Service Title" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Location :</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Description :</label>
                    <textarea placeholder="Enter service description" class="form-control" name="description" required></textarea>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="request" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </div>
            </div>
          </form>
          </div>
        </div>
      <?php }
      if(isset($_GET['update-service'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Update service request</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div>
        <?php 
              if($_GET['update-service'] == 'success'){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Updated Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }

              if($_GET['update-service'] == 'delete-success'){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Deleted Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }

        ?> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Services</h3>
              <a href="services.php?add-service" class="float-sm-right" title="Request New Service"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Organization Name</th>
                  <th>Category</th>
                  <th>Service Title</th>
                  <th>Status</th>
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT service.sid, service.scategory, service.oname, service.stitle, service.status, department.department_id, department.department FROM service JOIN department ON service.scategory = department.department_id AND service.username = '".$_SESSION['user_name']."'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['oname'];?></td>
                  <td><?php echo $row['department'];?></td>
                  <td><?php echo $row['stitle'];?></td>
                  <td><?php echo $row['status'];?></td>
                  <td><!--<a href="../action.php?delete-vacancy=<?php echo $row['job_id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" style="color: red;" title="Delete Vacancy"></i></a>&nbsp;  | &nbsp; --> <a href="services.php?update-detail=<?php echo $row['sid']; ?>"><i class="fa fa-edit" style="color: blue;" title="Update request"></i></a> <?php if($row['status'] == 'Approved'){ ?> | &nbsp; <a href="services.php?add-detail=<?php echo $row['scategory']."&sid=".$row['sid']; ?>"><i class="fa fa-plus" style="color: red;" title="Add Detail"></i></a> <?php } ?> | &nbsp; <a href="../action.php?delete-service-request=<?php echo $row['sid']; ?>" onclick="return confirm('Are you sure you want to delete selected service?')"><i class="fa fa-times" style="color: blue;" title="Delete Service"></i></a> <?php ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Organization Name</th>
                  <th>Category</th>
                  <th>Service Title</th>
                  <th>Status</th>
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
      <?php }
      if(isset($_GET['update-detail'])){

        $_SESSION['update-detail'] = $_GET['update-detail'];
        $id = $_SESSION['update-detail'];
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Services </a> / <a href="#" style="cursor: unset;">Update Service</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
        <?php $qry = mysqli_query($conn, "SELECT service.sid, service.scategory, service.oname, service.stitle, service.status, service.location, service.description, department.department_id, department.department FROM service JOIN department ON service.scategory = department.department_id AND service.sid = $id");
                  while($row = mysqli_fetch_array($qry)){ ?>
      <form role="form" action="services.php?update-service" method="POST">       
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Service</h3>
                  <a href="services.php?update-service" class="float-sm-right" title="Update Other Service"><i class="fa fa-edit"></i></a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                    <label>Organization Name :</label>
                    <input type="text" class="form-control" value="<?php echo $row['oname'] ?>" name="oname" placeholder="Enter Organization Name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Category :</label>
                    <select name="scategory" class="form-control">
                      <?php $qry_sel = mysqli_query($conn, "SELECT *FROM department ORDER BY department");
                      while($row_st = mysqli_fetch_array($qry_sel)){
                        
                        if($row['scategory'] == $row_st['department_id']){
                          echo "<option value=".$row_st['department_id']." selected='selected'>".$row_st['department']."</option>";
                        } else{
                          echo "<option value=".$row_st['department_id'].">".$row_st['department']."</option>";
                        }
                      }
                   ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Title :</label>
                    <input type="text" class="form-control" value="<?php echo $row['stitle'] ?>" name="stitle" placeholder="Enter Service Title" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Location :</label>
                    <input type="text" class="form-control" value="<?php echo $row['location'] ?>" name="address" placeholder="Enter Location" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Description</label>
                    <textarea placeholder="Enter service description" class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
                  </div>
                  <input type="hidden" value="<?php echo $row['sid'] ?>" name="sid">
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if($row['status'] == 'Pending'){ ?>
                  <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-check"></i> Save</button> <?php } ?>
                </div>
            </div>
          </form>
  <?php } }  

  if(isset($_GET['add-detail'])) { ?>

   <div class="container-fluid">  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Services</a> / <a href="#" style="cursor: unset;">Add Detail</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
      <div class="row"> 
        <div class="col-md-3">
            <a href="services.php?add-detail=<?=$_GET['add-detail']."&sid=".$_GET['sid'];?>" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Add Detail</a>

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
                    <a href="services.php?add-detail=<?=$_GET['add-detail']."&sid=".$_GET['sid'];?>" class="nav-link">
                      <i class="fas fa-plus"></i> Add Detail
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="services.php?added-details=<?=$_GET['add-detail']."&sid=".$_GET['sid'];?>" class="nav-link">
                      <i class="far fa-file-pdf"></i> Added Details
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
              <?php

              if($_GET['add-detail'] == 2){ ?>
                  <div class="form-group">
                    <label>Hotel Service :</label>
                    <select class="form-control" id="hotel" onchange="changeHotel()">
                      <option selected="selected" disabled="disabled">Select Category</option>
                      <option>Room</option>
                      <option>Food</option>
                    </select>
                    <input type="hidden" id="sid" value="<?php echo $_GET['sid'] ?>">
                  </div>
                  <div id="hotel_id">
                    
                  </div>
             <?php } if($_GET['add-detail'] == 3){ ?>
                  <div class="form-group">
                    <select class="form-control" id="transport" onchange="changeTransport()">
                      <option selected="selected" disabled="disabled">Select Category</option>
                      <option>Plane</option>
                      <option>Car</option>
                    </select>
                    <input type="hidden" id="sid" value="<?php echo $_GET['sid'] ?>">
                  </div>
                  <div id="transport_id">
                    
                  </div>
             <?php } if($_GET['add-detail'] == 4){ ?>
                  <div class='card card-default'><div class='card-header'>Add Cinema Service Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Movie Title</label><input type='text' name='mtitle' class='form-control' required></div><div class='form-group col-sm-6'><lable>Total No of Seat</label><input type='number' name='tsno' class='form-control' required></div><div class='form-group col-sm-6'><lable>Date</label><input type='date' name='wdate' class='form-control' required></div><div class='form-group col-sm-6'><lable>Time</label><input type='time' name='wtime' class='form-control' required></div><div class='form-group col-sm-6'><lable>Price</label><input type='text' name='price' class='form-control' required><input type='hidden' name='sid' class='form-control' value="<?php echo $_GET['sid'] ?>"></div></div><input type='submit' class='btn btn-danger' name='save_cinema' value='Save'></form></div></div>
             <?php } if($_GET['add-detail'] == 5){ ?>
                  <div class='card card-default'><div class='card-header'>Add Tour Service Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Starting Date</label><input type='date' name='sdate' class='form-control' required></div><div class='form-group col-sm-6'><lable>Ending Date</label><input type='date' name='edate' class='form-control' required></div><div class='form-group col-sm-6'><lable>Tour Location</label><input type='text' name='tlocation' class='form-control' required></div><div class='form-group col-sm-6'><lable>Guider</label><input type='text' name='tguider' class='form-control' required></div><div class='form-group col-sm-6'><lable>Price</label><input type='text' name='price' class='form-control' required><input type='hidden' name='sid' class='form-control' value="<?php echo $_GET['sid'] ?>"></div></div><input type='submit' class='btn btn-danger' name='save_tour' value='Save'></form></div></div>
             <?php }
               ?>     
                </div>
      </div><!-- /.container-fluid -->
    <?php } if(isset($_GET['added-details'])) { ?>

   <div class="container-fluid">  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Services</a> / <a href="#" style="cursor: unset;">Add Detail</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
      <div class="row"> 
        <div class="col-md-3">
            <a href="services.php?add-detail=<?=$_GET['add-detail']."&sid=".$_GET['sid'];?>" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Add Detail</a>

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
                    <a href="services.php?add-detail=<?=$_GET['added-details']."&sid=".$_GET['sid'];?>" class="nav-link">
                      <i class="fas fa-plus"></i> Add Detail
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a href="services.php?added-details=<?=$_GET['added-details']."&sid=".$_GET['sid'];?>" class="nav-link">
                      <i class="far fa-file-pdf"></i> Added Details
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
              <?php

              if($_GET['added-details'] == 2){ ?>
                  <div class="form-group">
                    <label>Hotel Service :</label>
                    <select class="form-control" id="hotel" onchange="addedHotels()">
                      <option selected="selected" disabled="disabled">Select Category</option>
                      <option>Room</option>
                      <option>Food</option>
                    </select>
                  </div>
                  <div id="hotel_id">
                    
                  </div>
             <?php } if($_GET['added-details'] == 3){ ?>
                  <div class="form-group">
                    <select class="form-control" id="transport" onchange="addedTransports()">
                      <option selected="selected" disabled="disabled">Select Category</option>
                      <option>Plane</option>
                      <option>Car</option>
                    </select>
                  </div>
                  <div id="transport_id">
                    
                  </div>
             <?php } if($_GET['added-details'] == 4){ ?>
                  <div class='card card-default'><div class='card-header'>Added Cinema Services </div><div class='card-body'>
                    <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Movie Title</th>
                  <th>Date</th>
                  <th>Time</th>  
                  <th>Price</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;

                   $qry = "SELECT *FROM cinema";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['mtitle']; ?></td>
                  <td><?php echo $row['wdate']; ?></td>
                  <td><?php echo $row['wtime']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Movie Title</th>
                  <th>Date</th>
                  <th>Time</th>  
                  <th>Price</th>
                </tr>
                </tfoot>
              </table>
                  </div></div>
             <?php }
               ?>     
                </div>
      </div><!-- /.container-fluid -->
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

  function changeHotel(){
     var xmlhttp = new XMLHttpRequest();
     var hotel = document.getElementById("hotel").value;
     var sid = document.getElementById("sid").value;
     xmlhttp.open("GET","../select.php?hotel="+hotel+"&sid="+sid,false);     
     xmlhttp.send(null);
     document.getElementById("hotel_id").innerHTML = xmlhttp.responseText;
}

function changeTransport(){
     var xmlhttp = new XMLHttpRequest();
     var transport = document.getElementById("transport").value;
     var sid = document.getElementById("sid").value;
     xmlhttp.open("GET","../select.php?transport="+transport+"&sid="+sid,false);     
     xmlhttp.send(null);
     document.getElementById("transport_id").innerHTML = xmlhttp.responseText;
}
function addedTransports(){
     var xmlhttp = new XMLHttpRequest();
     var addedtransport = document.getElementById("transport").value;
     xmlhttp.open("GET","../select.php?addedtransport="+addedtransport,false);     
     xmlhttp.send(null);
     document.getElementById("transport_id").innerHTML = xmlhttp.responseText;
}
function addedHotels(){
     var xmlhttp = new XMLHttpRequest();
     var addedhotels = document.getElementById("hotel").value;
     xmlhttp.open("GET","../select.php?addedhotels="+addedhotels,false);     
     xmlhttp.send(null);
     document.getElementById("hotel_id").innerHTML = xmlhttp.responseText;
}

</script>