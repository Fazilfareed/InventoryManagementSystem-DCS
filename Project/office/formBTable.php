<?php
include("../config/connection.php");


$query = "DELETE FROM o_formb_table";
$result = mysqli_query($con, $query);


// Select all items where 'working' is 'no'
$result1 = mysqli_query($con, "SELECT * FROM o_items WHERE working != 'yes'");
//$result1 = mysqli_query($con,"SELECT * FROM o_invoice");

while ($row1 = mysqli_fetch_assoc($result1)) {
    //$article = $row1['name'];
    $sdrt = $row1['working'];
    $dept_Inventory_no = $row1['set_id'];
    // if ($article == "Serial_number" || $article == "Model_number") {
    //     // Get the corresponding name from the invoice table
        
    // }

    $invoice_id = $row1['invoice_id'];
    $invoice_query = "SELECT name FROM o_invoice WHERE invoice_id = '$invoice_id'";
    $invoice_result = mysqli_query($con, $invoice_query);

    if ($invoice_row = mysqli_fetch_assoc($invoice_result)) {
        $article = $invoice_row['name'];
    }

    // Insert into formb_table
    $query2 = "INSERT INTO o_formb_table (article, quantity, sdrt, master_inventory_no, dept_Inventory_no, fixed_asset_no, remarks) 
               VALUES ('$article', '', '$sdrt', '', '$dept_Inventory_no', '', '')";
    mysqli_query($con, $query2);
}

echo "<script>window.location.href='officeForm_B.php';</script>"

?>
