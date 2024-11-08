<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$title = "Home";
$cur = "index";
if($_SESSION['role'] != 'company'){
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
    <div class="content-header">
      <div class="container-fluid">
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	<div class="card" style="border-radius : 0px; text-transform: uppercase; border-left : 6px solid orange;">
		<div class="card-body">
			<span style="font-size : 19px; font-weight : 700;">
				<i class="fa fa-check" style="color : red;"></i> Welcome, <i style="color : orange"><?php echo user(); ?> </i>,  To Online Multi-Service Portal</span>
			</div>
	  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>