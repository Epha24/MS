<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$title = "Home";
$cur = "index";
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
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div>
           <div class="card" style="border-radius : 0px; text-transform: uppercase; border-left: 7px solid orange;"><div class="card-body"><span style="font-size : 19px; font-weight : 700;"><i class="fa fa-check" style="color : red;"></i> Welcome, <i style="color : orange"><?php echo user(); ?> </i>,  E-Services</span></div></div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>