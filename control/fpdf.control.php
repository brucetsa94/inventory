<?php
require ("/includes/fpdf181/fpdf.php");

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World !',1);

$pdf->Output();
?>