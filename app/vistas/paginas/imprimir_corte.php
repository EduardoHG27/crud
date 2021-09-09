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

require(RUTA_APP . '\librerias\numero-a-letras\src\NumeroALetras.php');




$numletras = new NumeroALetras();







$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 021');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE_1, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// set font




function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
	if (is_numeric($number)) { // a number
	  if (!$number) { // zero
		$money = ($cents == 2 ? '0.00' : '0'); // output zero
	  } else { // value
		if (floor($number) == $number) { // whole number
		  $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
		} else { // cents
		  $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
		} // integer or decimal
	  } // value
	  return '$'.$money;
	} // numeric
  } // formatMoney

// add a page
$pdf->AddPage();


$pdf->SetFont('Helvetica', 'B', 10);

$header = '
<div class="container">
			

                <div><strong>Pagos vencidos > = a : </strong>' . $_SESSION["pag_ven_cor"] . '</div>
                <div><strong>Importes > = a : </strong>'.$_SESSION["importe_cor"].'</div>
                <div><strong>Rutas de </strong>'. $_SESSION["tex_de_cor"].' a '. $_SESSION["tex_a_cor"].'</div>
				<hr width=100% align="center">
</div

';

$pdf->writeHTML($header);

$tbl_header = '
<br>
<br>

<table cellspacing="1">
<thead>
<tr>
  <th>No. Cuenta</th>
  <th>Nombre</th>
  <th></th>
  <th>Domicilio</th>
  <th>C.P.</th>
  <th>Ruta</th>
  <th>Pagos Vencidos</th>
  <th>Saldo Total</th>
</tr>
</thead>';
			$tbl_footer = '</table>';
			$tbl = '';
			$numItems = count($_SESSION['datos_cortes']);
			$i = 0;
			foreach ($_SESSION['datos_cortes'] as $arr1 => $dato) {
				$cuenta = $dato->NO_CUENTA_USUARIO;
				$nombre = $dato->NOMBRE_USUARIO;
				$dom = $dato->DOMICILIO_USUARIO;
				$cp = $dato->COD_POS_USUARIO;
				$ruta = $dato->ID_RUTA_LECTURA_USUARIO;
				$pag = $dato->PAGOS_VENCIDOS_FAC;
				$saldo = $dato->SALDO_TOT_FAC;
				$saldo_1=formatMoney($saldo, 1);

				$tbl .= '<tr>
					<td style="border: 1px solid #FFFFFF; width: 65px;  text-align:right;">' . $cuenta . '</td>
					<td style="border: 1px solid #FFFFFF; width: 270px; text-align:center;">' . $nombre . '</td>
					<td style="border: 1px solid #FFFFFF; width: 100px; text-align:left;">' . $dom . '</td>
					<td style="border: 1px solid #FFFFFF; width: 70px;  text-align:right;">' . $cp . '</td>
					<td style="border: 1px solid #FFFFFF; width: 110px; text-align:right;">' . $ruta . '</td>
					<td style="border: 1px solid #FFFFFF; width: 150px; text-align:right;">' . $pag . '</td>
					<td style="border: 1px solid #FFFFFF; width: 120px; text-align:right;">' . $saldo_1 . '</td>
				</tr>
				<hr width=100% align="center">';
			
				if(++$i === $numItems) {
					$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
				  }
			}








// DATOS FACTURA        





//$pdf->SetY(50);
//$pdf->Cell(0, 0, 'A6 test', 1, 1, 'C');

//$pdf->Cell(0, 12, 'DISPLAY PREFERENCES - PAGE 1', 1, 1, 'C');

// COLUMNAS

//$pdf->Output('example_021.pdf', 'I');
$pdf->Output('example_021.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
