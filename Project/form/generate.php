<?php
require('fpdf/fpdf.php');

// Create instance of the FPDF class
$pdf = new FPDF("L", "mm", "A4");
$pdf->AddPage();

// Set document title
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0,0,'Form B',0,1,'R');
$pdf->Cell(50,2,'To be completed and return in duplicate to the Deputy Registrar Administration with the Board of Survey Report',0,1);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'University of Jaffna', 0, 1, 'C');
$pdf->Cell(0, 7, 'Board of Survey 2023', 0, 1, 'C');
$pdf->Ln(1);
//$pdf->SetXY(0, 20);
$pdf->Cell(0, 5, 'LIST OF UNUSABLE / REPAIRABLE / TRANSFERRED', 0, 1, 'C');
//$pdf->Line(95, 36, 202, 36);

// Add department label
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 5, 'Department: ..........................................................', 0, 1);
$pdf->Ln(1);

// Table headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 7, 'No', 1);
$pdf->Cell(40, 7, 'Article', 1);
$pdf->Cell(20, 7, 'Qty', 1);
$pdf->Cell(20, 7, 'S/D/R/T', 1);
$pdf->Cell(50, 7, 'Master Inventory Folio No.', 1);
$pdf->Cell(50, 7, 'Department Inventory No.', 1);
$pdf->Cell(50, 7, 'Fixed Assets No.', 1);
$pdf->Cell(30, 7, 'Remarks', 1);
$pdf->Ln();

// Dummy Data for Rows
$pdf->SetFont('Arial', '', 10);
for($i = 1; $i <= 18; $i++){
    $pdf->Cell(10, 4, $i, 1);
    $pdf->Cell(40, 4, 'Article ' . $i, 1);
    $pdf->Cell(20, 4, rand(1,10), 1);
    $pdf->Cell(20, 4, 'S', 1);
    $pdf->Cell(50, 4, 'Folio No ' . $i, 1);
    $pdf->Cell(50, 4, 'Dept Inv No ' . $i, 1);
    $pdf->Cell(50, 4, 'Fixed No ' . $i, 1);
    $pdf->Cell(30, 4, 'Remarks ' . $i, 1);
    $pdf->Ln();
}

// Space before the report
$pdf->Ln(3);

// Report of the Board of Survey
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'REPORT OF THE BOARD OF SURVEY', 0, 1, 'C');
$pdf->Ln(0);

// Report Details
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 5, 'The Members having inspected the Articles specified in the list that', 0, 'L');
$pdf->Ln(0);

// Conditions list
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, 'i. Those marked "S" are unserviceable and Should be Sold.', 0, 1);
$pdf->Cell(0, 5, 'ii. Those marked "D" are unserviceable and should be Destroyed.', 0, 1);
$pdf->Cell(0, 5, 'iii. Those marked "R" are repairable/Serviceable and should be utilized.', 0, 1);
$pdf->Cell(0, 5, 'iv. Those marked "T" are Transferable.', 0, 1);
$pdf->Ln(0);

// Signature area
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->Cell(80, 7, '01. ........................................................',0, 0);
$pdf->SetX(100);
$pdf->Cell(80, 7, '02. ........................................................', 0, 1);
$pdf->SetX(10);
$pdf->Cell(80, 7, '03. ........................................................', 0, 0);
$pdf->SetX(100);
$pdf->Cell(80, 7, '04. ........................................................', 0, 1);

// Footer
$pdf->Ln(0);
$pdf->Cell(0, 5, '(Signature of the Members of the Board of Survey)', 0, 1, 'L');

// Custody section
$pdf->Ln(0);
$pdf->Cell(0, 5, 'Head of Department with seal', 0, 0, 'L');
$pdf->Cell(0, 5, 'Custody of subordinate staff', 0, 1, 'R');

// Date and Vice Chancellor section
$pdf->Ln(0);
$pdf->Cell(0, 5, 'Date: ................................', 0, 0, 'L');
$pdf->Cell(0, 5, 'Vice Chancellor / Registrar: ................................', 0, 1, 'R');

// Output the PDF
$pdf->Output('Board_of_Survey_2023.pdf', 'I');
?>
