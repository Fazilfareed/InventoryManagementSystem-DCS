<?php
require('fpdf/fpdf.php');

// Extend the FPDF class to add header and footer
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Select Arial bold 15 for title
        $this->SetFont('Arial', '', 12);
        // Add title
        $this->Cell(0, 0, 'Form A', 0, 1, 'R');
        $this->Cell(0, 10, 'Board of Survey as at .................', 0, 1, 'L');
        

        // Department and Section/Division
        $this->SetFont('Arial', '', 12);
        $this->Cell(100, 5, 'Department: Computer Science', 0, 0, 'L');
        $this->Cell(0, 5, 'Section / Division:', 0, 1, 'C');

        // Table header
        $this->Ln(2); // Line break
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(10, 10, 'No.', 1, 0, 'C');
        $this->Cell(30, 10, 'Description of Item', 1, 0, 'C');
        $this->MultiCell(20, 5, 'Purchase' . "\n" . ' Year', 1, 'C');
        $this->SetXY(70, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->Cell(25, 10, 'Purchase Value', 1, 0, 'C');
        $this->Cell(30, 10, 'Dept. Inventory No', 1, 0, 'C');
        $this->Cell(15, 10, 'Page No.', 1, 0, 'C');
        $this->MultiCell(40, 5, 'Fixed Assets No' . "\n" . '()', 1, 'C');
        $this->SetXY(180, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->MultiCell(20, 5, 'Book' . "\n" . ' Balance', 1, 'C');
        $this->SetXY(200, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->Cell(10, 10, 'Total', 1, 0, 'C');
        $this->MultiCell(20, 5, 'Verified' . "\n" . ' Balance', 1, 'C');
        $this->SetXY(230, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->Cell(15, 10, 'Surplus', 1, 0, 'C');
        $this->Cell(15, 10, 'Deficit', 1, 0, 'C');
        $this->Cell(15, 10, 'Remarks', 1, 1, 'C');
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-60);  // Adjust footer height as needed
        // Arial italic 8
        $this->SetFont('Arial', 'BI', 10);
        $this->Cell(0, 5, 'Column 01 to 08 should be perfected by the Department and the report kept ready for Board of Survey', 0, 1, 'L');
        $this->Ln(5);
        // Footer content
        $this->SetFont('Arial', '', 10);
        
        $this->SetX(20);
        $this->Cell(10, 0, 'Members of the Board of Survey', 0, 1, 'L');
        $this->SetX(80);
        $this->Cell(0, 0, '01 .........................................', 0, 1);
        $this->SetX(160);
        $this->Cell(0, 0, 'Custody of Subordinate Staff: .........................................', 0, 1);
        $this->Ln(3);
        
        $this->SetX(80);
        $this->Cell(50, 7, '02 .........................................', 0, 1);
        $this->SetX(160);
        
        $this->Cell(0, 0, 'Head of Department(Seal): ......................................... ', 0, 1);
        $this->SetX(80);
        $this->Cell(50, 7, '03 .........................................', 0, 1);

        $this->MultiCell(0, 5, 'i. Those marked "S" - are unserviceable and should be Sold.' . "\n" .
            'ii. Those marked "D" are unserviceable and should be Destroyed.' . "\n" .
            'iii. Those marked "R" are repairable/Serviceable and should be Utilized.');

    }

    function CheckPageBreak($h) {
        // Calculate footer space (assumed 70mm)
        $footerHeight = 70;
        
        // Check if the height of the next row would exceed the page height minus the footer space
        if($this->GetY() + $h > ($this->h - $footerHeight)) {
            $this->AddPage($this->CurOrientation);
        }
    }

}

// Create PDF object
$pdf = new PDF("L", "mm", "A4");
$pdf->AddPage();

// Sample data row for the table
$pdf->SetFont('Arial', '', 9);
for ($i = 1; $i <= 30; $i++) {
    $pdf->CheckPageBreak(4);
    $pdf->Cell(10, 5, $i, 1, 0, 'C');
    $pdf->Cell(30, 5, 'Item ' . $i, 1, 0, 'C');
    $pdf->Cell(20, 5, '202' . $i, 1, 0, 'C');
    $pdf->Cell(25, 5, number_format(1000 * $i, 2), 1, 0, 'C');
    $pdf->Cell(30, 5, 'DINV' . $i, 1, 0, 'C');
    $pdf->Cell(15, 5, 'Page ' . $i, 1, 0, 'C');
    $pdf->Cell(40, 5, 'FA' . $i, 1, 0, 'C');
    $pdf->Cell(20, 5, 'Bal ' . $i, 1, 0, 'C');
    $pdf->Cell(10, 5, 'Tot', 1, 0, 'C');
    $pdf->Cell(20, 5, '' , 1, 0, 'C');
    $pdf->Cell(15, 5, '', 1, 0, 'C');
    $pdf->Cell(15, 5, '', 1, 0, 'C');
    $pdf->Cell(15, 5, '', 1, 1, 'C');
}

// Output the PDF (download or display)
$pdf->Output();
?>
