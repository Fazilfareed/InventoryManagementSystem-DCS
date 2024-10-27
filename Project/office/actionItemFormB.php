<?php
include("../config/connection.php");

session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}



if (isset($_POST['update'])) {

    $article = $_POST['article'];
    $quantity = $_POST['quantity'];
    $sdrt = $_POST['sdrt'];
    $master_inventory_no = $_POST['master_inventory_no'];
    $dept_Inventory_no = $_POST['dept_Inventory_no'];
    $fixed_asset_no = $_POST['fixed_asset_no'];
    $remarks = $_POST['remarks'];
    

    $query = "UPDATE o_formb_table SET article='$article',quantity='$quantity',sdrt='$sdrt',master_inventory_no='$master_inventory_no',dept_Inventory_no='$dept_Inventory_no',fixed_asset_no='$fixed_asset_no',remarks='$remarks' where dept_Inventory_no='$dept_Inventory_no'";

    $result = mysqli_query($con, $query);
    if ($result) {
        header("location: officeForm_B.php");
    }
}


if (isset($_POST['remove'])) {
     $dept_Inventory_no = $_POST['remove'];
    $query1 = "DELETE FROM o_formb_table WHERE dept_Inventory_no='$dept_Inventory_no'";
    $result = mysqli_query($con, $query1);
    // $query2 = "DELETE FROM invoice WHERE invoice_id='$id'";
    // $result = mysqli_query($con, $query2);
    if ($result) {
        header("location: officeForm_B.php");
    }
}
