<?php
require('../../fpdf183/fpdf.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once  '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';

$pdf = new FPDF('L','mm','A4');;
$pdf->AliasNbPages();

//add page automatically for its true parameter


$pdf->AddPage();

$pdf->SetTitle("Situatia vanzarilor in functie de Brand",true );
$pdf->SetFont('Times','B','16');
$pdf->Cell(280,10,'Situatia vanzarilor in functie de Brand',0,0,'C');
// Line break
$pdf->SetFont('Times','','12');
$pdf->Ln(20);
$pdf->Ln();

$database = new Database();
$db = $database->getConnection();



$product = new Product($db);
$brand =new Brand($db);
$stmt = $product->read();
$order=new Order($db);

if(true){



    $pdf->SetLeftMargin(40);
    $pdf->Cell(70,10,"Brand",1 ,0,'L');
    $pdf->Cell(20,10,"Id",1 ,0,'L');
    $pdf->Cell(70,10,"Name",1 ,0,'L');
    $pdf->Cell(20,10,"Price",1 ,0,'L');
    $pdf->Cell(20,10,"Stock",1 ,0,'L');
    $pdf->Cell(20,10,"Sold",1 ,0,'L');
    $pdf->Ln();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $brand->id=$brand_id;
        $order->val=$id;

        $pdf->Cell(70,10,$brand->getName(),1 ,0,'L');
        $pdf->Cell(20,10,$row["id"],1 ,0,'L');
        $pdf->Cell(70,10,$row["name"],1 ,0,'L');
        $pdf->Cell(20,10,$row["price"],1 ,0,'L');
        $pdf->Cell(20,10,$row["stoc"],1 ,0,'L');
        $pdf->Cell(20,10,$order->readProductsVal(),1 ,0,'L');
        $pdf->Ln();


    }
    $pdf->Output();


}
?>