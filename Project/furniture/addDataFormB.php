<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

$queryinvoice = "SELECT * FROM f_formb_table";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['dept_Inventory_no'])) {
    $dept_Inventory_no = $_GET['dept_Inventory_no'];
    $query1 = "SELECT * FROM f_formb_table WHERE dept_Inventory_no = '$dept_Inventory_no'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    // $query2 = "SELECT * FROM items WHERE invoice_id = $id";
    // $result2 = mysqli_query($con, $query2);
    // $row2 = mysqli_fetch_assoc($result2);
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
        body {
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
    <h2><?php if (isset($_GET['dept_Inventory_no'])) {
            echo "Update Form B";
        }  ?></h2>

    <form action="actionItemFormB.php" method="POST">


        <label for="article">Article Name</label>

        <input type="text" name="article" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo $row1['article'];
                                                    } else {
                                                        echo "ssss";
                                                    } ?>" readonly /> <br>



        <label for="quantity">Quantity</label> 
        <input type="number" name="quantity" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo $row1['quantity'];
                                                    } ?>" /><br>


        <label for="sdrt">S/D/R/T</label>
        <input type="text" name="sdrt" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['sdrt'];
                                                } ?>" readonly /><br>



        <label for="master_inventory_no">Master Inventory No</label> 
        <input type="text" name="master_inventory_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                                    echo $row1['master_inventory_no'];
                                                                } ?>" /> <br>

        <label for="dept_Inventory_no">Department Inventory No</label> 
        <input type="text" name="dept_Inventory_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                                echo $row1['dept_Inventory_no'];
                                                            } ?>" readonly /> <br>

        <label for="fixed_asset_no">Fixed Asset No</label> 
        <input type="text" name="fixed_asset_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                            echo $row1['fixed_asset_no'];
                                                        } ?>" /> <br>


        <label for="remarks">Remarks</label> 
        <input type="text" name="remarks" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo $row1['remarks'];
                                                    } ?>" /> <br>

        <input class="button" type="submit" name="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo "update";
                                                    }  ?>" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                                        echo "Update";
                                                                    } ?>" style="width: 25%;" /> <br>
    </form>
</body>

</html>
