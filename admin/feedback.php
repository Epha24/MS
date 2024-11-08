<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$msg = "";
$error = 0;
$title = "Feedbacks";
$cur = "feedback";
if($_SESSION['role'] != 'admin'){
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
      <?php 
		  
      if(isset($_GET['view-feedback'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Feedbacks </a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Feedbacks</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Full Name</th>
                  <th>Phone</th>
        				  <th>Email</th>
        				  <th>Message</th>	                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT *FROM contact_us";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['email']; ?></td>
				          <td><?php echo $row['message']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Full Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th> 
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
        <br>
      <?php }  ?>
      
      </div><!-- /.container-fluid -->
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
	</script>