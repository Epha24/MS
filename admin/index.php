<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$cur = 'index';
$title = 'Home';

if($_SESSION['role'] != 'admin'){
    header("Location:../logout.php");
}

?>
<!DOCTYPE html>
<?php include 'includes/menu.php'; ?>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                      <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info mn">
              <div class="inner">
                <?php $qry = "SELECT *FROM users WHERE role = 'admin'";
                      $ext = mysqli_query($conn,$qry);
                      $num = mysqli_num_rows($ext);?>
                <h3><?php echo $num; ?></h3>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success mn">
              <div class="inner">
                <?php $qry_ass = "SELECT *FROM users WHERE role = 'company'";
                      $ext_ass = mysqli_query($conn,$qry_ass);
                      $num_ass = mysqli_num_rows($ext_ass);?>
                <h3><?php echo $num_ass; ?></h3>
                <p>Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success mn">
              <div class="inner">
                <?php $qry_ass = "SELECT *FROM users WHERE role = 'company' ";
                      $ext_ass = mysqli_query($conn,$qry_ass);
                      $num_ass = mysqli_num_rows($ext_ass);?>
                <h3><?php echo $num_ass; ?></h3>
                <p>Confirmed Requests </p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success mn">
              <div class="inner">
                <?php $qry_ass = "SELECT *FROM users WHERE role = 'job seeker'";
                      $ext_ass = mysqli_query($conn,$qry_ass);
                      $num_ass = mysqli_num_rows($ext_ass);?>
                <h3><?php echo $num_ass; ?></h3>
                <p>Rejected Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="item.php?view-item" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include 'includes/footer.php'; ?>
</html>