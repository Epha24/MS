<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";
$cur = 'account';
 $title = "Manage Account";

 if($_SESSION['role'] != 'admin'){
    header("Location:../logout.php");
 }

if(isset($_POST['save'])){

  if(empty($_POST['dep'])){

             $username = mysqli_escape_string($conn,$_POST['username']);
             $password = mysqli_escape_string($conn,$_POST['password']);
             $confpassword = mysqli_escape_string($conn,$_POST['confpassword']);
             $email = mysqli_escape_string($conn,$_POST['email']);
             $fname = mysqli_escape_string($conn,$_POST['fname']);
             $mname = mysqli_escape_string($conn,$_POST['mname']);
             $lname = mysqli_escape_string($conn,$_POST['lname']);
             $phone = mysqli_escape_string($conn,$_POST['phone']);
             $eaddress = mysqli_escape_string($conn,$_POST['eaddress']);
             $role = 'company';
             $status = "Active";

             if($password != $confpassword){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Password do not match !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else if(strlen($password) < 6){

                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Password length should be greater than 6 !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";

             }else if(strlen($phone) < 10 || strlen($phone) > 10){

                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect phone number. It should be 10 digit !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";

             }else{

              $enc_password = md5($password);
              //$role = "passenger";
              $status = "Active";
              $chech_qry = "SELECT *FROM users WHERE username = '$username'";
              $ext_chech = mysqli_query($conn,$chech_qry);
              $num = mysqli_num_rows($ext_chech);
              if($num > 0){
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>User Already Exists !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{

              $qr2 = mysqli_query($conn, "INSERT INTO users(username, password, fname, mname, lname, address, email, phone, role) VALUES('$username', '$enc_password', '$fname', '$mname', '$lname', '$eaddress', '$email', '$phone', '$role')");

              if($qr2){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Created successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not created !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }
             }
}
}
        if(isset($_POST['update_detail'])){

             $username = mysqli_escape_string($conn,$_POST['username']);
             $role = mysqli_escape_string($conn,$_POST['dep']);
             $fname = mysqli_escape_string($conn,$_POST['fname']);
             $mname = mysqli_escape_string($conn,$_POST['mname']);
             $lname = mysqli_escape_string($conn,$_POST['lname']);
             $phone = mysqli_escape_string($conn,$_POST['phone']);


             $upqry = "UPDATE staff SET fname = '$fname', mname = '$mname', lname = '$lname', phone = '$phone', role = '$role' WHERE username = '$username'";
             $upext = mysqli_query($conn,$upqry);
                  if($upext){
                    mysqli_query($conn, "UPDATE users set role = '$role' WHERE username = '$username'");
                    $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                               <strong><center>Successfully updated</center></strong>
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                               <span aria-hidden='true'>&times;</span>
                            </button></div>";
                  } else {
                    $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                               <strong><center>Not updated</center></strong>
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
        <?php if(isset($_GET['create_account'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Account </a> / <a href="#" style="cursor: unset;">Create Account</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="account.php?create_account" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Create Account</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Account</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="account.php?create_account" class="nav-link">
                      <i class="fas fa-plus"></i> Create Account
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="account.php?update_account" class="nav-link">
                      <i class="far fa-edit"></i> Update Account
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
       <form role="form" action="account.php?create_account" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Create Account for Institute</h3>
              </div>
              <!-- /.card-header -->
              
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label>First Name :</label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Middle Name :</label>
                    <input type="text" class="form-control" name="mname" placeholder="Enter middle name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Last Name :</label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Phone :</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Email :</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Address :</label>
                    <input type="text" class="form-control" name="eaddress" placeholder="Enter address" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Username :</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Password :</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confpassword" placeholder="Confirm Password" required>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                </div>
            </div>
          </form>
          </div>
        </div>
      <?php }
      if(isset($_GET['update_account'])){;?>
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Account </a> / <a href="#" style="cursor: unset;">Update Account</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?php

          if($_GET['update_account'] == 'delete-success'){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Deleted successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
          } if($_GET['update_account'] == 'status-success'){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Changed successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
          }

         ?>
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Update Account</h3>
              <a href="account.php?create_account" class="float-sm-right" title="Create New Account"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Account Status</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                  $email = $_SESSION['user_name'];
                   $qry = "SELECT *FROM users  WHERE username != '$email'";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['role']?></td>
                  <td><?php if($row['status'] == "Inactive"){echo "<span class='text-danger'>".$row['status']."</span>";}else{echo "<span class='text-success'>".$row['status']."</span>";}?></td>
                 <td><!-- <a href="../action.php?delete-account=<?php echo $row['username'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" style="color: red;" title="Delete Account"></i></a>&nbsp;  --><!-- &nbsp; <a href="account.php?update-detail=<?php echo $row['username']; ?>"><i class="fa fa-edit" style="color: blue;" title="Update Account"></i></a> &nbsp;| --> &nbsp; <a href="../action.php?change-status=<?php echo $row['username'] ?>" onclick="return confirm('Are you sure you want to change account status?')"><i class="fa fa-ban" style="color: orange;" title="Change account status"></i></a> | &nbsp; <a href="../action.php?delete-account=<?php echo $row['username'] ?>" onclick="return confirm('Are you sure you want to delete selected account?')"><i class="fa fa-trash" style="color: red;" title="Delete account"></i></a></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Account Status</th>
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
      <?php } if(isset($_GET['update-detail'])){

        $_SESSION['id'] = $_GET['update-detail'];
        $id = $_SESSION['id'];
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Account </a> / <a href="#" style="cursor: unset;">Update Account</a>  /  <a href="#" style="cursor: unset;">Update Detail </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
      <form role="form" action="account.php?update_account" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Detail</h3>
                <a href="account.php?update_account" class="float-sm-right" title="Update Account"><i class="fa fa-edit"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


           <div class="card-body">
                <input type="hidden" name="username" value="<?php echo $_GET['update-detail']?>">

                  <?php
                    $qry = "SELECT users.fname, users.mname, users.lname, users.phone, users.email, users.username, institution.e_name, institution.e_address, institution.username FROM users JOIN institution ON users.username = institution.username AND users.username = '".$_GET['update-detail']."'";
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
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" placeholder="Enter phone number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Email : </label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter email" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Institute Name : </label>
                    <input type="text" class="form-control" name="ename" value="<?php echo $row['e_name'] ?>" placeholder="Enter institution name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Institute Address : </label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['e_address'] ?>" placeholder="Enter institution address" required>
                  </div>
                </div> <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update_detail" class="btn btn-primary">Save</button>
                </div>
            </div>
          </form>
      <?php } ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>

<script>
  function change_role(){
     var xmlhttp = new XMLHttpRequest();
     var dep = document.getElementById("dep").value;
     xmlhttp.open("GET","../select.php?dep="+dep,false);     
     xmlhttp.send(null);
     document.getElementById("email").innerHTML = xmlhttp.responseText;
}
</script>