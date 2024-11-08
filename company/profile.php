<?php

session_start();
include '../security.php';
include '../conn.php';
include 'user.php';
$cur = "profile";
$title = "Profile";
$fname_error = "";
$mname_error = "";
$lname_error = "";
$city_error = "";
$phone_error = "";
$num_error = 0;
$msg = "";

if($_SESSION['role'] != 'company'){
    header("Location:../logout.php");
}

if(isset($_POST['update-detail'])){

  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
                $fname_error = "<p class='text-danger'>Invalid First Name</p>";
                $num_error++;
             }
             if(!preg_match("/^[a-zA-Z ]*$/",$mname)){
                $mname_error = "<p class='text-danger'>Invalid Middle Name</p>";
                $num_error++;
             }
             if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
                $lname_error = "<p class='text-danger'>Invalid Last Name</p>";
                $num_error++;
             }
             if(!preg_match("/^[a-zA-Z ]*$/",$address)){
                $city_error = "<p class='text-danger'>Invalid City</p>";
                $num_error++;
             }
             if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
                $position_error = "<p class='text-danger'>Invalid Position</p>";
                $num_error++;
             }
             if(strlen($phone) < 10 || !ctype_digit($phone)){
                 $phone_error = "<p class='text-danger'>Invalid phone</p>";
                 $num_error++;
             }
         if($num_error == 0){

  $update = "UPDATE employee SET fname = '$fname', mname = '$mname', lname = '$lname', address = '$address', phone = '$phone' WHERE email = '$email'";
  $ext = mysqli_query($conn,$update);

  if($ext){
        $msg = "<div class='alert alert-success alert-dismissible fade show mn' role='alert'>
                  <strong><center>Updated successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
      }else{
        $msg = "<div class='alert alert-danger alert-dismissible fade show mn' role='alert'>
                  <strong><center>Not updated</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
      }
    }
}

?>
<!DOCTYPE html>
<?php include 'includes/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
  <section class="content">
    <?php if(!isset($_GET['update-detail'])) { ?>
   <div class="container-fluid">  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Profile</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title"><strong>Your Profile</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
                    $id = "";
                    $qry_select = "SELECT *FROM users WHERE username = '".$_SESSION['user_name']."'";
                    $ext_query = mysqli_query($conn,$qry_select);
                    while($row = mysqli_fetch_array($ext_query)){?>
                    <strong><i class="fa fa-check"></i> Name:</strong> <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?><br>
                      <strong><i class="fa fa-check"></i> Phone:</strong> <?php echo $row['phone']; ?><br>
                      <strong><i class="fa fa-check"></i> Email:</strong> <?php echo $row['email']; ?><br>
                      <strong><i class="fa fa-check"></i> Address:</strong> <?php echo $row['address']; ?><br>

                    <?php $username = $row['username'];
                          $fname = $row['fname'];
                          $mname = $row['mname'];
                          $lname = $row['lname'];
                          $address = $row['address'];
                          $phone = $row['phone']; } ?>
            </div>
            <div class="card-footer">
              <!-- <a href="profile.php?update-detail=<?php echo $email;?>&fname=<?php echo $fname;?>&mname=<?php echo $mname;?>&lname=<?php echo $lname?>&address=<?php echo $address;?>&phone=<?php echo $phone;?>" class="btn btn-white mn"><i class="fa fa-edit" style="color: red; font-size: 20px;" title="Update Profile"></i></a> -->
            </div>
        </div>
      </div><!-- /.container-fluid -->
    <?php } if(isset($_GET['update-detail'])) {?>
  <div class="container-fluid">  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Profile</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div>
        <form action="profile.php" method="POST"> 
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title"><strong>Update Your Profile</strong></h3>
        </div>
        <div class="card-body">
          <div class="form-row">
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php echo $_GET['fname'];?>" required>
                    <?=$fname_error;?>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name" value="<?php echo $_GET['mname'];?>" required>
                    <?=$mname_error;?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php echo $_GET['lname'];?>" required>
                    <?=$lname_error;?>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="address" placeholder="Enter City" value="<?php echo $_GET['address'];?>" required>
                    <?=$city_error;?>
                  </div>
                </div>                
                <div class="form-row">                  
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="<?php echo $_GET['phone'];?>" required>
                    <?=$phone_error;?>
                  </div>
                  <div class="form-group col-sm-6" id="email">
                    <input type="hidden" class="form-control" name="email" value="<?php echo $_GET['update-detail'];?>" required>
                  </div>
                </div>
        </div>
        <div class="card-footer">
          <input type="submit" name="update-detail" class="btn btn-danger mn" value="Update">
        </div>
      </div>
    </form>
    <?php } ?> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>
