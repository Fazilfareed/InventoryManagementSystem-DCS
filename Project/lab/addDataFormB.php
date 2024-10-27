<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

$queryinvoice = "SELECT * FROM formb_table";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['dept_Inventory_no'])) {
    $dept_inventory_no = $_GET['dept_Inventory_no'];
    $query1 = "SELECT * FROM formb_table WHERE dept_Inventory_no = '$dept_inventory_no'";
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
    <h2><?php if (isset($_GET['dept_Inventory_no'])) {
            echo "Update Form B";
        }  ?></h2>

    <form action="actionItemFormB.php" method="POST">


        <label for="article">Article Name</label> <br>
        
        <input type="text" name="article" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['article'];
                                                }
                                                else{
                                                    echo "ssss";
                                                } ?>" required /> <br>

        

        <label for="quantity">Quantity</label> <br>
        <input type="number" name="quantity" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo $row1['quantity'];
                                                    } ?>" required /><br>


        <label for="sdrt">S/D/R/T</label> <br>
        <input type="text" name="sdrt" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['sdrt'];
                                                } ?>" required /><br>

        

        <label for="master_inventory_no">Master Inventory No</label> <br>
        <input type="text" name="master_inventory_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['master_inventory_no'];
                                                } ?>" required /> <br>

        <label for="dept_Inventory_no">Department Inventory No</label> <br>
        <input type="text" name="dept_Inventory_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['dept_Inventory_no'];
                                                } ?>" required /> <br>

        <label for="fixed_asset_no">Fixed Asset No</label> <br>
        <input type="text" name="fixed_asset_no" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['fixed_asset_no'];
                                                } ?>" required /> <br>


        <label for="remarks">Remarks</label> <br>
        <input type="text" name="remarks" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                    echo $row1['remarks'];
                                                } ?>" required /> <br>

        <br><br>
        <input class="button" type="submit" name="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                        echo "update";
                                                    }  ?>" value="<?php if (isset($_GET['dept_Inventory_no'])) {
                                                                        echo "Update";
                                                                    } ?>" style="width: 75%;" /> <br>
    </form>
</body>

</html>