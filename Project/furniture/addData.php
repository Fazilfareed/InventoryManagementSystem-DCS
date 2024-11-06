<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}


$queryinvoice = "SELECT * FROM f_invoice";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = "SELECT * FROM f_invoice WHERE invoice_id = $id";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $query2 = "SELECT * FROM f_items WHERE invoice_id = $id";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_assoc($result2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
    <style>
        body{
            background: #ececec;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        form {
            margin: auto;
            width: 800px;
            box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.5);
            background-color: #d4d4d4;
            padding: 30px;
            padding-bottom: 50px;
        }

        h2 {
            margin: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("../header/header.php"); ?>
    <h2><?php if (isset($_GET['id'])) {
            echo "Update Furniture Invoice";
        } else {
            echo "Add Furniture Invoice";
        } ?></h2>

    <form action="actionItem.php" method="POST">

        <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['invoice_id'];
                                                } ?> " /> <br>

        <label for="aName">Article Name</label>
        <input type="text" name="aname" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_name'];
                                                } ?>" required /> <br>

        <label for="date">Date</label> 
        <input type="date" name="date" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_date'];
                                                } ?>" required /><br>

        <label for="price">Price(Per Unit)</label>
        <input type="number" name="price" value="" /><br>

        <label for="quantity">Quantity</label> 
        <input type="number" name="quantity" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['f_quantity'];
                                                    } ?>" required /><br>

        <label for="warranty">Warranty Period</label> 
        <input type="number" name="warranty" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['warranty'];
                                                    } ?>" placeholder="In months" required /><br>

        <label for="folio">Folio Number</label> 
        <input type="text" name="folio" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_folio_number'];
                                                } ?>" required /><br>

        <label for="description">Description</label>
        <textarea name="description" rows="10"><?php if (isset($_GET['id'])) {
                                                                echo $row1['f_description'];
                                                            } ?></textarea> <br><br><br>

        <label for="sName">Supplier Name</label> 
        <input type="text" name="sName" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_supplier_name'];
                                                } ?>" required /> <br>

        <label for="s_tp">Supplier T.P.</label> 
        <input type="number" name="s_tp" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_supplier_tt'];
                                                } ?>" /> <br>

        <label for="srn">SRN Number</label> 
        <input type="number" name="srn" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['f_srn'];
                                                } ?>" /> <br>

        <label for="pageNumber">Page Number</label>
        <input type="text" name="pageNumber" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['page_number'];
                                                    } ?>" /> <br>

        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['location'];
                                                    } ?>" required /> <br>

        <input class="button" type="submit" name="<?php if (isset($_GET['id'])) {
                                                        echo "update";
                                                    } else {
                                                        echo "padd";
                                                    } ?>" value="<?php if (isset($_GET['id'])) {
                                                                                                                                echo "Update";
                                                                                                                            } else {
                                                                                                                                echo "Add";
                                                                                                                            } ?>" style="width: 25%;" /> <br>
    </form>
</body>

</html>