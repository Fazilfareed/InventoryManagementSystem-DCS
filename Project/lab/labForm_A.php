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

    $queryinvoice = "SELECT * FROM forma_table";

    $totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM invoice"));
    $totalPages = ceil($totalRows / $rowsPerPage);

    if (isset($_GET['search'])) {
        $purchase_year = $_GET['year'];
        $description = $_GET['name'];

        if(!(empty($purchase_year)) AND  !(empty($description))){
            
            $queryinvoice = "SELECT * FROM forma_table WHERE purchase_year <= $purchase_year AND description='$description' ";
        }
        
        elseif (!(empty($purchase_year))) {
            $queryinvoice = "SELECT * FROM forma_table WHERE purchase_year <= $purchase_year ";
        }
        elseif (!(empty($description))) {
            $queryinvoice = "SELECT * FROM forma_table WHERE description='$description' ";
        }
        else{
            $queryinvoice = "SELECT * FROM forma_table ";
        }
    }

    if (isset($_GET['export'])) {
        // $type = $_GET['type'];
        // $year = $_GET['year'];
        // $name = $_GET['name'];

        // if(!(empty($year)) AND  !(empty($name)) AND !(empty($type))){
        //     $queryinvoice = "SELECT * FROM invoice  WHERE name='$name' AND EXTRACT(YEAR FROM date)=$year AND type = '$type' ";
            
        // }

        // else if(!(empty($year)) AND  !(empty($type))){
            
        //     $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND type='$type' ";
        // }  
        // else if(!(empty($type)) AND  !(empty($name))){
            
        //     $queryinvoice = "SELECT * FROM invoice WHERE type='$type' AND name= '$name'";
        // } 
        // else if(!(empty($year)) AND  !(empty($name))){
            
        //     $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year AND name='$name' ";
        // }
        
        // elseif (!(empty($year))) {
        //     $queryinvoice = "SELECT * FROM invoice WHERE EXTRACT(YEAR FROM date)=$year ";
        // }
        // elseif (!(empty($name))) {
        //     $queryinvoice = "SELECT * FROM invoice WHERE name='$name' ";
        // }
        // elseif(!(empty($type))){
        //     $queryinvoice = "SELECT * FROM invoice WHERE type='$type' ";
        // }

        // else{
        //     $queryinvoice = "SELECT * FROM invoice ";
        // }

        $queryinvoice = "SELECT * FROM forma_table";
        $resultinvoice1 = mysqli_query($con,$queryinvoice);

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

        $pdf->SetFont('Arial', '', 10);
        $i = 1;    
        while ($rowinvoice1 = mysqli_fetch_assoc($resultinvoice1)) {
            $pdf->CheckPageBreak(4);
            $pdf->Cell(10, 5, $i, 1);
            $pdf->Cell(50, 5, $rowinvoice1['description'], 1);
            $pdf->Cell(17, 5, $rowinvoice1['purchase_year'], 1);
            $pdf->Cell(25, 5, $rowinvoice1['purchase_value'], 1);
            $pdf->Cell(40, 5, $rowinvoice1['dept_inventory_no'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['page_no'], 1);
            $pdf->Cell(40, 5, $rowinvoice1['fixed_asset_no'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['book_balance'], 1);
            $pdf->Cell(10, 5, $rowinvoice1['total'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['verified_balance'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['surplus'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['deficit'], 1);
            $pdf->Cell(15, 5, $rowinvoice1['remarks'], 1);
            $pdf->Ln();
            $i++;
        }

        // Output the PDF (download or display)
        $pdf->Output();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form A</title>
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
            
            <h2>FORM A</h2>
            <div>
                <form action="labForm_A.php" method="get">

                    <input  type="number" placeholder="Year" name="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];}?>" />

                    <input  type="text" placeholder="Article Name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" />

                    <input class="button" type="submit"  name="search" value="Search" />

                    <input class="button" type="submit" name="export" value="Export to PDF" />
                </form>
                <a href="formATable.php"><input class="button" type="submit" name="create" value="create table" /></a>
            </div>
        </div>
    
        <div class="table-con">
            <table>
                <thead>
                    <tr>
                        <th>Article Name</th>
                        <th>Purchase Year</th>
                        <th>Purcahse Price</th>
                        <!-- <th>Master Inventory No</th> -->
                        <th>Department Inventory Number</th>
                        <th>Page No</th>
                        <th>Fixed Assest No</th>
                        <th>Book Balance</th>
                        <th>Total</th>
                        <th>Verified Balance</th>
                        <th>Surplus</th>
                        <th>Deficit</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        
                        $resultinvoice = mysqli_query($con,$queryinvoice);

                        while($rowinvoice = mysqli_fetch_assoc($resultinvoice)){
                        ?>
                            <tr>
                                <td class="name"><?php echo $rowinvoice['description']?></td>
                                <td><?php echo $rowinvoice['purchase_year']?></td>
                                <td><?php echo $rowinvoice['purchase_value']?></td>
                                <!-- <td class="folio_number"><?php echo $rowinvoice['master_inventory_no']?></td> -->
                                <td class="folio_number"><?php echo $rowinvoice['dept_inventory_no']?></td>
                                <td ><?php echo $rowinvoice['page_no']?></td>
                                <td class="folio_number"><?php echo $rowinvoice['fixed_asset_no']?></td>
                                <td><?php echo $rowinvoice['book_balance']?></td>
                                <td><?php echo $rowinvoice['total']?></td>
                                <td><?php echo $rowinvoice['verified_balance']?></td>
                                <td><?php echo $rowinvoice['surplus']?></td>
                                <td><?php echo $rowinvoice['deficit']?></td>
                                <td><?php echo $rowinvoice['remarks']?></td>
                                <td>
                                    <a href="addDataFormA.php?dept_inventory_no=<?php echo $rowinvoice['dept_inventory_no'] ?>" >Edit</a>
                                    <form method="post" action="actionItemFormA.php">
                                    <input type="hidden" name="<?php echo "remove";?>" value="<?php echo $rowinvoice['dept_inventory_no']; ?>">
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