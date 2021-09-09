<?php

require(RUTA_APP.'/librerias/FPDF/fpdf.php');
$time = time();

// CONFIGURACIÓN PREVIA


$pdf = new FPDF('P','mm',array(80,150)); // Tamaño tickt 80mm x 150 mm (largo aprox)
define('EURO',chr(36)); // Constante con el símbolo Euro.
$pdf->AddPage();
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,4,'Brida System',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'Comision de Agua y Alcantarillado',0,1,'C');
$pdf->Cell(60,4,'Sistema Comercial',0,1,'C');
$pdf->Cell(60,4,'C.P.: 28028 Madrid (Madrid)',0,1,'C');
$pdf->Cell(60,4,'999 888 777',0,1,'C');
 
// DATOS FACTURA        
$pdf->Ln(6);
$pdf->Cell(60,4,'Folio: '.$_SESSION['folio'],0,1,'');
$pdf->Cell(60,4,'Fecha: '.date("d-m-Y ", $time),0,1,'');
$pdf->Cell(60,4,'Caja: '.$_SESSION["caja"],0,1,'');
$pdf->Cell(60,4,'Cajero: '.$_SESSION["cajero"],0,1,'');
$pdf->Cell(60,4,'Cajero: '.$_SESSION["qqq"],0,1,'');
$pdf->Cell(60,4,'Cajero: '.$_SESSION["hhh"],0,1,'');





// COLUMNAS
$pdf->Ln(7);
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(30, 10, 'Concepto', 0);
$pdf->Cell(5, 10, 'Ud',0,0,'R');
$pdf->Cell(10, 10, 'Precio',0,0,'R');
$pdf->Cell(15, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(0);
 
// PRODUCTOS

$pdf->SetFont('Helvetica', '', 7);
for ($i = 1; $i <= 3; $i++) {
    $pdf->MultiCell(30,4,'anzana golden 1KMg',0,'L'); 
$pdf->Cell(35, -5, '2',0,0,'R');
$pdf->Cell(10, -5, number_format(round(3,2), 2, ',', ' ').EURO,0,0,'R');
$pdf->Cell(15, -5, number_format(round(2*3,2), 2, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);
}



// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->Ln(6);
$pdf->Cell(60,0,'','T');
$pdf->Ln(2);    
$pdf->Cell(25, 10, 'TOTAL SIN I.V.A.', 0);    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, number_format(round((round(12.25,2)/1.21),2), 2, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);    
$pdf->Cell(25, 10, 'I.V.A. 21%', 0);    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, number_format(round((round(12.25,2)),2)-round((round(2*3,2)/1.21),2), 2, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);    
$pdf->Cell(25, 10, 'TOTAL', 0);    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, number_format(round(12.25,2), 2, ',', ' ').EURO,0,0,'R');
 
// PIE DE PAGINA
$pdf->Ln(10);
$pdf->Cell(60,0,'EL PERIODO DE DEVOLUCIONES',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(60,0,'CADUCA EL DIA  01/11/2019',0,1,'C');
 
$pdf->Output('ticket.pdf','i');
$pdf->Output();

    
?>
