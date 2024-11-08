<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";
$cur = "categories";
$title = "Manage Categories";

 if($_SESSION['role'] != 'admin'){
     header("Location:../logout.php");
 }

if(isset($_POST['add'])){
    $department = $_POST['department'];

    $qrycheck = mysqli_query($conn, "SELECT *FROM department WHERE department = '".$department."'");
    $num_rows = mysqli_num_rows($qrycheck);
    if($num_rows > 0){
      $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Department Already Exists !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }else{

    $qry = mysqli_query($conn,"INSERT INTO department(department) VALUES('$department')");
    if($qry){
     $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>New Category Added Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }else{
      $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Ooops!!! Something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }
  }
}
if(isset($_POST['update-detail'])){
    $department = $_POST['department'];
    $dep_id = $_POST['dep_id'];
    
    $qry_check = mysqli_query($conn, "SELECT *FROM department WHERE department = '$department' AND department_id != '$dep_id'");
    if(mysqli_num_rows($qry_check) > 0){
      $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Category with the same name already exists !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }else{

    $qry = mysqli_query($conn,"UPDATE department SET department = '".$department."' WHERE department_id = '".$dep_id."'");
    if($qry){
     $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Category Updated Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }
}
}
include 'includes/menu.php';
?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if(isset($_GET['add-category'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a>  /  <a href="#" style="cursor: unset;">Manage Category</a> / <a href="#" style="cursor: unset;">Add Category</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="categories.php?add-category" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Add Category</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Category</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="categories.php?add-category" class="nav-link">
                      <i class="fas fa-plus"></i> Add Category
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="categories.php?update-category" class="nav-link">
                      <i class="far fa-edit"></i> Update Category
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
		<form role="form" action="categories.php?add-category" method="POST">
        <div class="card card-light" style="padding-bottom:0px;">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="department" placeholder="Enter Category" required>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                </div>             
            </div>
			</form>
          </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      <?php }
      if(isset($_GET['update-category'])){ ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Categories</a> / <a href="#" style="cursor: unset;">Update Category</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?php if($_GET['update-category'] == 'delete-success'){
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Deleted Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
        } ?>
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Update Category</h3>
              <a href="categories.php?add-category" class="float-sm-right" title="Add New Category"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT *FROM department";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['department'];?></td>
                 <td><?php echo $row['status'];?></td>
                 <td><?php if($row['status'] == 'Locked'){ ?> <a href="#"><i class="fa fa-edit" style="color: blue;" title="Locked"></i></a> &nbsp; | &nbsp; <a href="#"><i class="fa fa-trash" style="color: orange;" title="Locked"></i></a><?php } else { ?><a href="categories.php?update-detail=<?php echo $row['department_id']; ?>"><i class="fa fa-edit" style="color: blue;" title="Update Category"></i></a> &nbsp;  | &nbsp; <a href="../action.php?delete-department=<?php echo $row['department_id'] ?>" onclick="return confirm('Are you sure you want to delete department?')"><i class="fa fa-trash" style="color: orange;" title="Delete department"></i></a><?php } ?> </td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>                  
                </tr> 
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Manage Department </a> / <a href="#" style="cursor: unset;">Update Department</a>  /  <a href="#" style="cursor: unset;">Update Detail </a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
	<form role="form" action="categories.php?update-category" method="POST">
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Detail</h3>
                <a href="categories.php?update-category" class="float-sm-right" title="Update Department"><i class="fa fa-edit"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <input type="hidden" name="id" value="<?php echo $_GET['update-detail']?>">

                  <?php
                    $qry = "SELECT *FROM department WHERE department_id = '$id'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" value="<?php echo $row['department'] ?>" name="department" placeholder="Enter Department" required>
                  </div>
                    <input type="hidden" class="form-control" name="dep_id" value="<?php echo $row['department_id'] ?>">
                </div>              
                  <?php }?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-detail" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                </div>
            </div>
			</form>
      </div>
          </div>
        </div> 
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>        
  <!-- /.content-wrapper -->
      <?php } include 'includes/footer.php'; ?>
