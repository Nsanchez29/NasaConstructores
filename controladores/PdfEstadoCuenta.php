<?php

require('../fpdf/fpdf.php');
include '../modelos/conexion.php';

$IdUsuario = $_POST['idUs'];
$nombreUser = $_POST['nomUs'];


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logo2.jpg',37,20,40);
    // Tipo Documento
    $this->Image('../img/estadocuenta.png',95,32,80);
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    $this->Ln(60);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $nombre = "SISTEMA NASA CONSTRUCTORES";
    $generado = "Generado por: ".$nombre;
    $this->Cell(0,2, utf8_decode($generado),0,0,'');
    // Número de página
    $this->Cell(1,4, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetX(80);
$pdf->Cell(40,10,utf8_decode('EGRESOS'),0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);


  $qegresos = "SELECT e.fecha as fecha, p.nombre as proyecto, e.descripcion as descripcion, e.monto as monto
  FROM egreso e
  INNER JOIN proyecto as p on p.id_proyecto = e.proyecto
  WHERE e.id_usuario = $IdUsuario
  AND e.estado = 1";
  $resultado = mysqli_query($conexion,$qegresos);

  while($row = mysqli_fetch_assoc($resultado)){
        $pdf->Cell(20,10, $row['fecha'], 1,0,'C',0);
        $pdf->Cell(70,10, $row['proyecto'], 1,0,'C',0);
        $pdf->Cell(60,10, $row['descripcion'], 1,0,'C',0);
        $pdf->Cell(40,10, $row['monto'], 1,1,'C',0);
  }

$pdf->Ln(10);
$pdf->SetFont('Arial','B',14);
$pdf->SetX(80);
$pdf->Cell(40,10,utf8_decode('INGRESOS'),0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);

  $qingresos = "SELECT monto, descripcion, fecha
  FROM transferencia
  WHERE id_usuariodest = $IdUsuario
  AND estado = 1";
  $resultado1 = mysqli_query($conexion,$qingresos);

  while($row1 = mysqli_fetch_assoc($resultado1)){
        $pdf->SetX(20);
        $pdf->Cell(20,10, $row1['fecha'], 1,0,'C',0);
        $pdf->Cell(70,10, $row1['descripcion'], 1,0,'C',0);
        $pdf->Cell(80,10, $row1['monto'], 1,1,'C',0);
  }

$pdf->Output();


?>