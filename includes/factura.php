<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    $this->SetFont('Arial','B',14);
    $this->SetTextColor(37,60,126);
    $this->Cell(0, 5, 'Declean Glamoure Zapateria', 0,0, 'C');
    $this->Image('../imagenes/logo.jpg', 180, 5, 30, 20, 'jpg');

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-30);
    // Arial italic 8
    $this->SetFont('Arial','I',9);
    $this->SetTextColor(37,60,126);
    $this->Image('../imagenes/firma.png', 50, 200, 100, '', 'png');
    $this->Cell(0,10, 'La empresa podra brindar una copia de la factura en un lapso de un mes despues de la emisión de la misma.', 0, 0, 'C');
    $this->Ln();
    $this->Cell(0,10, 'Posterior a la fecha no se realizará alguna reposición.', 0, 0, 'C');
    $this->Ln();
    // Número de página
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');

}
}


require ('../config/conection.php');

$codigo = $_POST['codigo'];

             
                 
$sql="SELECT factura.Id_factura, factura.fecha, factura.Id_producto, factura.unidades, productos.Precio, productos.producto FROM factura INNER JOIN productos on factura.Id_producto = productos.Id WHERE Id_factura = '$codigo'";
$result=mysqli_query($conn,$sql);  



$pdf = new PDF('P', 'mm','letter', true);
$pdf-> AliasNbPages();
$pdf->AddPage('portrait', 'letter');
$pdf->SetFont('Arial','B', 15);
$pdf->SetTextColor(43,75,167);
$pdf->SetY(30);
$pdf->Cell(0, 5, 'Factura de compra', 0, 0,'C');
$pdf->SetDrawColor(43,75,167);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B', 9);
$pdf->SetY(50);
$pdf->Cell(20,5, 'Nombre de la empresa: Declean Glamoure');
$pdf->Ln();
$pdf->Cell(20,5, 'Dirección de la empresa: 113C, Los Portales, Toluca, Estado de México.');
$pdf->Ln();
$pdf->Cell(20,5, 'Teléfono de la empresa: 722 563 7856');
$pdf->Ln();
$pdf->Cell(20,5, 'Correo electronico: decleanglamore@outlook.com');
$pdf->Ln();
 
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B', 10);
$pdf->SetFillColor(37,60,126);
$pdf->SetDrawColor(255,255,255);
$pdf->SetY(80);

while($row=mysqli_fetch_array($result)){
      
    $pdf->Cell(20,5, 'N° factura',1,0,'C',1);
    $pdf->Cell(30,5, 'Fecha',1,0,'C',1);
    $pdf->Cell(25,5, 'N° producto',1,0,'C',1);
	$pdf->Cell(25,5, 'N° de piezas',1,0,'C',1);
	$pdf->Cell(60,5, 'Descripcion del producto',1,0,'C',1);
	$pdf->Cell(30,5, 'Total',1,0,'C',1);

	$pdf->SetTextColor(0,0,0);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetY(90);

    $pdf->Cell(20,5, $row['Id_factura'],1,0,'C',1);
    $pdf->Cell(30,5, $row['fecha'],1,0,'C',1);
    $pdf->Cell(25,5, $row['Id_producto'],1,0,'C',1);
    $pdf->Cell(25,5, $row['unidades'],1,0,'C',1);
    $pdf->Cell(60,5, $row['producto'],1,0,'C',1);
    $pdf->Cell(30,5, $row['Precio']*$row['unidades'],1,0,'C',1);
     }

$pdf->Output();
?>