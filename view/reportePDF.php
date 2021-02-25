<?php
//require('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,0,0);

$pdf->Cell(60,10,'Nombre',1,0,'C',1);
$pdf->Cell(60,10,'Apellido Paterno',1,0,'C',1);
$pdf->Cell(70,10,'Apellido Materno',1,1,'C',1);
$pdf->Cell(60,10,utf8_decode($dataPersonal->nombre),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->apellidoPaterno),1,0,'C',0);
$pdf->Cell(70,10,utf8_decode($dataPersonal->apellidoMaterno),1,1,'C',0);
$pdf->Ln(20);


$pdf->Cell(60,10,'Nacimiento',1,0,'C',1);
$pdf->Cell(60,10,'Actividad',1,1,'C',1);
$pdf->Cell(60,10,utf8_decode($dataPersonal->fecha),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->actividad),1,0,'C',0);
$pdf->Ln(15);

$pdf->Cell(120,10,'Profesion',1,1,'C',1);
$pdf->Cell(120,10,utf8_decode($dataPersonal->profesion),1,1,'C',0);
$pdf->Ln(20);

$pdf->Cell(60,10,'PERSONAL COVID',1,0,'C',1);
$pdf->Cell(60,10,'ENVIADO POR DIRIS',1,0,'C',1);
$pdf->Cell(60,10,'1ra DOSIS VACUNA',1,1,'C',1);
$pdf->Cell(60,10,utf8_decode($dataPersonal->checkCovid),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->checkDiris),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->checkVacuna),1,0,'C',0);
$pdf->Ln(120);



$pdf->cell(60,1,'',1,1,'',0);
$pdf->Ln(5);
$pdf->Cell(60,0,'FIRMA',0,0,'C',0);

$pdf->Output();
