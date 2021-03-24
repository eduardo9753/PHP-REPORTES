<?php
//require('pdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('public/img/minsa.png', 10, 8, 22);
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 15);  // Arial bold 13
        $this->Cell(98); // Movernos a la derecha
        $this->Cell(-1, 0, utf8_decode(''), 0, 0, 'C', 0); // Título
        $this->Ln(5); // Salto de línea
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(255, 0, 0);


//ANEXO 02 CABECERA
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95);
$pdf->Cell(-1, 0, utf8_decode('ANEXO 02'), 0, 0, 'C', 0);
$pdf->Ln(8);

$pdf->Cell(95);
$pdf->Cell(-1, 0, utf8_decode('Formato de Consentimiento Informado para la Vacunación contra COVID-19'), 0, 0, 'C', 0);
$pdf->Ln(8);

$pdf->Cell(95);
$pdf->Cell(-1, 0, utf8_decode('HOJA INFORMATIVA SOBRE LA VACUNA CONTRA LA COVID-19(LABORATARIO SINOPHARM)'), 0, 0, 'C', 0);
$pdf->Ln(8);



//PRIMER PARRAFO
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(95);
$pdf->Cell(-1, 0, utf8_decode('El Institute de Productos Biológicos de Beijing crea una vacuna inactivada (virus muerto) contra el'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94.8);
$pdf->Cell(-1, 0, utf8_decode('covid-19, los ensayos clinicos son desarrollados por la empresa estatal china Sinopharm. Con una'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(93);
$pdf->Cell(-1, 0, utf8_decode('eficacia del 79,34 %, es aprobada por el gobierno chino. Siendo una vacuna eficaz y segura para'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94.5);
$pdf->Cell(-1, 0, utf8_decode('proteger a la poblacien esta pendiente la publicaciOn de  los resultados de fase 3. Los estudios de'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94.4);
$pdf->Cell(-1, 0, utf8_decode('fase 1- 2 mostró que la vacuna no cause ningun efecto secundario grave y permitir a las personas'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94);
$pdf->Cell(-1, 0, utf8_decode('producir anticuerpos contra el coronavirus. En julio del 2020, comenze un ensayo de fase 3 en los'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(93.4);
$pdf->Cell(-1, 0, utf8_decode('Emiratos Arabes Unidos, en Agosto del 2020 en Peru y en Marruecos. En el pais los estudios han'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(91.5);
$pdf->Cell(-1, 0, utf8_decode('sido desarrollados por la Universidad Nacional Mayor de San Marcos y la Universidad Peruana'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(52.4);
$pdf->Cell(-1, 0, utf8_decode('Cayetano Heredia con 12,000 participantes.'), 0, 0, 'C', 0);
$pdf->Ln(7);




//SEGUNDO PARRAFO
$pdf->Cell(96);
$pdf->Cell(-1, 0, utf8_decode('Es necesaria para lograr una adecuada protección la colocacion de dos dosis, la segunda se coloca'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(91.5);
$pdf->Cell(-1, 0, utf8_decode('21 dias despues de la primera. Los "Daises que actualmente vienen recibiendo la vacuna son: '), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94);
$pdf->Cell(-1, 0, utf8_decode('China, Los Emiratos Arabes Unidos, Bahrein, Egipto y Jordania. Se estima que en China mas de 1'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(47.5);
$pdf->Cell(-1, 0, utf8_decode('million de personas ya la recibieron.'), 0, 0, 'C', 0);
$pdf->Ln(7);




//TERCER PARRAFO
$pdf->Cell(85.5);
$pdf->Cell(-1, 0, utf8_decode('La vacuna contra la SARS-CoV-2	(Vero Cell), inactivada esta formulada con la cepa del'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(91);
$pdf->Cell(-1, 0, utf8_decode('SARSCoV-2 que es inoculada en las celulas vero para cultivo, cosecha del virus, inactivacion-'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(94.5);
$pdf->Cell(-1, 0, utf8_decode('Bpropiolactona, concentration y purification. Luego, es absorbida con adyuvante de aluminio para'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(93);
$pdf->Cell(-1, 0, utf8_decode('forrnar la vacuna I iquida. Los adyuvantes estimulan el sistema innnunologico para estimular su'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(95.5);
$pdf->Cell(-1, 0, utf8_decode('respuesta a una vacuna. Los virus inactivados se han utilizado durante mas de un siglo. Jonas Salk'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(90.5);
$pdf->Cell(-1, 0, utf8_decode('los utilize para crear su vacuna contra la polio en la decada de 1950, y son las bases para las'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(89);
$pdf->Cell(-1, 0, utf8_decode('vacunas contra otras enfermedades, incluyendo la rabia y la hepatitis A. Esta vacuna es de'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(65.8);
$pdf->Cell(-1, 0, utf8_decode('colocacion intramuscular en el hombro (musculo deltoides).'), 0, 0, 'C', 0);
$pdf->Ln(7);



//CUARTO PARRAFO
$pdf->Cell(85.8);
$pdf->Cell(-1, 0, utf8_decode('Todavia no se puede establecer la duration de la protección. Es posible que el nivel de'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(88.2);
$pdf->Cell(-1, 0, utf8_decode('anticuerpos disminuya en el transcurso de mesas. Pero el sistema inmunológico tambien'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(89.5);
$pdf->Cell(-1, 0, utf8_decode('contiene celulas especiales Ilamadas celulas B de memoria que pueden retener informatión'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(61);
$pdf->Cell(-1, 0, utf8_decode('sobre el coronavirus durante anos o incluso decadas.'), 0, 0, 'C', 0);
$pdf->Ln(6);


//QUINTA PAGINA
$pdf->Cell(67);
$pdf->Cell(-1, 0, utf8_decode('Los efectos secundarios presentados por los vacunados son:'), 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(72.8);
$pdf->Cell(-1, 0, utf8_decode('(1) Muy comun (> 10%): dolor en el lugar donde se aplico la inyección'), 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(85.8);
$pdf->Cell(-1, 0, utf8_decode('(2) Comun (1%  10%): fiebre temporal, fatiga, dolor de cabeza,  diarrea, enrojecimiento,'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(84.2);
$pdf->Cell(-1, 0, utf8_decode('hinchazOn, picazon y endurecimiento en el lugar donde se aplico la inyección'), 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(93.3);
$pdf->Cell(-1, 0, utf8_decode('(3) Raro (<1%): Sarpullido de la piel en el lugar donde se aplico la inyeccion; nauseas y vornitos,'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(95.1);
$pdf->Cell(-1, 0, utf8_decode('picazón en el lugar donde no se aplico la inyección, dolor muscular, artralgia, somnolencia,'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(32);
$pdf->Cell(-1, 0, utf8_decode('mareos.'), 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(80.4);
$pdf->Cell(-1, 0, utf8_decode('(4) Serias: no se han obsery ado reacciones serias, con relación a esta vacuna.'), 0, 0, 'C', 0);
$pdf->Ln(6);



//SEXTO PARRAFO
$pdf->Cell(92);
$pdf->Cell(-1, 0, utf8_decode('Generalmente las reacciones se resuelven en las primeras 	48 a 	72 horas posterior a la '), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(92);
$pdf->Cell(-1, 0, utf8_decode('vacunación. Posterior a la vacunación ud. se quedara 30 minutos en observación, para '), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(45.5);
$pdf->Cell(-1, 0, utf8_decode('posteriormente retirarse.'), 0, 0, 'C', 0);
$pdf->Ln(9);



//SEPTIMO PARROFO 
$pdf->Cell(91.5);
$pdf->Cell(-1, 0, utf8_decode('Los efectos secundarios presentados por los vacunados principalmente son en el lugar de Ia'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(89);
$pdf->Cell(-1, 0, utf8_decode('aplicacion de la vacuna como: dolor, ligera hinchazón, enrojecimiento. Asi mismo, se han'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(90.1);
$pdf->Cell(-1, 0, utf8_decode('reportado algunas reacciones sisternicas como dolor de cabeza, malestar general, dolores'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(88.4);
$pdf->Cell(-1, 0, utf8_decode('musculares o cansancio. Dichas reacciones se resuelven o pasan entre 48 a 72 horas de'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(29);
$pdf->Cell(-1, 0, utf8_decode('vacunado'), 0, 0, 'C', 0);
$pdf->Ln(8);


//OCTAVO PARRAFO
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(91);
$pdf->Cell(-1, 0, utf8_decode('Recomendaciones: En caso presentara molestia, debe acercarse inmediatamente al'), 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(72);
$pdf->Cell(-1, 0, utf8_decode('establecimiento de saiud mas cercano para ser evaluado (a).'), 0, 0, 'C', 0);
$pdf->Ln(21);





//CONSENTIMIENTO PARA LA VACUNACIÓN HOJA 2 JALAR DATOS DE LA BASE DE DATOS
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(100);
$pdf->Cell(-1, 0, 'EXPRESION DE CONSENTIMIENTO INFORMADO', 0, 0, 'C', 0);
$pdf->Ln(10);


$pdf->Cell(63.1);
$pdf->Cell(-1, 0, 'Fecha: ....... de ............ del 2021 Hora: ......................', 0, 0, 'C', 0);
$pdf->Ln(12);


$pdf->Cell(22);
$pdf->Cell(-1, 0, utf8_decode('YO: '), 1, 0, 'C', 1);
$pdf->Ln(0); //altura del "YO:"
$pdf->Cell(85);
$pdf->Cell(-1, 0, utf8_decode($dataPersonal->nombre . " " . $dataPersonal->apellidoPaterno . " " . $dataPersonal->apellidoMaterno . " con DNI: " . $dataPersonal->idDNI), 1, 0, 'C', 1);
$pdf->Ln(6);
$pdf->Cell(83);
$pdf->Cell(-1, 0, ', declaro haver sido informado (a) de los beneficios y los potenciales efectos', 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(88);
$pdf->Cell(-1, 0, 'adversos de la Vacuna contra la COVID 19 y resueltas todas las preguntas y dudas', 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(87.4);
$pdf->Cell(-1, 0, 'al respecto, conciente de mis derechos y en forma voluntaria, en cumplimiento de', 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(58);
$pdf->Cell(-1, 0, 'de la Resolucion Ministerial Nr:848-2020/MINSA', 0, 0, 'C', 0);
$pdf->Ln(15);


$pdf->Cell(90.4);
$pdf->Cell(-1, 0, 'SI(  ) NO(  ) doy consentimiento para que el personal de salud, me apliquen la vacuna', 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(35.4);
$pdf->Cell(-1, 0, 'contra el COVID 19.', 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(72.4);
$pdf->Cell(-1, 0, utf8_decode('SI(  ) NO(  ) Tengo comorbilidades que priorizan mi vacunación.'), 0, 0, 'C', 0);
$pdf->Ln(6);
$pdf->Cell(76);
$pdf->Cell(-1, 0, utf8_decode('SI(  ) NO(  ) Tengo comorbilidades que contraindican la vacunación.'), 0, 0, 'C', 0);
$pdf->Ln(35);


//FIRMAS DEL CLIENTE ACCEDIENDO A LA VACUNA
$pdf->Cell(20);   //posicion a la izquierda
$pdf->cell(60, 0, '', 1, 1, '', 0);//linea
$pdf->Ln(4);      //salto de linea
$pdf->Cell(20);   //posicion a la izquierda
$pdf->Cell(60, 0, 'Firma o huella digital del paciente', 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(9.1);  //posicion a la izquierda
$pdf->Cell(60, 0, 'o representante legal', 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(18.4);
$pdf->Cell(60, 0, utf8_decode('DNI N°______________________'), 0, 0, 'C', 0);

//subiendo la siguiente firma
$pdf->Ln(-12.2);    //salto de linea negativa
$pdf->Cell(120);    //posicion a la rerecha
$pdf->cell(60,0,'',1,1,'',0);//linea
$pdf->Ln(4);       
$pdf->Cell(120);   
$pdf->Cell(60,0,'Firma o huella digital del paciente',0,0,'C',0);
$pdf->Ln(4);        
$pdf->Cell(109.4);  
$pdf->Cell(60, 0, 'o representante legal', 0, 0, 'C', 0);
$pdf->Ln(4);        
$pdf->Cell(118.6); 
$pdf->Cell(60, 0, utf8_decode('DNI N°______________________'), 0, 0, 'C', 0);

$pdf->Ln(20);       //salto de linea
$pdf->Cell(70);
$pdf->Cell(60,0,'REVOCATORIO / DESISTIMIENTO DEL CONSENTIMIENTO',0,0,'C',0);
$pdf->Ln(16);

$pdf->Cell(17);
$pdf->Cell(60,0,'Fecha.......de.................del 2021',0,0,'C',0);
$pdf->Ln(0);
$pdf->Cell(90);
$pdf->Cell(120,0,'Hora:............................',0,0,'C',0);
$pdf->Ln(30);


//FIRMAS REVOCATORIAS A LA VACUNA
$pdf->Cell(20);   //posicion
$pdf->cell(60, 0, '', 1, 1, '', 0);//linea
$pdf->Ln(4);      //salto de linea
$pdf->Cell(20);
$pdf->Cell(60, 0, 'Firma o huella digital del paciente', 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(9.1);
$pdf->Cell(60, 0, 'o representante legal', 0, 0, 'C', 0);
$pdf->Ln(4);
$pdf->Cell(18.4);
$pdf->Cell(60, 0, utf8_decode('DNI N°______________________'), 0, 0, 'C', 0);

//subiendo la siguiente firma
$pdf->Ln(-12.2);
$pdf->Cell(120); 
$pdf->cell(60,0,'',1,1,'',0);//linea
$pdf->Ln(4);     
$pdf->Cell(120);  
$pdf->Cell(60,0,'Firma o huella digital del paciente',0,0,'C',0);
$pdf->Ln(4);        //salto de linea
$pdf->Cell(109.4);  //posicion
$pdf->Cell(60, 0, 'o representante legal', 0, 0, 'C', 0);
$pdf->Ln(4);        //salto de linea
$pdf->Cell(118.6);  //posicion
$pdf->Cell(60, 0, utf8_decode('DNI N°______________________'), 0, 0, 'C', 0);


$pdf->Output();
