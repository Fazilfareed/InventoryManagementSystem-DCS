<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

$queryinvoice = "SELECT * FROM o_forma_table";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['dept_inventory_no'])) {
    $dept_inventory_no = $_GET['dept_inventory_no'];
    $query1 = "SELECT * FROM o_forma_table WHERE dept_inventory_no = '$dept_inventory_no'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_assoc($result1);
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
        form {
            margin: auto;
            width: 800px;
        }

        h2 {
            margin: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("../header/header.php"); ?>
    <h2><?php if (isset($_GET['dept_inventory_no'])) {
            echo "Update Form B";
        }  ?></h2>

    <form action="actionItemFormA.php" method="POST">


        <label for="description">Article Name</label> <br>
        <input type="text" name="description" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                            echo $row1['description'];
                                                        }
                                                        ?>" readonly /> <br>



        <label for="purchase_year">Purchase Year</label> <br>
        <input type="number" name="purchase_year" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                                echo $row1['purchase_year'];
                                                            } ?>" readonly /><br>


        <label for="purchase_value">Purchase Price</label> <br>
        <input type="number" name="purchase_value" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                                echo $row1['purchase_value'];
                                                            } ?>" readonly /><br>



        <label for="dept_inventory_no">Department Inventory No</label> <br>
        <input type="text" name="dept_inventory_no" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                                echo $row1['dept_inventory_no'];
                                                            } ?>" readonly /> <br>

        <label for="page_no">Page No</label> <br>
        <input type="text" name="page_no" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo $row1['page_no'];
                                                    } ?>" readonly /> <br>

        <label for="fixed_asset_no">Fixed Asset No</label> <br>
        <input type="text" name="fixed_asset_no" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                            echo $row1['fixed_asset_no'];
                                                        } ?>" /> <br>

        <label for="book_balance">Book Balance</label> <br>
        <input type="number" name="book_balance" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                            echo $row1['book_balance'];
                                                        } ?>" readonly /> <br>


        <label for="total">Total</label> <br>
        <input type="number" name="total" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo $row1['total'];
                                                    } ?>" /> <br>


        <label for="verified_balance">Verified Balance</label> <br>
        <input type="text" name="verified_balance" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                                echo $row1['verified_balance'];
                                                            } ?>" /> <br>


        <label for="surplus">Surplus</label> <br>
        <input type="text" name="surplus" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo $row1['surplus'];
                                                    } ?>" /> <br>


        <label for="deficit">Deficit</label> <br>
        <input type="text" name="deficit" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo $row1['deficit'];
                                                    } ?>" /> <br>


        <label for="remarks">Remarks</label> <br>
        <input type="text" name="remarks" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo $row1['remarks'];
                                                    } ?>" /> <br>

        <br><br>
        <input class="button" type="submit" name="<?php if (isset($_GET['dept_inventory_no'])) {
                                                        echo "update";
                                                    }  ?>" value="<?php if (isset($_GET['dept_inventory_no'])) {
                                                                        echo "Update";
                                                                    } ?>" style="width: 75%;" /> <br>
    </form>
</body>

</html>