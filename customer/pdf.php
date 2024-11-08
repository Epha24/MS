<?php
    
ob_end_clean();
require('pdf_generator/fpdf.php');
include'../conn.php';
session_start();

if(isset($_GET['generate-car'])){
$sql = "SELECT car_res.resid, car_res.cid, car_res.sno, car.pid, car.tno, car.model, car.tsno, car.from_s, car.to_s, car.price FROM car_res JOIN car ON car.pid = car_res.cid AND car_res.username = '".$_SESSION['user_name']."' AND car_res.resid = '".$_GET['generate-car']."'";
if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0){  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(70);  
// Prints a cell with given text 
$pdf->Cell(50,20,'Bus Service Book Recit',0,0,'C');

// Line break
$pdf->Ln(20);
$width_cell=array(35,40,40,12);
$pdf->SetFont('Arial','B',13);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'From',1,0,'L',true);
$pdf->Cell($width_cell[0],10,'To',1,0,'L',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Plate Number',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[1],10,'Seat Number',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Price',1,1,'L',true); 
//// header ends ///////

$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;
$no = 1;

/// each record is one row  ///
foreach ($conn->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['from_s'],1,0,'L',$fill);
$pdf->Cell($width_cell[0],10,$row['to_s'],1,0,'L',$fill);
$pdf->Cell($width_cell[1],10,$row['tno'],1,0,'L',$fill);
$pdf->Cell($width_cell[1],10,$row['sno'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['price'],1,1,'L',$fill);
$no++;
//to give alternate background fill  color to rows//
$fill = !$fill;
}
  
// return the generated output
$pdf->Output();

}
}

if(isset($_GET['generate-food'])){
$sql = "SELECT food.fname, food.fprice, food_res.resid, food_res.fid FROM food JOIN food_res ON food.fid = food_res.fid AND food_res.username = '".$_SESSION['user_name']."' AND food_res.resid = '".$_GET['generate-food']."'";
if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0){  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(70);  
// Prints a cell with given text 
$pdf->Cell(50,20,'Food Service Order Recit',0,0,'C');

// Line break
$pdf->Ln(20);
$width_cell=array(35,40,40,12);
$pdf->SetFont('Arial','B',13);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Food Name',1,0,'L',true);
$pdf->Cell($width_cell[0],10,'To',1,0,'L',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Plate Number',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[1],10,'Seat Number',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Price',1,1,'L',true); 
//// header ends ///////

$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;
$no = 1;

/// each record is one row  ///
foreach ($conn->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['from_s'],1,0,'L',$fill);
$pdf->Cell($width_cell[0],10,$row['to_s'],1,0,'L',$fill);
$pdf->Cell($width_cell[1],10,$row['tno'],1,0,'L',$fill);
$pdf->Cell($width_cell[1],10,$row['sno'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['price'],1,1,'L',$fill);
$no++;
//to give alternate background fill  color to rows//
$fill = !$fill;
}
  
// return the generated output
$pdf->Output();

}
}
  
?>