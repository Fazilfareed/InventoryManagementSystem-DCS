<?php

require('fpdf/fpdf.php');
include("../config/connection.php");
session_start();

class PDF extends FPDF {

    function Header() {
        // Set font for the header
        $this->SetFont('Arial', 'B', 10);
        
        // Document title and subtitle
        $this->SetFont('Arial', 'BU', 10);
        $this->Cell(0, 0, 'Form B', 0, 1, 'R');
        $this->SetFont('Arial', '', 10);
        $this->Cell(50, 2, 'To be completed and return in duplicate to the Deputy Registrar Administration with the Board of Survey Report', 0, 1);
        $this->Ln();

        // University name and survey details
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, 'University of Jaffna', 0, 1, 'C');
        $this->Cell(0, 7, 'Board of Survey 2023', 0, 1, 'C');
        $this->Ln(1);

        // List title
        $this->SetFont('Arial', 'BU', 12);
        $this->Cell(0, 5, 'LIST OF UNUSABLE / REPAIRABLE / TRANSFERRED', 0, 1, 'C');
        $this->Ln(1); // Adds some space after the header

        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 5, 'Department: ..........................................................', 0, 1);
        $this->Ln(1);

        // Table headers
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 7, 'No', 1);
        $this->Cell(40, 7, 'Article', 1);
        $this->Cell(20, 7, 'Qty', 1);
        $this->Cell(20, 7, 'S/D/R/T', 1);
        $this->Cell(50, 7, 'Master Inventory Folio No.', 1);
        $this->Cell(50, 7, 'Department Inventory No.', 1);
        $this->Cell(50, 7, 'Fixed Assets No.', 1);
        $this->Cell(30, 7, 'Remarks', 1);
        $this->Ln();
    }


    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-80); // Adjust this value based on the height of your content
        
        // Set font for the footer
        $this->SetFont('Arial', 'BU', 12);
        $this->Cell(0, 5, 'REPORT OF THE BOARD OF SURVEY', 0, 1, 'C');
        $this->Ln(0);

        // Report Details
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 5, 'The Members having inspected the Articles specified in the list that', 0, 'L');
        $this->Ln(0);

        // Conditions list
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'i. Those marked "S" are unserviceable and Should be Sold.', 0, 1);
        $this->Cell(0, 5, 'ii. Those marked "D" are unserviceable and should be Destroyed.', 0, 1);
        $this->Cell(0, 5, 'iii. Those marked "R" are repairable/Serviceable and should be utilized.', 0, 1);
        $this->Cell(0, 5, 'iv. Those marked "T" are Transferable.', 0, 1);
        $this->Ln(0);

        // Signature area
        $this->SetFont('Arial', '', 12);
        $this->SetX(10);
        $this->Cell(80, 7, '01. ........................................................', 0, 0);
        $this->SetX(100);
        $this->Cell(80, 7, '02. ........................................................', 0, 1);
        $this->SetX(10);
        $this->Cell(80, 7, '03. ........................................................', 0, 0);
        $this->SetX(100);
        $this->Cell(80, 7, '04. ........................................................', 0, 1);
        
        // Other footer content, like signatures, custody, date, and VC section
        $this->Cell(0, 5, '(Signature of the Members of the Board of Survey)', 0, 1, 'L');
        $this->Ln(5);
        
        $this->SetX(10);
        $this->Cell(80, 2, '........................................................', 0, 0);
        $this->Ln();

        $this->SetX(10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(70, 5, 'Head of Department with seal', 0, 0,'C');

        $this->SetFont('Arial', '', 10);

        $this->SetX(160);
        $this->Cell(80, 2, ' ........................................................', 0, 0);
        $this->Ln();

        $this->SetX(160);
        $this->Cell(60, 5, 'Custody of subordinate staff', 0, 0,'C');
        $this->Ln(7);
        $this->SetX(10);
        $this->Cell(80, 2, '........................................................', 0, 0);
        $this->Ln();

        $this->SetX(10);
        $this->Cell(70, 5, 'Date', 0, 0,'C');

        $this->SetX(160);
        $this->Cell(80, 2, '........................................................', 0, 0);
        $this->Ln();

        $this->SetX(160);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(60, 5, 'Vice Chancellor / Registrar', 0, 0,'C');


    }

    function CheckPageBreak($h) {
        // Calculate footer space (assumed 70mm)
        $footerHeight = 80;
        
        // Check if the height of the next row would exceed the page height minus the footer space
        if($this->GetY() + $h > ($this->h - $footerHeight)) {
            $this->AddPage($this->CurOrientation);
        }
    }


    

    function GenerateTable() {

        
        
        // while($data=mysqli_fetch_array($result)){
        //     $this->CheckPageBreak(4);
        //     $this->Cell(10, 4, $data['invoice_id'], 1);
        //     $this->Cell(40, 4, $data['name'], 1);
        // }    
    }
}



// Create instance of the custom PDF class
$pdf = new PDF("L", "mm", "A4");
$pdf->AddPage();



//$pdf->GenerateTable();
$query = "SELECT * FROM invoice";
$result = mysqli_query($con,$query);
$totalRows = mysqli_num_rows($result);

$pdf->SetFont('Arial', '', 10);
$i = 1;       
    
while($row=mysqli_fetch_assoc($result)){
    $pdf->CheckPageBreak(4);
    $pdf->Cell(10, 4, $i, 1);
    $pdf->Cell(40, 4, $row['name'], 1);
    $pdf->Cell(20, 4, $row['quantity'], 1);
    $pdf->Cell(20, 4, '', 1);
    $pdf->Cell(50, 4, $row['folio_number'], 1);
    $pdf->Cell(50, 4, '', 1);
    $pdf->Cell(50, 4, '' , 1);
    $pdf->Cell(30, 4, '' , 1);
    $pdf->Ln();
    $i++;
}

// Output the PDF
$pdf->Output('Board_of_Survey_2023.pdf', 'I');


?>