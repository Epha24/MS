<?php

session_start();
$msg = "";
include '../security.php';
include '../conn.php';
include 'user.php';
$title = "Change Your Password";
$cur = "password";
if($_SESSION['role'] != 'customer'){
    header("Location:../logout.php");
}

   if(isset($_POST['change'])){

   $oldpassword = md5($_POST['oldpassword']);
   $newpassword = $_POST['newpassword'];
   $confpassword = $_POST['confpassword'];

   $qry = "SELECT *FROM users WHERE password = '$oldpassword' AND username = '".$_SESSION['user_name']."'";
   $ext = mysqli_query($conn,$qry);
   $num = mysqli_num_rows($ext);

   if($num > 0){
   if($newpassword == $confpassword){
   if(strlen($newpassword) > 6){
    $enc = md5($newpassword);
   $insert_query = "UPDATE users SET password = '$enc' WHERE password = '$oldpassword' AND username = '".$_SESSION['user_name']."'";
   $ext_insert = mysqli_query($conn,$insert_query);

   if($ext_insert){
   $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong><center>Password changed successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Not Changed</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Password length should be Greater than 6</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>The new password do not Match</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Old Password do not Matchs</center></strong>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Change Password</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?=$msg;?>
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Change Your Password</h5>
              </div>
                <form role="form" action="chpassword.php" method="POST">
                  <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-sm-4">
                    <input type="Password" name="oldpassword" placeholder="Enter old Password" class="form-control">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="Password" name="newpassword" placeholder="Enter new Password" class="form-control">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="Password" name="confpassword" placeholder="Confirm new Password" class="form-control">
                  </div>
                </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="change" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                </div>
                </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>