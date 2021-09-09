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


require(RUTA_APP . '/librerias/tecnickcom/tcpdf/examples/tcpdf_include.php');
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

$no_cuenta=$_SESSION['no_cuenta_convenio'];
$no_pagos=$_SESSION['num_pagos'];
$pago_total=$_SESSION['monto_ven_tot'];
$primer_pago=$_SESSION['primer_pago'];
$pago_pendiente=$_SESSION['p_pendiente'];
$id_cov= $_SESSION['no_cov_cobet'];
$pag_ven=$_SESSION['pag_vencidos'];

$pag_tot= $numletras->toString($pago_total,2,false);

$per_p= $numletras->toString($primer_pago,2,false);

$pag_p= $numletras->toString($pago_pendiente,2,false);




$db;
$this->db = new Base;
$this->db->query('select NO_CUENTA_USUARIO,NOMBRE_USUARIO,CALLE_USUARIO,COLONIA_USUARIO,MUNICIPIO_USUARIO,COD_POS_USUARIO,FECHA_SOLICITUD_USUARIO,FECHA_ALTA_USUARIO from dat_padron WHERE NO_CUENTA_USUARIO= "' . $no_cuenta . ' "');
$res = $this->db->registros();


// set font



// add a page
$pdf->AddPage();


$pdf->SetFont('Helvetica', 'B', 10);

$pdf->WriteHTML('
<div class="centrar">
  <!-- titulo h1 -->
  <h3 align="center">Convenio</h3>
  <!-- Parrafo -->
  <p style="text-align:justify">Convenio de pago de adeudo que celebran, por una parte: el 
  C.' . $res[0]->NOMBRE_USUARIO . ' , con domicilio ubicado en: ' . $res[0]->CALLE_USUARIO . ', Col. ' . $res[0]->COLONIA_USUARIO . ', 
  ' . $res[0]->MUNICIPIO_USUARIO . ', CP ' . $res[0]->COD_POS_USUARIO . ', a quien en lo sucesivo se le denominará “El usuario” y por 
  la otra parte la Comisión de Agua y Alcantarillado de Delicias Chihuahua, representada en este acto por el C. Pedro Pérez Pérez,
  en su carácter de representante legal a quien en lo sucesivo se le denominará “el organismo” y en 
  forma conjunta como “las partes”, quienes se sujetan al tenor de las declaraciones y clausulas siguientes: 
    </p>
    <p style="text-align:justify"> 
    1.	El usuario declara ser usuario del organismo desde el ' . $res[0]->FECHA_ALTA_USUARIO . ', con número de cuenta ' . $res[0]->NO_CUENTA_USUARIO . ' .
    </p>
    <p style="text-align:justify"> 
    2.	El usuario acepta que:
    Tiene un adeudo con el organismo de ' . $pag_ven . ' pagos vencidos con un importe $' . $pago_total . ' (' . $pag_tot . ' pesos 00/100 MN) 
    Hará un primer pago de $' . $primer_pago . ' (' . $per_p . ' pesos 00/100 M.N.) en la fecha de la firma del presente convenio.
      </p>
	<p style="text-align:justify"> 
	El adeudo pendiente después de haber realizado el primer pago es de $' . $pago_pendiente . ' (' . $pag_p . ' pesos 00/100 Mn)
	</p>
	<p style="text-align:justify"> 
	El adeudo pendiente será cubierto en ' . $no_pagos . ' parcialidades desglosándose de la siguiente manera:
	</p>
	
');



$pdf->Ln(4);



$this->db->query('select NO_PAGARE_COBDET,IMP_PAGARE_COBDET,FECHA_VENCIMIENTO_COBDET from dat_cob_detalle WHERE NO_CUENTA_COBDET= ' . $no_cuenta . ' and  NO_COV_COBDET =' . $id_cov . '');
$resultados = $this->db->registros();


$numItems = count($resultados);


if($numItems!=0)
{
	$html = '
<hr width = 100% >
<table class="table table-head-fixed text-nowrap" id="mytabla">
<thead>
	<tr >
		<th align ="left">No. Pagare</th>
		<th align ="left">Importe</th>
		<th align ="left">Fecha Vencimiento</th>
	</tr>
</thead>
<tbody id="tbl_ar">

</tbody>
</table>
<hr width = 100%  align ="center">




';

$pdf->writeHTML($html, true, false, true, false, '');
$tbl_header = '<table style="width: 638px;" cellspacing="0">';
			$tbl_footer = '</table>';
			$tbl = '';
			$numItems = count($resultados);
			$i = 0;
			foreach ($resultados as $arr1 => $dato) {
				$concepto = $dato->NO_PAGARE_COBDET;
				$imp_venc = $dato->IMP_PAGARE_COBDET;
				$imp_mes = $dato->FECHA_VENCIMIENTO_COBDET;
				$tbl .= '<tr>
					<td style="border: 1px solid #FFFFFF; width: 210px; text-align:left;">' . $concepto . '</td>
					<td style="border: 1px solid #FFFFFF; width: 210px; text-align:left;">$' . $imp_venc . '</td>
					<td style="border: 1px solid #FFFFFF; width: 100px; text-align:left;">' . $imp_mes . '</td>
				</tr>';
			
				if(++$i === $numItems) {
					$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
				  }
			}
}

$pdf->WriteHTML('
<p style="text-align:justify"> 
Para que el organismo reinstale el servicio de agua deberá liquidar los importes de reconexión.
</p>

<p style="text-align:justify"> 
3. El organismo declara ser el administrador de los servicios de agua y alcantarillado del 
municipio de Delicias, Chihuahua de acuerdo con lo establecido en el periódico oficial del 12 
de abril de 1980.</p>

<p style="text-align:justify"> 
4. El organismo reinstalará el servicio dentro de las próximas 48 horas una vez que el
 usuario halla cubierto el primer pago y el importe de la reinstalación.</p>


 <p style="text-align:justify"> 
 5. El presente convenio se firma el mismo día de su celebración.</p>


 <p style="text-align:left"> 
 Por el usuario: _____________________________________.
 </p>

 <p style="text-align:left"> 
 Por el organismo: ___________________________________.
 </p>

 

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
