<?php
    require('fpdf/fpdf.php');
    include("../config/connection.php");
    session_start();
    if(!isset($_SESSION['uname'])){
        header("location: ../login/login.php");
        exit();
    }

    $rowsPerPage = 10; 
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $rowsPerPage;

    $queryinvoice = "SELECT * FROM invoice ORDER BY invoice_id DESC LIMIT $offset, $rowsPerPage";

    $totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM invoice"));
    $totalPages = ceil($totalRows / $rowsPerPage);

    if (isset($_GET['search'])) {
        $type = $_GET['type'];
        $year = $_GET['year'];
        $name = $_GET['name'];

        if(!(empty($year)) AND  !(empty($name)) AND !(empty($type))){
            $queryinvoice = "SELECT * FROM invoice  WHERE name='$name' AND EXTRACT(YEAR FROM date)=$year AND type = '$type' ";
            
        }

        else if(!(empty($year)) AND  !(empty($type))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND type='$type' ";
        }  
        else if(!(empty($type)) AND  !(empty($name))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE type='$type' AND name= '$name'";
        } 
        else if(!(empty($year)) AND  !(empty($name))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND name='$name' ";
        }
        
        elseif (!(empty($year))) {
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year ";
        }
        elseif (!(empty($name))) {
            $queryinvoice = "SELECT * FROM invoice WHERE name='$name' ";
        }
        elseif(!(empty($type))){
            $queryinvoice = "SELECT * FROM invoice WHERE type='$type' ";
        }

        else{
            $queryinvoice = "SELECT * FROM invoice ";
        }
    }

    if (isset($_GET['export'])) {
        

        $type = $_GET['type'];
        $year = $_GET['year'];
        $name = $_GET['name'];

        if(!(empty($year)) AND  !(empty($name)) AND !(empty($type))){
            $queryinvoice = "SELECT * FROM invoice  WHERE name='$name' AND EXTRACT(YEAR FROM date)=$year AND type = '$type' ";
        }

        else if(!(empty($year)) AND  !(empty($type))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND type='$type' ";
        }  
        else if(!(empty($type)) AND  !(empty($name))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE type='$type' AND name= '$name'";
        } 
        else if(!(empty($year)) AND  !(empty($name))){
            
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND name='$name' ";
        }
        
        elseif (!(empty($year))) {
            $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year ";
        }
        elseif (!(empty($name))) {
            $queryinvoice = "SELECT * FROM invoice WHERE name='$name' ";
        }
        elseif(!(empty($type))){
            $queryinvoice = "SELECT * FROM invoice WHERE type='$type' ";
        }

        else{
            $queryinvoice = "SELECT * FROM invoice ";
        }

        $resultinvoice1 = mysqli_query($con,$queryinvoice);

        // Extend the FPDF class to add header and footer
        
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
                $this->Ln(1); 
        
                $this->SetFont('Arial', '', 12);
                $this->Cell(50, 5, 'Department: ..........................................................', 0, 1);
                $this->Ln(1);
        
                // Table headers
                $this->SetFont('Arial', 'B', 10);
                $this->Cell(10, 7, 'No', 1,0,'C');
                $this->Cell(60, 7, 'Article', 1,0,'C');
                $this->Cell(10, 7, 'Qty', 1,0,'C');
                $this->Cell(15, 7, 'S/D/R/T', 1,0,'C');
                $this->Cell(50, 7, 'Master Inventory Folio No.', 1,0,'C');
                $this->Cell(50, 7, 'Department Inventory No.', 1,0,'C');
                $this->Cell(50, 7, 'Fixed Assets No.', 1,0,'C');
                $this->Cell(30, 7, 'Remarks', 1,0,'C');
                $this->Ln();
            }
        
            // Page footer
            function Footer() {
                // Adjust this value based on the height of your content
                $this->SetY(-80); 
                
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
                $footerHeight = 80;
                if($this->GetY() + $h > ($this->h - $footerHeight)) {
                    $this->AddPage($this->CurOrientation);
                }
            }
        }
        
        $pdf = new PDF("L", "mm", "A4");
        $pdf->AddPage();
        
        $pdf->SetFont('Arial', '', 10);
        $i = 1;       
            
        while ($rowinvoice1 = mysqli_fetch_assoc($resultinvoice1)) {
            $pdf->CheckPageBreak(4);
            $pdf->Cell(10, 5, $i, 1);
            $pdf->Cell(60, 5, $rowinvoice1['name'], 1);
            $pdf->Cell(10, 5, $rowinvoice1['quantity'], 1);
            $pdf->Cell(15, 5, '', 1);
            $pdf->Cell(50, 5, $rowinvoice1['folio_number'], 1);
            $pdf->Cell(50, 5, '', 1);
            $pdf->Cell(50, 5, '' , 1);
            $pdf->Cell(30, 5, '' , 1);
            $pdf->Ln();
            $i++;
        }
        
        // Output the PDF
        $pdf->Output('Board_of_Survey_2023.pdf', 'I');

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form B</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    ul .lab a{
    background-color:var(--text-color)
}
</style>
</head>
<body>
    <?php include "../header/header.php" ;?>
    <hr>
    <div class="main-container">
        <div class="container">
            
            <h2>FORM B</h2>
            <div>
                <form action="labForm_B.php" method="get">

                    <select name="type" >
                        <option value="">Please Select</option>
                        <option value="desktop"<?php if(isset($_POST['type']) && $_POST['type'] === 'desktop') echo ' selected'; ?>>Desktop</option>
                        <option value="laptop"<?php if(isset($_POST['type']) && $_POST['type'] === 'laptop') echo ' selected'; ?>>Laptop</option>
                        <option value="electronic"<?php if(isset($_POST['type']) && $_POST['type'] === 'electronic') echo ' selected'; ?>>Electronic</option>
                    </select>

                    <input  type="number" placeholder="Year" name="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];}?>" />

                    <input  type="text" placeholder="Artical Name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" />

                    <input class="button" type="submit"  name="search" value="Search" />
                    
                    <input class="button" type="submit" name="export" value="Export to PDF" />
                </form>
            </div>
        </div>
    
        <div class="table-con">
            <table>
                <thead>
                    <tr>
                        <th>Article Name</th>
                        <th>Qty</th>
                        <th>Mark as S/D/R/T</th>
                        <th>Master Inventory No</th>
                        <th>Department Inventory Number</th>
                        <th>Fixed Assest No</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        
                        $resultinvoice = mysqli_query($con,$queryinvoice);

                        while($rowinvoice = mysqli_fetch_assoc($resultinvoice)){
                        ?>
                            <tr>
                                <td class="name"><a href="labItems.php?searchItems=true&id=<?php echo $rowinvoice['invoice_id'] ?>"><?php echo $rowinvoice['name']?></a></td>

                                <td><?php echo $rowinvoice['quantity']?></td>

                                <td><?php echo "" ?></td>

                                <td><?php echo $rowinvoice['folio_number']?></td>

                                <td><?php echo "UJ/COMPSC/425/LE/369/11B";?></td>

                                <td><?php echo "FAN";?></td>

                                <td>
                                    <a href="addData.php?id=<?php echo $rowinvoice['invoice_id'] ?>" >Edit</a>
                                    <form method="post" action="actionItem.php">
                                    <input type="hidden" name="<?php echo "remove";?>" value="<?php echo $rowinvoice['invoice_id']; ?>">
                                    <button class="logout" type="submit" onclick="return confirm('Are you sure to remove this record ?')">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                    ?> 

                    
                </tbody>
                

            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
                $('.description').each(function() {
                    if ($(this).width() > 200) {
                        $(this).removeClass('description').addClass('description expandable');
                        $(this).closest('tr').after('<tr><td class="description expandable">' + $(this).text() + '</td></tr>');
                    }
                });
            });

            $(document).ready(function() {
                $('.name').each(function() {
                    if ($(this).width() > 200) {
                        $(this).removeClass('name').addClass('name expandable');
                        $(this).closest('tr').after('<tr><td class="name expandable">' + $(this).text() + '</td></tr>');
                    }
                });
            });
            $(document).ready(function() {
                $('.sname').each(function() {
                    if ($(this).width() > 200) {
                        $(this).removeClass('sname').addClass('sname expandable');
                        $(this).closest('tr').after('<tr><td class="sname expandable">' + $(this).text() + '</td></tr>');
                    }
                });
            });
            $(document).ready(function() {
                $('.folio_number').each(function() {
                    if ($(this).width() > 200) {
                        $(this).removeClass('folio_number').addClass('folio_number expandable');
                        $(this).closest('tr').after('<tr><td class="folio_number expandable">' + $(this).text() + '</td></tr>');
                    }
                });
            });
            </script>
        </div>

        <div class="pagination" style="margin:15px;">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '" style="margin:1px;background-color: #fff; color: #1690A7; border: none; padding: 5px 10px; cursor: pointer; width:5px;">' . $i . '</a>';
        }
        ?>
        </div>
    </div>
</body>

</html>