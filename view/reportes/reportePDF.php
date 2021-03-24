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
    $this->Cell(40);
    // Título
    $this->Cell(120,10,utf8_decode('Triaje del Personal'),1,0,'C');
    // Salto de línea
    $this->Ln(15);
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
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(255,0,0);

$pdf->Cell(60,10,'Nombre',1,0,'C',0);
$pdf->Cell(60,10,'Apellido Paterno',1,0,'C',0);
$pdf->Cell(70,10,'Apellido Materno',1,1,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->nombre),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->apellidoPaterno),1,0,'C',0);
$pdf->Cell(70,10,utf8_decode($dataPersonal->apellidoMaterno),1,1,'C',0);
$pdf->Ln(5);


$pdf->Cell(60,10,'Nacimiento',1,0,'C',0);
$pdf->Cell(60,10,'Actividad',1,1,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->fecha),1,0,'C',0);
$pdf->Cell(60,10,utf8_decode($dataPersonal->actividad),1,0,'C',0);
$pdf->Ln(15);
                                    //color
$pdf->Cell(120,10,utf8_decode('Profesión'),1,1,'C',0);
$pdf->Cell(120,10,utf8_decode($dataPersonal->profesion),1,1,'C',0);
$pdf->Ln(10);

$pdf->Cell(100);
$pdf->Cell(-1,-1,'PREGUNTAS RESPONDIDAS',1,1,'C',0);
$pdf->Ln(8);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,10,utf8_decode('¿Tiene o ha tenido fiebre en la última semana?'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode($dataPersonal->checkfiebre),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode($dataPersonal->descfiebre),1,0,'C',0);
$pdf->Ln(10);

$pdf->Cell(190,10,utf8_decode('¿Tiene o ha tenido dolor de garganta o perdida de olfato en la última semana?'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode($dataPersonal->checkgarganta),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode($dataPersonal->descgarganta),1,0,'C',0);
$pdf->Ln(10);

$pdf->Cell(190,10,utf8_decode('¿Tiene algún familiar o contacto cercano con infección confirmada a COVID-19 actualmente?'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode($dataPersonal->checkcovid),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode($dataPersonal->desccovid),1,0,'C',0);
$pdf->Ln(10);

$pdf->Cell(190,10,utf8_decode('En caso de mujeres en edad fértil(18 a 49 años): ¿Está embarazada o tiene sospecha de estarlo?'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode($dataPersonal->checkembarazo),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode($dataPersonal->descembarazo),1,0,'C',0);
$pdf->Ln(10);

$pdf->Cell(190,10,utf8_decode('¿Tiene antecedentes de alergía severe a alguna vacuna o medicamento?'),1,1,'C',0);
$pdf->Cell(30,10,utf8_decode($dataPersonal->checkalergia),1,0,'C',0);
$pdf->Cell(160,10,utf8_decode($dataPersonal->descalergia),1,0,'C',0);
$pdf->Ln(20);


$pdf->cell(60,10,utf8_decode($message),1,1,'C',0);
$pdf->Ln(4);
$pdf->Cell(60,0,utf8_decode('Condición'),0,0,'C',0);
$pdf->Ln(30);

$pdf->cell(60,1,'',1,1,'',0);
$pdf->Ln(3);
$pdf->Cell(60,0,'FIRMA O HUELLA',0,0,'C',0);

$pdf->Output();
