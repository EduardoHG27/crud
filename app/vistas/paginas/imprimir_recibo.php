<?php

require(RUTA_APP.'/librerias/FPDF/fpdf.php');
$time = time();
$id=$_SESSION['id_fac_header'];

$db;


$this->db = new Base;
$this->db->query('select saldo_ven_fac,saldo_act_fac,saldo_tot_fac,no_cu from dat_fac_header WHERE no_recibo_fac= "' . $id . ' "');
$res = $this->db->registros();
$saldo_ven =$res[0]->saldo_ven_fac;
$saldo_act =$res[0]->saldo_act_fac;
$saldo_tot =$res[0]->saldo_tot_fac;
$cuenta =$res[0]->no_cu;


$this->db->query('select ID_CONCEPTO_DETFAC,DESC_CONCEPTO_DETFAC,IMP_VENCIDO_DETFAC,IMP_MES_DETFAC,IMP_TOT_DESFAC from dat_fac_detalle WHERE no_recibo_detfac= "' . $id . ' "');
$res_fac = $this->db->registros();

$num=count($res_fac);
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
$pdf->Cell(60,4,'Recibo_1',0,1,'C');
 
// DATOS FACTURA        
$pdf->Ln(6);
//$pdf->Cell(60,4,'Folio: '.$_SESSION['folio'],0,1,'');
//$pdf->Cell(60,4,'Fecha: '.date("d-m-Y ", $time),0,1,'');
//$pdf->Cell(60,4,'Caja: '.$_SESSION["caja"],0,1,'');
//$pdf->Cell(60,4,'Cajero: '.$_SESSION["cajero"],0,1,'');
$pdf->Cell(60,4,'Folio actual: '.$id,0,1,'');
$pdf->Cell(60,4,'Cuenta: '.$cuenta,0,1,'');




// COLUMNAS
$pdf->Ln(7);
$pdf->Cell(60,4,'Desglose',0,1,'C');
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(30, 10, 'Concepto', 0);
$pdf->Cell(5, 10, 'Vencido',0,0,'R');
$pdf->Cell(10, 10, 'Actual',0,0,'R');
$pdf->Cell(15, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(1);
$pdf->SetFont('Helvetica', '', 7);
// PRODUCTOS
$numero=0;
$vencido=0;
$mes=0;
for ($i = 1; $i <= $num; $i++) {

    $pdf->MultiCell(30,4,$res_fac[$numero]->ID_CONCEPTO_DETFAC,0,'L'); 
$pdf->Cell(35, -5,"$".$res_fac[$numero]->IMP_VENCIDO_DETFAC,0,0,'R');
$pdf->Cell(10, -5,"$".$res_fac[$numero]->IMP_MES_DETFAC,0,0,'R');
$pdf->Cell(15, -5,"$".$res_fac[$numero]->IMP_TOT_DESFAC,0,0,'R');
$pdf->Ln(1);


$ven=$res_fac[$numero]->IMP_VENCIDO_DETFAC;
$int = (float)$ven;

$m=$res_fac[$numero]->IMP_MES_DETFAC;
$int_1 = (float)$m;

$vencido = round($int+$vencido,2);
$mes = round($int_1+$mes,2);

$numero++;
}
$pdf->Cell(60,0,'','T');
$pdf->Ln(7);
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(30, 10, 'Concepto', 0);
$pdf->Cell(5, 10, 'Vencido',0,0,'R');
$pdf->Cell(10, 10, 'Actual',0,0,'R');
$pdf->Cell(15, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(1);
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetFont('Helvetica', '', 7);
$pdf->MultiCell(30,4,'Pago',0,'L'); 
$pdf->Cell(35, -5,"$".$vencido,0,0,'R');
$pdf->Cell(10, -5,"$".$mes,0,0,'R');
$pdf->Cell(15, -5,"$".$saldo_tot,0,0,'R');
$pdf->Ln(0);




// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->Ln(0);
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
 
$pdf->Output('ticket'.$id.'.pdf','D');
$pdf->Output();

    
?>
