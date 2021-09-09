<?php
//============================================================+
// File name   : example_059.php
// Begin       : 2010-05-06
// Last Update : 2013-05-14
//
// Description : Example 059 for TCPDF class
//               Table Of Content using HTML templates.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Table Of Content using HTML templates.
 * @author Nicola Asuni
 * @since 2010-05-06
 */

// Include the main TCPDF library (search for installation path).
require(RUTA_APP . '\librerias\tecnickcom\tcpdf\examples\tcpdf_include.php');
require(RUTA_APP . '\librerias\tecnickcom\tcpdf\tcpdf.php');
require(RUTA_APP . '\librerias\FPDF_1\fpdf.php');







$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 021');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE_1, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$datos=$_SESSION['datos_pago_con'];
$tipo=$_SESSION['tipo'];
$cuenta=$_SESSION['cuenta_pag_con'];
$importe=$_SESSION['importe_pag_con'];
$recibo=$_SESSION['recibo_pag_con'];
$concepto=$_SESSION['concepto'];
// add a page
$pdf->AddPage();


$pdf->SetFont('Helvetica','B',10);

$pdf->Cell(35,10,'Nota Recibo',0,1,'C');

$html_1 = '


';
if($tipo=='S')
{
	$pdf->WriteHTML('
	<div>
	
	<table>
	
	<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Nombre:</td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->NOMBRE_SOL . '</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">No. Solicitud:</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">' . $cuenta . '</td>
	</tr>
	
	<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Domicilio:</td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->DOMICILIO_SOL . '</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Tipo:</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">FAC</td>
	</tr>
	
	<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Colonia:</td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->COLONIA_SOL . '</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Folio:</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">' . $recibo . '</td>
	</tr>
	
	<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Calle:</td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->CALLE_SOL . '</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;"></td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;"></td>
	</tr>
	</table>
	</div>
	
	
	
	');
	
	
	
	$pdf->writeHTML($html_1, true, false, true, false, '');
	$pdf->Ln(6);
	
	
	
	$html = '
	<hr width = 100% >
	<table class="table table-head-fixed text-nowrap" id="mytabla">
	<thead>
		<tr >
			<th align ="center">Concepto</th>
			<th align ="right"></th>
			<th align ="right"></th>
			<th align ="right">Total</th>
	
	
	
	
		</tr>
	</thead>
	<tbody id="tbl_ar">
	
	</tbody>
	</table>
	<hr width = 100%  align ="center">
	
	
	
	
	';
	
	
	$pdf->writeHTML($html, true, false, true, false, '');
	
	$tbl_header = '<table style="width: 638px;" cellspacing="0">';
	
	$tbl = '<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:right;">'.$concepto.'</td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:right;"></td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;"></td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $importe . '</td>
	<hr width = 100%  align ="center">
	</tr>';
	
	
	
	
	
	
	$tbl_5 = '<tr>
	<td style="border: 1px solid #FFFFFF; width: 114px; text-align:right;"></td>
	<td style="border: 1px solid #FFFFFF; width: 210px; text-align:right;"></td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Total</td>
	<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $importe . '</td>
	</tr>';
	
	$pdf->writeHTML($tbl_header . $tbl . $tbl_5, true, false, false, false, '');
}
else

{

	$pdf->WriteHTML('
<div>

<table>

<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Nombre:</td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->NOMBRE_USUARIO . '</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">No. Solicitud:</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">' . $cuenta . '</td>
</tr>

<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Domicilio:</td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">Calle 123</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Tipo:</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">FAC</td>
</tr>

<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Colonia:</td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->COMOLOCAL_USUARIO . '</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Folio:</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;">' . $recibo . '</td>
</tr>

<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:lefht;">Calle:</td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:lefht;">' . $datos[0]->CALLE_USUARIO . '</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;"></td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:lefht;"></td>
</tr>
</table>
</div>



');



$pdf->writeHTML($html_1, true, false, true, false, '');
$pdf->Ln(6);



$html = '
<hr width = 100% >
<table class="table table-head-fixed text-nowrap" id="mytabla">
<thead>
	<tr >
		<th align ="center">Concepto</th>
		<th align ="right"></th>
		<th align ="right"></th>
		<th align ="right">Total</th>




	</tr>
</thead>
<tbody id="tbl_ar">

</tbody>
</table>
<hr width = 100%  align ="center">




';


$pdf->writeHTML($html, true, false, true, false, '');

$tbl_header = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:right;">'.$concepto.'</td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:right;"></td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;"></td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $importe . '</td>
<hr width = 100%  align ="center">
</tr>';






$tbl_5 = '<tr>
<td style="border: 1px solid #FFFFFF; width: 114px; text-align:right;"></td>
<td style="border: 1px solid #FFFFFF; width: 210px; text-align:right;"></td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">Total</td>
<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $importe . '</td>
</tr>';

$pdf->writeHTML($tbl_header . $tbl . $tbl_5, true, false, false, false, '');
}


// DATOS FACTURA        





//$pdf->SetY(50);
//$pdf->Cell(0, 0, 'A6 test', 1, 1, 'C');

//$pdf->Cell(0, 12, 'DISPLAY PREFERENCES - PAGE 1', 1, 1, 'C');

// COLUMNAS

//$pdf->Output('example_021.pdf', 'I');
 $pdf->Output('tkt.pdf', 'D');
