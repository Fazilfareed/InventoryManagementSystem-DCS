<?php
include("../config/connection.php");

session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}



if (isset($_POST['update'])) {

    $description = $_POST['description'];
    $purchase_year = $_POST['purchase_year'];
    $purchase_value = $_POST['purchase_value'];
    $page_no = $_POST['page_no'];
    $dept_inventory_no = $_POST['dept_inventory_no'];
    $fixed_asset_no = $_POST['fixed_asset_no'];
    $book_balance = $_POST['book_balance'];
    $total = $_POST['total'];
    $verified_balance = $_POST['verified_balance'];
    $surplus = $_POST['surplus'];
    $deficit = $_POST['deficit'];
    $remarks = $_POST['remarks'];
    

    $query = "UPDATE f_forma_table SET description='$description',purchase_year='$purchase_year',purchase_value='$purchase_value',dept_inventory_no='$dept_inventory_no',page_no='$page_no',fixed_asset_no='$fixed_asset_no',book_balance='$book_balance',total='$total',verified_balance='$verified_balance',surplus='$surplus',deficit='$deficit',remarks='$remarks' where dept_inventory_no='$dept_inventory_no'";

    $result = mysqli_query($con, $query);
    if ($result) {
        header("location: furnitureForm_A.php");
    }
}


if (isset($_POST['remove'])) {
     $dept_inventory_no = $_POST['remove'];
    $query1 = "DELETE FROM f_forma_table WHERE dept_inventory_no='$dept_inventory_no'";
    $result = mysqli_query($con, $query1);
    // $query2 = "DELETE FROM invoice WHERE invoice_id='$id'";
    // $result = mysqli_query($con, $query2);
    if ($result) {
        header("location: furnitureForm_A.php");
    }
}
