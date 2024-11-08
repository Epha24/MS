<?php

session_start();
include '../security.php';
include '../conn.php';
include 'user.php';
$title = "Profile";
$cur = "profile";
$msg = "";

if($_SESSION['role'] != 'customer'){
    header("Location:../logout.php");
}

if(isset($_POST['update_detail'])){
	
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $username = $_SESSION['user_name'];


  $qry_insert = mysqli_query($conn, "UPDATE users SET fname = '$fname', mname = '$mname', lname = '$lname', phone = '$phone', email = '$email' WHERE username = '$username'");

         if($qry_insert){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Updated successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not Updated !!!</center></strong>
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
                    while($row = mysqli_fetch_array($ext_query)){ 
                      ?>
				       <i class="fa fa-check" style="color:red;"></i> <strong>Full Name:</strong> <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?><br>
				      <i class="fa fa-check" style="color:red;"></i> <strong>Phone:</strong> <span style="text-transform:capitalize;"><?php echo $row['phone']; ?> </span><br>
				      <i class="fa fa-check" style="color:red;"></i> <strong>Email:</strong> <span style="text-transform:capitalize;"><?php echo $row['email']; ?> </span><br>
              <i class="fa fa-check" style="color:red;"></i> <strong>Address:</strong> <span style="text-transform:capitalize;"><?php echo $row['address']; ?> </span><br>
				     <?php $user_id = $row['username']; } ?>
            </div>
            <div class="card-footer">
              <a href="profile.php?update-detail=<?php echo $user_id;?>" class="btn btn-white mn"><i class="fa fa-edit" style="color: red; font-size: 20px;" title="Update Profile"></i></a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    <?php } 		  
if(isset($_GET['update-detail'])){

        $_SESSION['id'] = $_GET['update-detail'];
        $id = $_SESSION['id'];
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Update Profile</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="profile.php" method="POST">

           <div class="card-body">
                  <?php
                    $qry = "SELECT *FROM users WHERE username = '$id'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                 <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label>First Name : </label>
                    <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'] ?>" placeholder="Enter first name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Middle Name : </label>
                    <input type="text" class="form-control" name="mname" value="<?php echo $row['mname'] ?>" placeholder="Enter middle name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Last Name : </label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'] ?>" placeholder="Enter last name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Phone : </label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" placeholder="Enter phone" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Email : </label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter email" required>
                  </div>
                </div> <?php } ?>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update_detail" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                </div>
              </form>
            </div>
      <?php } ?>
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
	
	function change_status(){
     var xmlhttp = new XMLHttpRequest();
     var e_status = document.getElementById("e_status").value;
      if(e_status == "Unemployed"){
		   document.getElementById('e_organization').style.display = "none";
		  document.getElementById('e_address').style.display = "none";
	  }
		if(e_status == "Employed"){
		   document.getElementById('e_organization').style.display = "block";
			document.getElementById('e_address').style.display = "block";
	  }
}
	
</script>
