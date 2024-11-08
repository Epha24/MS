<?php

include '../conn.php';

if(isset($_GET['dep'])){

	$dep = $_GET['dep'];

	    $qry = "SELECT DISTINCT entry FROM student WHERE dep = '".$dep."'";
		$ext = mysqli_query($conn,$qry);
		echo "<select class='form-control' name='batch' id='batch'>";
		echo "<option selected='selected' disabled='disabled'>Select Batch</option>";
		while($row = mysqli_fetch_array($ext)){
			echo "<option>".$row['entry']."</option>";
		}
		echo "</select>";

}

if(isset($_GET['dep_id'])){
	$dep = $_GET['dep_id'];

	    $qry = "SELECT course.course_id, course.course, course.course_short_name, course.type, dep_course.dep_course_id, dep_course.dep_id, dep_course.course_id, department.dep_id, department.dep_name FROM course JOIN dep_course JOIN department ON department.dep_id = dep_course.dep_id AND department.dep_id = '".$dep."' AND course.course_id = dep_course.course_id";
		$ext = mysqli_query($conn,$qry);
		echo "<select class='form-control' name='course[]' multiple>";
		echo "<option selected='selected' disabled='disabled'> -- Select Course --</option>";
		while($row = mysqli_fetch_array($ext)){
			echo "<option value='".$row['course_id']."'>".$row['course']."</option>";
		}
		echo "</select>";
}

if(isset($_GET['level']) && isset($_GET['depart'])){
	$level = $_GET['level'];
	$dep = $_GET['depart'];
	$batch = $_GET['batch'];

	    $qry = "SELECT *FROM result WHERE dep_id = '".$dep."' AND level_id = '".$level."' AND batch = '".$batch."'";
		$ext = mysqli_query($conn, $qry);
		$count = mysqli_num_rows($ext);

		if($count == 0){
			echo "<hr><button class='btn btn-primary' name='create_sheet'>Create Mark Sheet</button>";
		}else{
			$qry_res = mysqli_query($conn, "SELECT department.dep_id, department.dep_name, course.course_id, course.course, course.course_short_name, student.stud_id, student.fname, student.mname, level.level_id, level.level, result.result_id, result.course_id, result.stud_id, result.batch, result.dep_id, result.level_id, result.value FROM department JOIN course JOIN student JOIN level JOIN result ON department.dep_id = result.dep_id AND course.course_id = result.course_id AND student.stud_id = result.stud_id AND level.level_id = result.level_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."' AND result.batch = '".$batch."' GROUP BY result.stud_id"); ?>

				<form action="result.php?manage-result" method="POST">
					<div style="border-radius: 0px; border:1px solid #e6ede7;">
						<br>
					<h2 style="font-family: roman; font-style: bold;"><center>Mirab Abaya Construction and Industrial College</center></h1>
					<h2 style="font-family: roman; font-style: bold;"><center>Office of Registrar</center></h2>
					<h3 style="font-family: roman; font-style: bold;"><center>Students' Grade</center></h3><br>
				<?php $qry_header = mysqli_query($conn, "SELECT department.dep_id, department.dep_name, department.dep_name_opt, level.level_id, level.level, result.dep_id, result.level_id FROM department JOIN level JOIN result ON department.dep_id = result.dep_id AND level.level_id =  result.level_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."'");
				   $row_header = mysqli_fetch_array($qry_header); ?>

				   	 <h5 style="font-family: roman;">&nbsp;&nbsp;Department : <span class="text-danger"><?php echo $row_header["dep_name"]; ?></span> | Batch : <span class="text-danger"><?php echo $batch; ?></span> | Level : <span class="text-danger"><?php echo $row_header["level"]; ?></span></h5></div>
				<table class="table table-bordered example1">
                <thead>
                <tr>
                	<?php $qry_course = mysqli_query($conn, "SELECT course.course_id, course.course, course.course_short_name, result.result_id, result.course_id, result.stud_id, result.batch, result.dep_id, result.level_id FROM course JOIN result ON course.course_id = result.course_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."' AND result.batch = '".$batch."' GROUP BY result.course_id");
                	 ?>
                  <th>No</th>
				          <th>ID</th>
                  <th>Name</th>
                  <?php while($row_course = mysqli_fetch_array($qry_course)){ echo "<th><a href='#' title='".$row_course['course']."'>".$row_course['course_short_name']."</a></th>";} ?> 
                  <th>Total</th>  
                  <th>Average</th>
                  <th>Status</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   while($row = mysqli_fetch_array($qry_res)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
				  <td><?php echo $row['stud_id']?></td>
                  <td><?php echo $row['fname']." ".$row['mname'];?></td>
                  <?php $qry_res2 = mysqli_query($conn, "SELECT result_id, value FROM result WHERE stud_id = '".$row['stud_id']."'");
                       $qry_total_av = mysqli_query($conn, "SELECT *FROM total_average WHERE stud_id = '".$row['stud_id']."'");
                        while($row_val = mysqli_fetch_array($qry_res2)){
                        $status = mysqli_query($conn, "SELECT status FROM total_average WHERE stud_id = '".$row['stud_id']."'");
                        $row_stat = mysqli_fetch_array($status);
                        if($row_stat['status'] == 'Pending'){
                        	echo "<td><input type='number' onkeyup='this.value = minmaxvalidation(this, this.value)' min='0' max='100' name='value[]' style='border:0px; border-radius:0px; width:60px' value='".$row_val['value']."'><input type='hidden' name='result_id[]' value='".$row_val['result_id']."'></td>"; } else{ echo "<td><input type='number' name='value[]' style='border:0px; border-radius:0px; width:60px' value='".$row_val['value']."' readonly><input type='hidden' name='result_id[]' value='".$row_val['result_id']."'></td>"; } 
                        }
                        while($row_total = mysqli_fetch_array($qry_total_av)){echo "<td><input type='number' name='total[]' style='border:0px; border-radius:0px; width:60px' value='".$row_total['total']."' readonly></td><td><input type='number' name='average[]' style='border:0px; border-radius:0px; width:60px' value='".$row_total['average']."' readonly></td><td>"; if($row_total['status'] == 'Pending'){ echo "<input type='text' name='status[]' style='border:0px; border-radius:0px; width:70px; color:red;' value='".$row_total['status']."' readonly>"; } else{ echo "<input type='text' name='status[]' style='border:0px; border-radius:0px; width:70px; color:blue;' value='".$row_total['status']."' readonly>"; } echo "</td>"; }?>
                </tr><?php $num++;
              } ?>
                </tbody>
                <tfoot>
                <tr>
                	<?php $qry_course = mysqli_query($conn, "SELECT course.course_id, course.course, course.course_short_name, result.result_id, result.course_id, result.stud_id, result.batch, result.dep_id, result.level_id FROM course JOIN result ON course.course_id = result.course_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."' AND result.batch = '".$batch."' GROUP BY result.course_id");
                	 ?>
                  <th>No</th>
				  <th>ID</th>
                  <th>Name</th>
                  <?php while($row_course = mysqli_fetch_array($qry_course)){ echo "<th><a href='#' title='".$row_course['course']."'>".$row_course['course_short_name']."</a></th>";} ?> 
                  <th>Total</th>  
                  <th>Average</th> 
                  <th>Status</th> 
                </tr>
                </tfoot>
              </table>
            <button class="btn btn-primary" name="save">Save</button> &nbsp; &nbsp;<a href="excel.php?level=<?php echo $level; ?>&batch=<?php echo $batch; ?>&dep=<?php echo $dep; ?>" class="btn btn-primary" name="excel" target="_blank">Generate Excel</a> </form>
			<?php }
		}


?>