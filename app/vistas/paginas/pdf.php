<?php

require(RUTA_APP.'/librerias/FPDF/fpdf.php');


$db;
$this->db = new Base;

$this->db->query('SELECT NOMBRE_USUARIO,DOMICILIO_USUARIO,anh_lectura,periodo_lectura,lectura_anterior_trn,lectura_tomada,consumo_trn,falla_1_trn,falla_2_trn,falla_3_trn,fecha_lectura_trn FROM dat_padron dat INNER JOIN trn_registro_lectura trn ON (dat.ID_COMP1=trn.no_comp7)WHERE dat.NO_CUENTA_USUARIO='.$_SESSION["no_cuenta"]).'';
$resultados= $this->db->registros();

foreach ($resultados as $arr => $dato) {
    
    $nombre = $dato->NOMBRE_USUARIO;
    $direccion = $dato->DOMICILIO_USUARIO;
    $anh_lectura = $dato->anh_lectura;
    $periodo_lectura = $dato->periodo_lectura;
    $lectura_anterior_trn = $dato->lectura_anterior_trn;
    $lectura_tomada = $dato->lectura_tomada;
    $falla_1_trn = $dato->falla_1_trn;
    $falla_2_trn = $dato->falla_2_trn;
    $falla_3_trn = $dato->falla_3_trn;
    $fecha_lectura_trn = $dato->fecha_lectura_trn;
}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image(RUTA_APP.'\librerias\FPDF\logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->SetXY(70, 15);
    $this->MultiCell(65, 5, utf8_decode('Brida System'), 0, 'C');
    $this->SetXY(70, 20);
    $this->MultiCell(65, 5, utf8_decode('Sistema Comercial'),0, 'C');
    $this->SetXY(70, 25);
    $this->MultiCell(65, 5, utf8_decode('Reporte Lecturas'), 0, 'C');
    // Line break
  
}

// Page footer
function Footer()
    {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Nombre", "Domicilio","Ejercicio","Periodo","Lectura Tomada");
$products = array(
	array($nombre,$direccion,$anh_lectura,$periodo_lectura,$lectura_tomada)
	
);
  $w = array(35, 35, 35, 35, 40);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,$row[0],1);
        $pdf->Cell($w[1],6,$row[1],1);
        $pdf->Cell($w[2],6,$row[2],1);
        $pdf->Cell($w[3],6,$row[3],1);
        $pdf->Cell($w[4],6,$row[4],1);

        $pdf->Ln();
        $total+=$row[3]*$row[2];

    }
$pdf->SetFont('Times','',12);
$pdf->AddPage();
$pdf->Output();
?>


