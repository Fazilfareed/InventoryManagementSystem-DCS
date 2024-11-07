<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

$rowsPerPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $rowsPerPage;

$queryinvoice = "SELECT * FROM o_invoice ORDER BY invoice_id DESC LIMIT $offset, $rowsPerPage";

$totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM o_invoice"));
$totalPages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['search'])) {
    $year = $_GET['year'];
    $folio = $_GET['folio'];
    $SN = $_GET['SN'];

    if (!(empty($year)) and !(empty($folio)) and !(empty($SN))) {
        $queryinvoice = "SELECT * FROM o_invoice INNER JOIN o_items ON o_items.invoice_id = o_invoice.invoice_id WHERE o_items.serial_number='$SN' AND EXTRACT(YEAR FROM date)=$year AND folio_number='$folio' ORDER BY name ASC ";
    } else if (!(empty($year)) and !(empty($folio))) {

        $queryinvoice = "SELECT * FROM o_invoice WHERE EXTRACT(YEAR FROM date)=$year AND folio_number='$folio' ORDER BY name ASC  ";
    } elseif (!(empty($year)) and !(empty($SN))) {
        $queryinvoice = "SELECT * FROM o_invoice INNER JOIN o_items ON o_items.invoice_id = o_invoice.invoice_id WHERE o_items.serial_number='$SN' AND EXTRACT(YEAR FROM date)=$year ORDER BY name ASC ";
    } elseif (!(empty($folio)) and !(empty($SN))) {
        $queryinvoice = "SELECT * FROM o_invoice INNER JOIN o_items ON o_items.invoice_id = o_invoice.invoice_id WHERE o_items.serial_number='$SN' AND folio_number='$folio' ORDER BY name ASC ";
    } elseif (!(empty($year))) {
        $queryinvoice = "SELECT * FROM o_invoice WHERE EXTRACT(YEAR FROM date)=$year ORDER BY name ASC ";
    } elseif (!(empty($folio))) {
        $queryinvoice = "SELECT * FROM o_invoice WHERE folio_number='$folio' ORDER BY name ASC ";
    } elseif (!(empty($SN))) {
        $queryinvoice = "SELECT * FROM o_invoice INNER JOIN o_items ON o_items.invoice_id = o_invoice.invoice_id WHERE o_items.serial_number='$SN' ORDER BY name ASC ";
    } else {
        $queryinvoice = "SELECT * FROM o_invoice ORDER BY name ASC ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Equipments</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">

    <style>
        ul .office a {
            background-color: var(--text-color)
        }
    </style>
</head>

<body>
    <?php include("../header/header.php"); ?>




    <div class="main-container">
        <div class="container">
            <h2>Search Office Equipments...</h2>
            <div>
                <form action="office.php" method="get">

                    <input type="number" placeholder="Year" name="year" min="0000" max="<?php echo date("Y"); ?>"
                        value="<?php if (isset($_POST['year'])) {
                                    echo $_POST['year'];
                                } ?>" />

                    <input type="text" placeholder="Folio number" name="folio"
                        value="<?php if (isset($_POST['folio'])) {
                                    echo $_POST['folio'];
                                } ?>" />

                    <input type="text" placeholder="Serial numebr" name="SN"
                        value="<?php if (isset($_POST['SN'])) {
                                    echo $_POST['SN'];
                                } ?>" />

                    <input class="button" type="submit" name="search" value="Search" />

                </form>
            </div>
        </div>

        <div class="table-con">
            <table>
                <thead>
                    <tr>
                        <th>Article Name</th>
                        <th>Purchase Date</th>
                        <th>Purchase Price</th>
                        <!-- <th>Quantity</th> -->
                        <th>Inventory Number</th>
                        <th>Description</th>
                        <th colspan=2>Supplier Details</th>
                        <th>Page Number</th>
                        <!-- <th>Supplier Phone</th>
                        <th>SRN</th>  -->
                        <th>Location</th>
                        <th>Warranty</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $resultinvoice = mysqli_query($con, $queryinvoice);

                    while ($rowinvoice = mysqli_fetch_assoc($resultinvoice)) {
                    ?>
                        <tr>
                            <td class="name"><a
                                    href="officeItems.php?search=true&id=<?php echo $rowinvoice['invoice_id'] ?>"><?php echo $rowinvoice['name'] ?></a>
                            </td>

                            <td><?php echo $rowinvoice['date'] ?></td>

                            <td><?php echo $rowinvoice['price'] ?></td>

                            <!-- <td><?php echo $rowinvoice['quantity'] ?></td> -->

                            <td><?php echo $rowinvoice['folio_number'] ?></td>

                            <td class="description"><?php echo $rowinvoice['description'] ?></td>

                            <td class="sname" colspan=2>
                                <?php
                                echo $rowinvoice['supplier_name'];
                                if (!empty($rowinvoice['srn'])) {
                                    echo "<br>SRN: " . $rowinvoice['srn'];
                                }
                                if (!empty($rowinvoice['supplier_tt'])) {
                                    echo "<br>Telephone no: " . $rowinvoice['supplier_tt'];
                                }

                                ?>
                            </td>

                            <td><?php echo $rowinvoice['page_number'] ?></td>
                            <!-- <td><?php //echo $rowinvoice['supplier_tt'] 
                                        ?></td>
                            <td><?php //echo $rowinvoice['srn'] 
                                ?></td> -->
                            <td><?php echo $rowinvoice['location'] ?></td>

                            <td>
                                <?php
                                // Purchase date and warranty period (in months)
                                $purchaseDate = $rowinvoice['date'];
                                $warrantyMonths = $rowinvoice['warranty'];

                                // Convert the purchase date to a DateTime object
                                $purchaseDateObj = new DateTime($purchaseDate);
                                // Add the warranty period (in months) to the purchase date
                                $purchaseDateObj->modify("+$warrantyMonths months");
                                // Get the current date
                                $currentDate = new DateTime();

                                // Check if (purchase date + warranty) > current date
                                if ($purchaseDateObj > $currentDate) {
                                    // Calculate the difference in days between the current date and the warranty end date
                                    $interval = $currentDate->diff($purchaseDateObj);
                                    echo
                                    $interval->y . " years<br>"
                                        . $interval->m . " months<br>"
                                        . $interval->d . " days<br>left";
                                } else {
                                    // Warranty has expired
                                    echo "expired";
                                }
                                ?>
                            </td>

                            <td>
                                <a href="addData.php?id=<?php echo $rowinvoice['invoice_id'] ?>">Edit</a>
                                <form method="post" action="actionItem.php">
                                    <input type="hidden" name="<?php echo "remove"; ?>"
                                        value="<?php echo $rowinvoice['invoice_id']; ?>">
                                    <button class="logout" type="submit"
                                        onclick="return confirm('Are you sure to remove this record ?')"
                                        style="margin:5px;background-color: #ff0000; color: #ffffff; border: none; padding: 5px 10px; cursor: pointer;">Remove</button>
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
                        if ($(this).width() > 250) {
                            $(this).removeClass('description').addClass('description expandable');
                            $(this).closest('tr').after('<tr><td class="description expandable">' + $(this).text() + '</td></tr>');
                        }
                    });
                });
                $(document).ready(function() {
                    $('.name').each(function() {
                        if ($(this).width() > 250) {
                            $(this).removeClass('name').addClass('name expandable');
                            $(this).closest('tr').after('<tr><td class="name expandable">' + $(this).text() + '</td></tr>');
                        }
                    });
                });
                $(document).ready(function() {
                    $('.sname').each(function() {
                        if ($(this).width() > 250) {
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