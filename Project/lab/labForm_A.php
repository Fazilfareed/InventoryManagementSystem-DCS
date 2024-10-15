<?php
require('fpdf/fpdf.php');
include("../config/connection.php");
session_start();

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
        $this->Cell(50, 10, 'Description of Item', 1, 0, 'C');
        $this->MultiCell(17, 5, 'Purchase' . "\n" . 'Year', 1, 'C');
        $this->SetXY(87, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->Cell(25, 10, 'Purchase Value', 1, 0, 'C');
        $this->Cell(40, 10, 'Dept. Inventory No', 1, 0, 'C');
        $this->Cell(15, 10, 'Page No.', 1, 0, 'C');
        $this->MultiCell(40, 5, 'Fixed Assets No' . "\n" . '()', 1, 'C');
        $this->SetXY(207, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->MultiCell(15, 5, 'Book' . "\n" . 'Balance', 1, 'C');
        $this->SetXY(222, $this->GetY()-10); // Adjust cursor position after MultiCell
        $this->Cell(10, 10, 'Total', 1, 0, 'C');
        $this->MultiCell(15, 5, 'Verified' . "\n" . 'Balance', 1, 'C');
        $this->SetXY(247, $this->GetY()-10); // Adjust cursor position after MultiCell
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
        $footerHeight = 70;
        
        if($this->GetY() + $h > ($this->h - $footerHeight)) {
            $this->AddPage($this->CurOrientation);
        }
    }

}

// Create PDF object
$pdf = new PDF("L", "mm", "A4");
$pdf->AddPage();

$pdf->SetFont('Arial', '', 9);


$query = "SELECT * FROM invoice";
$result = mysqli_query($con,$query);
$totalRows = mysqli_num_rows($result);

$pdf->SetFont('Arial', '', 10);
$i = 1;       
    
while($row=mysqli_fetch_assoc($result)){
    $pdf->CheckPageBreak(4);
    $pdf->Cell(10, 5, $i, 1);
    $pdf->Cell(50, 5, $row['name'], 1);
    $pdf->Cell(17, 5, date('Y', strtotime($row['date'])), 1);
    $pdf->Cell(25, 5, $row['price'], 1);
    $pdf->Cell(40, 5, $row['folio_number'], 1);
    $pdf->Cell(15, 5, '', 1);
    $pdf->Cell(40, 5, '', 1);
    $pdf->Cell(15, 5, '', 1);
    $pdf->Cell(10, 5, '', 1);
    $pdf->Cell(15, 5, '' , 1);
    $pdf->Cell(15, 5, '' , 1);
    $pdf->Cell(15, 5, '', 1);
    $pdf->Cell(15, 5, '', 1);
    $pdf->Ln();
    $i++;
}

// Output the PDF (download or display)
$pdf->Output();
?>
