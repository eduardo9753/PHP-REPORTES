<?php
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Datos en Excel");

// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'DNI')
->setCellValue('B1', 'NOMBRE')
->setCellValue('C1', 'PRIMER APELLIDO')
->setCellValue('D1', 'SEGUNDO APELLIDO')
->setCellValue('E1', 'FECHA NACIMIENTO')
->setCellValue('F1', 'ACTIVIDAD')
->setCellValue('G1', 'PROFESION')
->setCellValue('H1', 'ESTADO')
->setCellValue('I1', 'FECHA DE REGISTRO')
->setCellValue('J1', 'CODIGO PLANILLA')
->setCellValue('K1', 'NOMBRE PLANILLA')
->setCellValue('L1', 'TELEFONO');


//Datos de la BD
$i = 2; //imprime en 2 fila
foreach ($dataExcel as $data) :
    $objPHPExcel->setActiveSheetIndex(0)
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


// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);


// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Datos.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
