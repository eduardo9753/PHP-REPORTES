<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Parzibyte') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');
 
// INFORMACION DE FILAS
$documento->setActiveSheetIndex(0)
->setCellValue('A1', 'DNI')
->setCellValue('B1', 'NOMBRE')
->setCellValue('C1', 'PRIMER APELLIDO')
->setCellValue('D1', 'SEGUNDO APELLIDO')
->setCellValue('E1', 'FECHA NACIMIENTO')
->setCellValue('F1', 'ACTIVIDAD')
->setCellValue('G1', 'PROFESION')
->setCellValue('H1', 'ESTADO')
->setCellValue('I1', 'FECHA DE VACUNACION')
->setCellValue('J1', 'CODIGO PLANILLA')
->setCellValue('K1', 'NOMBRE PLANILLA')
->setCellValue('L1', 'TELEFONO');


//DATOS DE LAS FILAS
$i = 2; //imprime en 2 fila
foreach ($dataExcel as $data) :
    $documento->setActiveSheetIndex(0)
    ->setCellValue("A$i", $data->idDNI)
    ->setCellValue("B$i", $data->nombre)
    ->setCellValue("C$i", $data->apellidoPaterno)
    ->setCellValue("D$i", $data->apellidoMaterno)
    ->setCellValue("E$i", $data->fecha)
    ->setCellValue("F$i", $data->actividad)
    ->setCellValue("G$i", $data->profesion)
    ->setCellValue("H$i", $data->estado)
    ->setCellValue("I$i", $data->fechaRegistro)
    ->setCellValue("J$i", $data->id_planilla)
    ->setCellValue("K$i", $data->nombre_planilla)
    ->setCellValue("L$i", $data->telefono);
    $i++;
endforeach;


$nombreDelDocumento = "datos.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;