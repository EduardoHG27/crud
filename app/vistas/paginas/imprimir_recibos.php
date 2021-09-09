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
require(RUTA_APP . '\librerias\vendor\autoload.php');






/**
 * TCPDF class extension with custom header and footer for TOC page
 */
class TOC_TCPDF extends TCPDF
{

	/**
	 * Overwrite Header() method.
	 * @public
	 */
	public function Header()
	{
		
		if ($this->tocpage) {
			// *** replace the following parent::Header() with your code for TOC page
			parent::Header();
		} else {
			// *** replace the following parent::Header() with your code for normal pages
			parent::Header();
		}
	}

	/**
	 * Overwrite Footer() method.
	 * @public
	 */
	public function Footer()
	{
		if ($this->tocpage) {
			// *** replace the following parent::Footer() with your code for TOC page
			parent::Footer();
		} else {
			// *** replace the following parent::Footer() with your code for normal pages
			parent::Footer();
		}
	}
} // end of class

// create new PDF document
$pdf = new TOC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);


// set default header data

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


// set font
$pdf->SetFont('helvetica', '', 10);

// ---------------------------------------------------------

// create some content ...

// X|X| a page





$hola = $_SESSION['kkj'];
$num1 = count($hola);



for ($i = 0; $i < $num1; $i++) {
	$pdf->AddPage();
	$pdf->Bookmark('Chapter ' . $i, 0, 0, '', 'B', array(0, 64, 128));
	$pdf->Cell(0, 10, 'Chapter' . $i, 0, 1, 'L');
	$pdf->Cell(0, 10, $hola[$i]->NOMBRE_USUARIO, 0, 1, 'L');
	$pdf->Cell(0, 10, $hola[$i]->DOMICILIO_USUARIO, 0, 1, 'L');
	$pdf->Cell(0, 10, $hola[$i]->ID_RUTA_LECTURA_USUARIO, 0, 1, 'L');
	$pdf->Cell(0, 10, $hola[$i]->FOLIO_LECTURA_USUARIO, 0, 1, 'L');

	
$db;
$this->db = new Base;

$this->db->query('select DESC_CONCEPTO_FAC_DETDET,IMP_VENCIDO_DETDET,IMP_MES_DETDET,IMP_TOT_DETDET FROM dat_detalle_detalle WHERE no_cuenta_detdet=' . $hola[$i]->NO_CUENTA_USUARIO . '');
$resultados = $this->db->registros();

$numItems = count($resultados);


if($numItems!=0)
{
	$html = '
<hr width = 100% >
<table class="table table-head-fixed text-nowrap" id="mytabla">
<thead>
	<tr >
		<th align ="center">Concepto</th>
		<th align ="right">Importe Mensual</th>
		<th align ="right">Importe Vencido</th>
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
			$tbl_footer = '</table>';
			$tbl = '';
			$numItems = count($resultados);
			$i = 0;
			foreach ($resultados as $arr1 => $dato) {
				$concepto = $dato->DESC_CONCEPTO_FAC_DETDET;
				$imp_venc = $dato->IMP_VENCIDO_DETDET;
				$imp_mes = $dato->IMP_MES_DETDET;
				$imp_total = $dato->IMP_TOT_DETDET;

				$tbl .= '<tr>
					<td style="border: 1px solid #FFFFFF; width: 114px; text-align:right;">' . $concepto . '</td>
					<td style="border: 1px solid #FFFFFF; width: 210px; text-align:right;">$' . $imp_venc . '</td>
					<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $imp_mes . '</td>
					<td style="border: 1px solid #FFFFFF; width: 160px; text-align:right;">$' . $imp_total . '</td>
				</tr>';
			
				if(++$i === $numItems) {
					$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
				  }
			}
}


$html = '';

$params = $pdf->serializeTCPDFtagParameters(array($hola[$i]->NO_CUENTA_USUARIO, 'C39', '', '', 80, 30, 0.4, array('position'=>'S', 'border'=>true, 'padding'=>4, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4), 'N'));
$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';

$pdf->writeHTML($html, true, 0, true, 0);


}
// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content





// test some inline CSS

// add some pages and bookmarks




// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .


// add a new page for TOC


// write the TOC title and/or other elements on the TOC page

// define styles for various bookmark levels
$bookmark_templates = array();

/*
 * The key of the $bookmark_templates array represent the bookmark level (from 0 to n).
 * The following templates will be replaced with proper content:
 *     #TOC_DESCRIPTION#    this will be replaced with the bookmark description;
 *     #TOC_PAGE_NUMBER#    this will be replaced with page number.
 *
 * NOTES:
 *     If you want to align the page number on the right you have to use a monospaced font like courier, otherwise you can left align using any font type.
 *     The following is just an example, you can get various styles by combining various HTML elements.
 */

// A monospaced font for the page number is mandatory to get the right alignment
$bookmark_templates[0] = '<table border="0" cellpadding="0" cellspacing="0" style="background-color:#EEFAFF"><tr><td width="155mm"><span style="font-family:times;font-weight:bold;font-size:12pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:12pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[1] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="5mm">&nbsp;</td><td width="150mm"><span style="font-family:times;font-size:11pt;color:green;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:11pt;color:green;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[2] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="10mm">&nbsp;</td><td width="145mm"><span style="font-family:times;font-size:10pt;color:#666666;"><i>#TOC_DESCRIPTION#</i></span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:10pt;color:#666666;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
// add other bookmark level templates here ...

// add table of content at page 1
// (check the example n. 45 for a text-only TOC


// end of TOC page
$pdf->endTOCPage();

// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Archivo.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
