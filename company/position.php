<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$title = "Home";
$cur = "position";
$msg = "";
if($_SESSION['role'] != 'company'){
    header("Location:../logout.php");
}

if(isset($_POST['add'])){


             $position = mysqli_escape_string($conn,$_POST['position']);

            $qry_check = mysqli_query($conn, "SELECT position_id FROM emp_position WHERE position = '$position'");

            if(mysqli_num_rows($qry_check)){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>This position is already added</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
            }else{

            $qry_insert = "INSERT INTO emp_position(position) VALUES('$position')";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Added Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not Added !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }


}
if(isset($_POST['update'])){


             $position = mysqli_escape_string($conn,$_POST['position']);
             $id = mysqli_escape_string($conn,$_POST['id']);

            $qry_insert = "UPDATE emp_position SET position = '$position' WHERE position_id = '$id'";
            $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Updated Successfully</center></strong>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <?php if(isset($_GET['add-position'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Positions  </a> / <a href="#" style="cursor: unset;">Add Position</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="position.php?add-position" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Add Position</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Positions</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="position.php?add-position" class="nav-link">
                      <i class="fas fa-plus"></i> Add Position
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="position.php?update-position" class="nav-link">
                      <i class="far fa-edit"></i> Update Position
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
                <h3 class="card-title">Add Employee Position</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="position.php?add-position" method="POST">
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                    <label>Employee Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Enter Employee Position" required>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php }
      if(isset($_GET['update-position'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Position </a> / <a href="#" style="cursor: unset;">Update Position</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Employee Position</h3>
              <a href="position.php?add-position" class="float-sm-right" title="Add Position"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Position</th>
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT *FROM emp_position";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['position'];?></td>
                  <td><a href="../action.php?delete-position=<?php echo $row['position_id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" style="color: red;" title="Delete Position"></i></a>&nbsp;  | &nbsp; <a href="position.php?update-detail=<?php echo $row['position_id']; ?>"><i class="fa fa-edit" style="color: blue;" title="Update Position"></i></a> <a href="position.php?position-id=<?php echo $row['position_id'] ?>"></a></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Position</th>
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Position </a> / <a href="#" style="cursor: unset;">Update Position</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
        <?php $qry = mysqli_query($conn, "SELECT *FROM emp_position WHERE position_id = '$id'");
                  while($row = mysqli_fetch_array($qry)){ ?>
                    <form action="position.php?update-position" method="POST">
                  <div class="card card-light">
                      <div class="card-header"><h3 class="card-title">Position Detail</h3>
                <a href="position.php?add-position" class="float-sm-right" title="Add Position"><i class="fa fa-plus"></i></a></div>
                  <div class="card-body"> 
                  <div class="form-row">  
                  <input type="hidden" name="id" class="form-control" value="<?php echo $row['position_id'] ?>" required> 
                  <div class="form-group col-sm-12">
                    <label>Employee Position</label>
                    <input type="text" name="position" class="form-control" value="<?php echo $row['position'] ?>" required>
                  </div></div></div><div class="card-footer"><input type="submit" class="btn btn-info" name="update" value="Update"></div></div></form>
                  <?php } } ?>

      </div><!-- /.container-fluid -->
      <br>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>