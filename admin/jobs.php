<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";
$cur = 'jobs';
 $title = "Services";

 if($_SESSION['role'] != 'admin'){
    header("Location:../logout.php");
 }

 include'includes/menu.php';
 ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php 
      if(isset($_GET['jobs'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Jobs</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div>
        <?php 
              if($_GET['jobs'] == 'success'){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Approved Successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }

        ?> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Jobs</h3>
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
                   $qry = "SELECT service.sid, service.oname, service.stitle, service.status, department.department_id, department.department FROM service JOIN department ON service.scategory = department.department_id";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['oname'];?></td>
                  <td><?php echo $row['department'];?></td>
                  <td><?php echo $row['stitle'];?></td>
                  <td><?php echo $row['status'];?></td>
                  <td><!--<a href="../action.php?delete-vacancy=<?php echo $row['job_id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" style="color: red;" title="Delete Vacancy"></i></a>&nbsp;  | &nbsp; --> <a href="../action.php?approve=<?php echo $row['sid']; ?>" onclick="return confirm('Are you sure you want to approve?')"><i class="fa fa-check" style="color: blue;" title="Approve"></i></a>&nbsp;  | &nbsp; <a href="jobs.php?view-detail=<?php echo $row['sid']; ?>"><i class="fa fa-eye" style="color: red;" title="Add Detail"></i></a></td>
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
       if(isset($_GET['view-detail'])) { ?>
   <div class="container-fluid">  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Services</a> / <a href="#" style="cursor: unset;">View Detail</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
            <!-- /.card-header -->
            <?php $qry = mysqli_query($conn, "SELECT service.sid, service.scategory, service.oname, service.stitle, service.status, service.location, service.description, department.department_id, department.department FROM service JOIN department ON service.scategory = department.department_id AND service.sid = '".$_GET['view-detail']."'");
                  while($row = mysqli_fetch_array($qry)){ ?>
      <form role="form" action="services.php?update-service" method="POST">       
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Service</h3>
                  <a href="jobs.php?jobs" class="float-sm-right" title="View Other Service"><i class="fa fa-eye"></i></a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                    <label>Organization Name :</label>
                    <input type="text" class="form-control" value="<?php echo $row['oname'] ?>" name="oname" placeholder="Enter Organization Name" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Category :</label>
                    <input type="text" class="form-control" value="<?php echo $row['department'] ?>" name="scategory" readonly>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Service Title :</label>
                    <input type="text" class="form-control" value="<?php echo $row['stitle'] ?>" name="stitle" placeholder="Enter Service Title" readonly>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Location :</label>
                    <input type="text" class="form-control" value="<?php echo $row['location'] ?>" name="address" placeholder="Enter Location" readonly>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Description</label>
                    <textarea placeholder="Enter service description" class="form-control" name="description" readonly><?php echo $row['description']; ?></textarea>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
          </form><!-- /.container-fluid --> <?php } } ?>
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

  function change_role(){
     var xmlhttp = new XMLHttpRequest();
     var dep = document.getElementById("dep").value;
     xmlhttp.open("GET","../select.php?dep="+dep,false);     
     xmlhttp.send(null);
     document.getElementById("email").innerHTML = xmlhttp.responseText;
}
</script>