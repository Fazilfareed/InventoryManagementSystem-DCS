<?php
require('fpdf/fpdf.php');
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

$rowsPerPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $rowsPerPage;

$queryinvoice = "SELECT * FROM f_forma_table ORDER BY description ASC LIMIT $offset, $rowsPerPage";

$totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM f_forma_table"));
$totalPages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['exportXL'])) {
    // Set appropriate headers for downloading
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="furniture_form_A.csv"');
    header('Cache-Control: max-age=0');
    // header('Cache-Control: no-store, no-cache, must-revalidate');

    // Open output stream for writing
    $output = fopen('php://output', 'I');

    // Write column headers to the CSV
    $columnHeaders = ['Description of Item', 'Purchase Year', 'Purchase Value', 'Dept. Inventory No', 'Page No', 'Fixed Assets No', 'Book Balance', 'Total', 'Verified Balance', 'Surplus', 'Dificit', 'Remarks'];
    fputcsv($output, $columnHeaders);


    if (isset($_GET['year']) && !empty($_GET['year'])) {
        $purchase_year = mysqli_real_escape_string($con, $_GET['year']);
        $queryinvoice = "SELECT * FROM f_forma_table where purchase_year <= $purchase_year  ORDER BY description ASC";
    } else {
        $queryinvoice = "SELECT * FROM f_forma_table ORDER BY description ASC";
    }


    $resultinvoice1 = mysqli_query($con, $queryinvoice);

    // Fetch data and write to the CSV
    while ($rowinvoice1 = mysqli_fetch_assoc($resultinvoice1)) {
        if ($rowinvoice1['total'] == 0) {
            $total = '';
        } else {
            $total = $rowinvoice1['total'];
        }
        $rowData = [
            $rowinvoice1['description'],
            $rowinvoice1['purchase_year'],
            $rowinvoice1['purchase_value'],
            $rowinvoice1['dept_inventory_no'],
            $rowinvoice1['page_no'],
            $rowinvoice1['fixed_asset_no'],
            $rowinvoice1['book_balance'],
            $total,
            $rowinvoice1['verified_balance'],
            $rowinvoice1['surplus'],
            $rowinvoice1['deficit'],
            $rowinvoice1['remarks']
        ];
        fputcsv($output, $rowData);
    }

    // Close the output stream
    fclose($output);
    exit();
}

if (isset($_GET['export'])) {

    if (isset($_GET['year']) && !empty($_GET['year'])) {
        $purchase_year = mysqli_real_escape_string($con, $_GET['year']);
        $queryinvoice = "SELECT * FROM f_forma_table where purchase_year <= $purchase_year ORDER BY description ASC";
    } else {
        $queryinvoice = "SELECT * FROM f_forma_table ORDER BY description ASC";
    }

    error_log("Export Query: " . $queryinvoice);

    $resultinvoice1 = mysqli_query($con, $queryinvoice);

    // Error handling for query execution
    if (!$resultinvoice1) {
        error_log("Query Error: " . mysqli_error($con));
        die("Database query failed.");
    }



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
            $this->SetXY(87, $this->GetY() - 10); // Adjust cursor position after MultiCell
            $this->Cell(25, 10, 'Purchase Value', 1, 0, 'C');
            $this->Cell(40, 10, 'Dept. Inventory No', 1, 0, 'C');
            $this->Cell(15, 10, 'Page No.', 1, 0, 'C');
            $this->MultiCell(40, 5, 'Fixed Assets No' . "\n" . '()', 1, 'C');
            $this->SetXY(207, $this->GetY() - 10); // Adjust cursor position after MultiCell
            $this->MultiCell(15, 5, 'Book' . "\n" . 'Balance', 1, 'C');
            $this->SetXY(222, $this->GetY() - 10); // Adjust cursor position after MultiCell
            $this->Cell(10, 10, 'Total', 1, 0, 'C');
            $this->MultiCell(15, 5, 'Verified' . "\n" . 'Balance', 1, 'C');
            $this->SetXY(247, $this->GetY() - 10); // Adjust cursor position after MultiCell
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

        function CheckPageBreak($h)
        {
            $footerHeight = 70;
            if ($this->GetY() + $h > ($this->h - $footerHeight)) {
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
        if ($rowinvoice1['total'] == 0) {
            $pdf->Cell(10, 5, '', 1);
        } else {
            $pdf->Cell(10, 5, $rowinvoice1['total'], 1);
        }
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

if (isset($_GET['search'])) {
    $purchase_year = $_GET['year'];


    if (!(empty($purchase_year))) {
        $queryinvoice = "SELECT * FROM f_forma_table WHERE purchase_year <= $purchase_year ORDER BY description ASC";
    } else {
        $queryinvoice = "SELECT * FROM f_forma_table ORDER BY description ASC";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM A</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        ul .furniture a {
            background-color: var(--text-color)
        }
    </style>
</head>

<body>
    <?php include("../header/header.php"); ?>
    <hr>

    <div class="main-container">
        <div class="container">
            <h2>FORM A</h2>
            <div>
                <a href="formATable.php"><input class="button" type="submit" name="create" value="create table" /></a>
                <form action="furnitureForm_A.php" method="get">
                    <input type="number" placeholder="Year" name="year" min="0000" max="<?php echo date("Y"); ?>" value="<?php if (isset($_POST['year'])) {
                                                                                                                                echo $_POST['year'];
                                                                                                                            } ?>" />

                    <input class="button" type="submit" name="search" value="Search" />
                    <?php if (isset($_GET['year'])) { ?>
                        <a href="furnitureForm_A.php?exportXL=true&year=<?php echo urlencode($_GET['year']); ?>"><input class="button" value="Export to Excel" /></a>
                        <a href="furnitureForm_A.php?export=true&year=<?php echo urlencode($_GET['year']); ?>"><input class="button" value="Export to PDF" /></a>

                    <?php } else { ?>
                        <input class="button" type="submit" name="exportXL" value="Export to Excel" />
                        <input class="button" type="submit" name="export" value="Export to PDF" />
                    <?php } ?>

                </form>


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

                    $resultinvoice = mysqli_query($con, $queryinvoice);

                    while ($rowinvoice = mysqli_fetch_assoc($resultinvoice)) {
                    ?>
                        <tr>
                            <td class="name"><?php echo $rowinvoice['description'] ?></td>
                            <td><?php echo $rowinvoice['purchase_year'] ?></td>
                            <td><?php echo $rowinvoice['purchase_value'] ?></td>
                            <!-- <td class="folio_number"><?php echo $rowinvoice['master_inventory_no'] ?></td> -->
                            <td class="folio_number"><?php echo $rowinvoice['dept_inventory_no'] ?></td>
                            <td><?php echo $rowinvoice['page_no'] ?></td>
                            <td class="folio_number"><?php echo $rowinvoice['fixed_asset_no'] ?></td>
                            <td><?php echo $rowinvoice['book_balance'] ?></td>
                            <td><?php if ($rowinvoice['total'] == 0) {
                                    echo '';
                                } else {
                                    echo $rowinvoice['total'];
                                } ?></td>
                            <td><?php echo $rowinvoice['verified_balance'] ?></td>
                            <td><?php echo $rowinvoice['surplus'] ?></td>
                            <td><?php echo $rowinvoice['deficit'] ?></td>
                            <td><?php echo $rowinvoice['remarks'] ?></td>
                            <td>
                                <a href="addDataFormA.php?dept_inventory_no=<?php echo $rowinvoice['dept_inventory_no'] ?>">Edit</a>
                                <form method="post" action="actionItemFormA.php">
                                    <input type="hidden" name="<?php echo "remove"; ?>" value="<?php echo $rowinvoice['dept_inventory_no']; ?>">
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
            </script>
        </div>

        <div class="pagination" style="margin:15px;">
            <?php
            if (!isset($_GET['search'])) {
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '" style="margin:1px;background-color: #fff; color: #1690A7; border: none; padding: 5px 10px; cursor: pointer; width:5px;">' . $i . '</a>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>