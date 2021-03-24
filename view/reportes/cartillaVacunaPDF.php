<?php
//require('pdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFont('Arial','B',15);
    $this->Cell(40);
    $this->Cell(120,10,utf8_decode('Cartilla de Vacunación'),1,0,'C');
    $this->Ln(28);
}

// Pie de página
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(255,0,0);


//FIRMAS REVOCATORIAS A LA VACUNA
$pdf->Cell(100);   //posicion
$pdf->Ln(0);       //salto de linea
$pdf->Cell(100);
$pdf->Cell(60, 0, utf8_decode('CARNÉ DE'), 0, 0, 'C', 0);
$pdf->Ln(10);
$pdf->Cell(104);
$pdf->Cell(60, 0, utf8_decode('VACUNACIÓN'), 0, 0, 'C', 0);
$pdf->Ln(10);
$pdf->Cell(114);
$pdf->Cell(60, 0, utf8_decode('MAYORES DE 5 AÑOS'), 0, 0, 'C', 0);

//subiendo la siguiente firma
$pdf->Ln(-12.2);
$pdf->Cell(120); 
$pdf->Ln(4);     
$pdf->Cell(10);  
$pdf->Image('public/img/salud.jpg', 13, 35, 70);
$pdf->Ln(30);        //salto de linea


$pdf->Cell(50);
$pdf->Cell(-1, 0, utf8_decode('NOMBRE: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode($dataPersonal->nombre), 1, 0, 'C', 1);
$pdf->Ln(10);

$pdf->Cell(47);
$pdf->Cell(-1, 0, utf8_decode('APELLIDOS: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode($dataPersonal->apellidoPaterno . " " . $dataPersonal->apellidoMaterno), 1, 0, 'C', 1);
$pdf->Ln(10);


$pdf->Cell(48);
$pdf->Cell(-1, 0, utf8_decode('DOMICILIO: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(110);
$pdf->Cell(-1, 0, utf8_decode("............................................................."), 1, 0, 'C', 1);
$pdf->Ln(10);


$pdf->Cell(43);
$pdf->Cell(-1, 0, utf8_decode('# DOCUMENTO: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode($dataPersonal->idDNI ), 1, 0, 'C', 1);
$pdf->Ln(10);


$pdf->Cell(54);
$pdf->Cell(-1, 0, utf8_decode('EDAD: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode("......."), 1, 0, 'C', 1);
$pdf->Ln(10);

$pdf->Cell(47);
$pdf->Cell(-1, 0, utf8_decode('PROVINCIA: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode("......."), 1, 0, 'C', 1);
$pdf->Ln(10);


$pdf->Cell(43);
$pdf->Cell(-1, 0, utf8_decode('# DE CELULAR: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode($dataPersonal->telefono), 1, 0, 'C', 1);
$pdf->Ln(10);

$pdf->Cell(43);
$pdf->Cell(-1, 0, utf8_decode('INST LABORAL: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(100);
$pdf->Cell(-1, 0, utf8_decode("JESUS DEL NORTE"), 1, 0, 'C', 1);
$pdf->Ln(20);

$pdf->Cell(190,10,utf8_decode('PRIMERA DOSIS CONTRA COVID-19'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode("FECHA"),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode(""),1,0,'C',0);
$pdf->Ln(10);

$pdf->Cell(190,10,utf8_decode('SEGUNDA DOSIS CONTRA COVID-19'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode("FECHA"),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode(""),1,0,'C',0);
$pdf->Ln(10);


$pdf->Output();
