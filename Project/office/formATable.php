<?php
include("../config/connection.php");

$query = "DELETE FROM o_forma_table";
$result = mysqli_query($con, $query);

$result1 = mysqli_query($con, "SELECT * FROM o_invoice");

while ($row1 = mysqli_fetch_assoc($result1)) {
    $id = $row1['invoice_id'];
    $description = $row1['name'];
    $year = date('Y', strtotime($row1['date']));
    $value = $row1['price'] * $row1['quantity'];
    $dept_inventory_no = $row1['folio_number'];
    $pg_no = $row1['page_number'];

    //need to check the items is it working or not if it is add
    $result2 = mysqli_query($con, "SELECT * FROM o_items where invoice_id='$id' and working='yes'");
    $rowCount2 = mysqli_num_rows($result2);

    $book_balanced = $rowCount2;

    // Insert into formb_table
    $query2 = "INSERT INTO o_forma_table (description, purchase_year, purchase_value, master_inventory_no, dept_inventory_no, page_no, fixed_asset_no, book_balance, total, verified_balance, surplus, deficit, remarks) VALUES ('$description', '$year', '$value', '', '$dept_inventory_no', '$pg_no', '', '$book_balanced','','','','','')";
    mysqli_query($con, $query2);
}

if (mysqli_error($con)) {
    echo "Error inserting data: " . mysqli_error($con);
} else {
    echo "<script>window.location.href='officeForm_A.php';</script>";
}
