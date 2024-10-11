<?php
require('fpdf/fpdf.php');

// Create a PDF object
$pdf = new FPDF("L", "mm", "A4");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Title
$pdf->Cell(0, 2, 'Board of Survey as at 31.12.2023', 0, 1, 'L');
$pdf->Cell(0, 2, 'Form A', 0, 1, 'R');

// Department and Section/Division
$pdf->SetFont('Arial', '', 13);
$pdf->Cell(100, 5, 'Department: Computer Science', 0, 0, 'L');
$pdf->Cell(0, 5, 'Section / Division:', 0, 1, 'C');

// Table header
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 10, 'No.', 1, 0, 'C');
$pdf->Cell(30, 10, 'Description of Item', 1, 0, 'C');
$pdf->MultiCell(20, 5, 'Purchase'."\n".' Year', 1, 'C');
$pdf->SetXY(70, 21); // Move cursor back after MultiCell
$pdf->Cell(25, 10, 'Purchase Value', 1, 0, 'C');
//$pdf->Cell(30, 10, 'Master Inventory No', 1, 0, 'C');
$pdf->Cell(30, 10, 'Dept. Inventory No', 1, 0, 'C');
$pdf->Cell(15, 10, 'Page No.', 1, 0, 'C');
$pdf->MultiCell(40, 5, 'Fixed Assets No'."\n".'()', 1, 'C');
$pdf->SetXY(180, 21); // Move cursor back after MultiCell
$pdf->MultiCell(20, 5, 'Book'."\n".' Balance', 1, 'C');
$pdf->SetXY(200, 21); // Move cursor back after MultiCell
$pdf->Cell(10, 10, 'Total', 1, 0, 'C');
$pdf->MultiCell(20, 5, 'Verified'."\n".' Balance', 1, 'C');
$pdf->SetXY(230, 21); // Move cursor back after MultiCell
$pdf->Cell(15, 10, 'Surplus', 1, 0, 'C');
$pdf->Cell(15, 10, 'Deficit', 1, 0, 'C');
$pdf->Cell(15, 10, 'Remarks', 1, 1, 'C');

// Sample data row for the table
// $pdf->SetFont('Arial', '', 9);
// for($i=1; $i<=10; $i++) {
//     $pdf->Cell(10, 5, $i, 1, 0, 'C');
//     $pdf->Cell(50, 5, 'Item ' . $i, 1, 0, 'C');
//     $pdf->Cell(20, 5, '202' . $i, 1, 0, 'C');
//     $pdf->Cell(30, 5, number_format(1000*$i, 2), 1, 0, 'C');
//     $pdf->Cell(30, 5, 'INV' . $i, 1, 0, 'C');
//     $pdf->Cell(30, 5, 'DINV' . $i, 1, 0, 'C');
//     $pdf->Cell(10, 5, 'Page ' . $i, 1, 0, 'C');
//     $pdf->Cell(40, 5, 'FA' . $i, 1, 0, 'C');
//     $pdf->Cell(10, 5, 'Bal' . $i, 1, 0, 'C');
//     $pdf->Cell(10, 5, 'tot', 1, 0, 'C');
//     $pdf->Cell(10, 5, '', 1, 0, 'C');
//     $pdf->Cell(10, 5, '', 1, 0, 'C');
//     $pdf->Cell(10, 5, '', 1, 0, 'C');
//     $pdf->Cell(10, 5, '', 1, 1, 'C');
// }

// Footer
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 8);
$pdf->MultiCell(0, 5, 'i. Those marked "S" - are unserviceable and should be Sold.' . "\n" .
    'ii. Those marked "D" are unserviceable and should be Destroyed.' . "\n" .
    'iii. Those marked "R" are repairable/Serviceable and should be Utilized.');

$pdf->Ln(10);
$pdf->Cell(10, 5, 'Members of the Board of Survey', 0, 1, 'L');
$pdf->Cell(50, 5, '01 .........................................', 0, 1);
$pdf->Cell(50, 5, '02 .........................................', 0, 1);
$pdf->Cell(50, 5, '03 .........................................', 0, 1);

$pdf->Ln(5);
$pdf->Cell(100, 5, 'Custody of Subordinate Staff: .........................................', 0, 1);
$pdf->Cell(100, 5, 'Head of Department: ......................................... (Seal)', 0, 1);

// Output the PDF (download or display)
$pdf->Output();
?>
