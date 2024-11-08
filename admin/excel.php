<?php 

  include'../conn.php';

  if(isset($_GET['level']) && isset($_GET['dep'])){
  $level = $_GET['level'];
  $dep = $_GET['dep'];
  $batch = $_GET['batch'];
  $html = "";

      $qry_res = mysqli_query($conn, "SELECT department.dep_id, department.dep_name, course.course_id, course.course, course.course_short_name, student.stud_id, student.fname, student.mname, student.lname, student.sex, student.age, level.level_id, level.level, result.result_id, result.course_id, result.stud_id, result.batch, result.dep_id, result.level_id, result.value FROM department JOIN course JOIN student JOIN level JOIN result ON department.dep_id = result.dep_id AND course.course_id = result.course_id AND student.stud_id = result.stud_id AND level.level_id = result.level_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."' AND result.batch = '".$batch."' GROUP BY result.stud_id");

          $html .='<div style="border-radius: 0px; border:1px solid #e6ede7;">
          <br>
          <h2 style="font-family: Times New Roman; font-style: bold;"><center>Mirab Abaya Construction and Industrial College</center></h1>
          <h2 style="font-family: Times New Roman; font-style: bold;"><center>Office of Registrar</center></h2>
          <h3 style="font-family: Times New Roman; font-style: bold;"><center>Students Grade</center></h3><br>';
          
           $qry_header = mysqli_query($conn, "SELECT department.dep_id, department.dep_name, department.dep_name_opt, level.level_id, level.level, result.dep_id, result.level_id FROM department JOIN level JOIN result ON department.dep_id = result.dep_id AND level.level_id =  result.level_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."'");
           $row_header = mysqli_fetch_array($qry_header); 

             $html .= '<h3 style="font-family: Times New Roman;">&nbsp;&nbsp;Department : <span class="text-danger">'.$row_header['dep_name'].'</span> | Batch : <span class="text-danger">'.$batch.'</span> | Level : <span class="text-danger">'.$row_header["level"].'</span></h3></div>
               <table style="border-collapse: collapse;">
                <thead>
                <tr>';
                  $qry_course = mysqli_query($conn, "SELECT course.course_id, course.course, course.course_short_name, result.result_id, result.course_id, result.stud_id, result.batch, result.dep_id, result.level_id FROM course JOIN result ON course.course_id = result.course_id AND result.dep_id = '".$dep."' AND result.level_id = '".$level."' AND result.batch = '".$batch."' GROUP BY result.course_id");
                   
        $html .= '
                  <th style="border:1px solid black;">ID</th>
                  <th style="border:1px solid black;">First Name</th>
                  <th style="border:1px solid black;">Midle Name</th>
                  <th style="border:1px solid black;">Last Name</th>
                  <th style="border:1px solid black;">Sex</th>
                  <th style="border:1px solid black;">Age</th>';
                  while($row_course = mysqli_fetch_array($qry_course)){; $html .= '<th style="border:1px solid black;">'.$row_course["course"].'</th>'; } 
                  $html .='<th style="border:1px solid black;">Total</th>  
                  <th style="border:1px solid black;">Average</th>               
                  </tr>
                  </thead>
                  <tbody>';

                  // $num = 1;
                   while($row = mysqli_fetch_array($qry_res)){
                  
                $html .= '<tr>
                  
                  <td style="border:1px solid black;">'.$row["stud_id"].'</td>
                  <td style="border:1px solid black;">'.$row["fname"].'</td>
                  <td style="border:1px solid black;">'.$row["mname"].'</td>
                  <td style="border:1px solid black;">'.$row["lname"].'</td>
                  <td style="border:1px solid black;">'.$row["sex"].'</td>
                  <td style="border:1px solid black;">'.$row["age"].'</td>';
                  $qry_res2 = mysqli_query($conn, "SELECT result_id, value FROM result WHERE stud_id = '".$row['stud_id']."'");
                       $qry_total_av = mysqli_query($conn, "SELECT *FROM total_average WHERE stud_id = '".$row['stud_id']."'");
                        while($row_val = mysqli_fetch_array($qry_res2)){ $html .= '<td style="border:1px solid black;">'.$row_val["value"].'</td>'; } 
                        while($row_total = mysqli_fetch_array($qry_total_av)){ $html .='<td style="border:1px solid black;">'.$row_total["total"].'</td><td style="border:1px solid black;">'.$row_total["average"].'</td>'; }
                $html .='</tr>';  } 
                $html .='</tbody>
              </table>'; }

             header('Content-Type:application/xls');
             header('Content-Disposition:attachment;filename=report.xls');
             echo $html;
            
    ?>