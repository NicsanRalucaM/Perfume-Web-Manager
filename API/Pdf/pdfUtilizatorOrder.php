<?php

require('../../fpdf183/fpdf.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';
include_once '../Objects/user.php';

$pdf = new FPDF('L', 'mm', 'A4');;
$pdf->AliasNbPages();

//add page automatically for its true parameter


$pdf->AddPage();

$pdf->SetTitle("Situatia vanzarilor in functie de Utilizatori", true);
$pdf->SetFont('Times', 'B', '16');
$pdf->Cell(250, 10, 'Situatia vanzarilor in functie de Utilizatori', 0, 0, 'C');
// Line break
$pdf->SetFont('Times', '', '12');
$pdf->Ln(20);
$pdf->Ln();

$database = new Database();
$db = $database->getConnection();

$brand = new Brand($db);
$product = new Product($db);
$user = new User($db);
$order = new Order($db);


$productt1 = new Product($db);
$productt2 = new Product($db);
$productt3 = new Product($db);
$productt4 = new Product($db);
$productt5 = new Product($db);
$productt6 = new Product($db);
$productt7 = new Product($db);
$productt8 = new Product($db);
$productt9 = new Product($db);
$productt10 = new Product($db);

$stmt2 = $user->getId();
if (true) {
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $order->user = $user_id;
        $pdf->SetLeftMargin(50);
        $pdf->SetFont('Times', 'B', '14');

        $pdf->Cell(25, 10, "Utilizator:#", 0, 0, 'L');
        $pdf->Cell(25, 10, $row["user_id"], 0, 0, 'L');
        $pdf->Cell(30, 10, $row["user_firstname"], 0, 0, 'L');
        $pdf->Cell(30, 10, $row["user_lastname"], 0, 0, 'L');

        $stmt = $order->read();
        if ($stmt != null) {

            if (!$stmt->rowcount()) {
                $pdf->Cell(25, 10, "Nu are comenzi momentan", 0, 0, 'L');

            } else {
                $pdf->Cell(25, 10, "Are ", 0, 0, 'L');
                $pdf->Cell(25, 10, $stmt->rowcount(), 0, 0, 'L');
                $pdf->Cell(25, 10, "comenzi", 0, 0, 'L');
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                    extract($row);
                    $pdf->Ln();
                    $pdf->SetLeftMargin(50);
                    $pdf->Ln();
                    $pdf->SetFont('Arial', '', '12');
                    $pdf->Cell(30, 10, 'Id_order:', 1, 0, 'L');
                    $pdf->Cell(70, 10, $row["id"], 1, 0, 'L');
                    $pdf->Ln();
                    $pdf->Cell(30, 10, 'Produse:', 1, 0, 'L');
                    $pdf->Cell(10, 10, 'Id', 1, 0, 'L');
                    $pdf->Cell(60, 10, 'Name', 1, 0, 'L');
                    $pdf->Cell(60, 10, 'Season', 1, 0, 'L');
                    $pdf->Cell(60, 10, 'Price', 1, 0, 'L');
                    $pdf->SetLeftMargin(80);
                    $pdf->Ln();

                    $productt1->id = $product1;
                    $productt2->id = $product2;
                    $productt3->id = $product3;
                    $productt4->id = $product4;
                    $productt5->id = $product5;
                    $productt6->id = $product6;
                    $productt7->id = $product7;
                    $productt8->id = $product8;
                    $productt9->id = $product9;
                    $productt10->id = $product10;

                    if ($product1 != null) {
                        $pdf->Cell(10, 10, $product1, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt1->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt1->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt1->getPrice(), 1, 0, 'L');


                        $pdf->Ln();
                    }
                    if ($product2 != null) {
                        $pdf->Cell(10, 10, $product2, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt2->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt2->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt2->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }
                    if ($product3 != null) {
                        $pdf->Cell(10, 10, $product3, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt3->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt3->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt3->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }
                    if ($product4 != null) {
                        $pdf->Cell(10, 10, $product4, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt4->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt4->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt4->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }
                    if ($product5 != null) {
                        $pdf->Cell(10, 10, $product5, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt5->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt5->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt5->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }

                    if ($product6 != null) {
                        $pdf->Cell(10, 10, $product6, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt6->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt6->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt6->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }

                    if ($product7 != null) {
                        $pdf->Cell(10, 10, $product7, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt7->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt7->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt7->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }
                    if ($product8 != null) {
                        $pdf->Cell(10, 10, $product8, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt8->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt8->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt8->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }
                    if ($product9 != null) {
                        $pdf->Cell(10, 10, $product9, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt9->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt9->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt9->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }

                    if ($product10 != null) {
                        $pdf->Cell(10, 10, $product10, 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt10->getName(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt10->getAnotimpId(), 1, 0, 'L');
                        $pdf->Cell(60, 10, $productt10->getPrice(), 1, 0, 'L');
                        $pdf->Ln();
                    }

                }}
                $pdf->Ln();

            }

    }

}
$pdf->Output();


?>