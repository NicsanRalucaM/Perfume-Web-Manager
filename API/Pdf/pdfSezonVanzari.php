<?php

require('../../fpdf183/fpdf.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';

$pdf = new FPDF('L', 'mm', 'A4');;
$pdf->AliasNbPages();

//add page automatically for its true parameter


$pdf->AddPage();

$pdf->SetTitle("Situatia vanzarilor in functie de Sezon", true);
$pdf->SetFont('Times', 'B', '16');
$pdf->Cell(250, 10, 'Situatia vanzarilor in functie de Sezon', 0, 0, 'C');
// Line break
$pdf->SetFont('Times', '', '12');
$pdf->Ln(20);
$pdf->Ln();

$database = new Database();
$db = $database->getConnection();

$brand = new Brand($db);

$product = new Product($db);
$order = new Order($db);

//$product->anotimp= $_GET['sez'];
//$stmt = $product->readByAnotimp();
$stmt2 = $product->getAnotimp();
if (true) {
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $i=0;
        extract($row);
        $pdf->SetLeftMargin(50);
        $pdf->SetFont('Times', 'B', '14');

        $pdf->Cell(25, 10,"Anotimp:", 0, 0, 'L');
        $pdf->Cell(30, 10, $row["anotimp"], 0, 0, 'L');
        $pdf->Ln();

        $pdf->SetFont('Times', '', '12');
        $product->anotimp = $row["anotimp"];

        $pdf->Cell(20,10,"Id",1 ,0,'L');
        $pdf->Cell(70,10,"Name",1 ,0,'L');
        $pdf->Cell(70,10,"Brand",1 ,0,'L');
        $pdf->Cell(20,10,"Price",1 ,0,'L');
        $pdf->Cell(20,10,"Stock",1 ,0,'L');
        $pdf->Cell(20,10,"Sold",1 ,0,'L');
        $pdf->Ln();
        $stmt = $product->readByAnotimp();
        if (true)
        {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                extract($row);
                $brand->id=$brand_id;
                $order->val=$id;

                $pdf->Cell(20,10,$row["id"],1 ,0,'L');
                $pdf->Cell(70,10,$row["name"],1 ,0,'L');
                $pdf->Cell(70,10,$brand->getName(),1 ,0,'L');
                $pdf->Cell(20,10,$row["price"],1 ,0,'L');
                $pdf->Cell(20,10,$row["stoc"],1 ,0,'L');
                $pdf->Cell(20,10,$order->readProductsVal(),1 ,0,'L');
                $i=$i+$order->readProductsVal();
                $pdf->Ln();
            }

            $pdf->SetFont('Times', 'B', '14');
            $pdf->Cell(50,10,"Au fost vandute",0 ,0,'R');
            $pdf->Cell(5,10,$i,0 ,0,'L');
            $pdf->Cell(20,10,"produse din aceasta categorie",0 ,0,'L');
            $pdf->Ln();
        }
        $pdf->Ln();
    }

}
$pdf->Output();


?>