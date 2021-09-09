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


 $brigada= $_SESSION['brigada'];
 $folio= $_SESSION['folio_bri'];

 $db;
$this->db = new Base;
$this->db->query('select * from dat_quejas WHERE folio_queja= "' . $folio . ' "');
$res = $this->db->registros();


$this->db->query('select * from cat_quejas WHERE id_queja= "' . $res[0]->id_queja_q . ' "');
$queja = $this->db->registros();

$this->db->query('select * from dat_padron WHERE no_cuenta_usuario= "' . $res[0]->no_cuenta_q . ' "');
$usuario = $this->db->registros();

$this->db->query('select * from cat_brigada WHERE id_brigada= "' . $brigada. ' "');
$bri = $this->db->registros();

// add a page
$pdf->AddPage();


$pdf->SetFont('Helvetica', 'B', 10);

$pdf->WriteHTML('
<div class="centrar">
  <!-- titulo h1 -->
  <h3 align="center">QUEJA</h3>
  <!-- Parrafo -->

  <div class="row">
	<div="col-12">
  		
	</div>
	<div="col-12">
		Representante de ' . $bri[0]->desc_brigada . '
	</div>
	<div="col-12">
		Favor de atender: ' . $queja[0]->desc_queja. '
	</div>
	<div="col-12">
		Descripción: ' . $res[0]->desc_q. '
	</div>
	<div="col-12">
		Nombre:' . $usuario[0]->NOMBRE_USUARIO . '
	</div>
	<div="col-12">
		Domicilio:' . $usuario[0]->DOMICILIO_USUARIO . '
	</div>
	<div="col-12">
		Telefono:' . $usuario[0]->TELEFONO1_USUARIO . '
	</div>
 
</div>
	<hr width=100% >

	SEGUIMIENTO
</div>
');





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
