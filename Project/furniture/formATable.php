<?php
include("../config/connection.php");

$query = "DELETE FROM f_forma_table";
$result = mysqli_query($con, $query);

$result1 = mysqli_query($con, "SELECT * FROM f_invoice ORDER BY f_name ASC");
function insertIntoFormaTable($con, $description, $year, $value, $dept_inventory_no, $pg_no, $book_balanced)
{
    $query = "INSERT INTO f_forma_table (description, purchase_year, purchase_value, master_inventory_no, dept_inventory_no, page_no, fixed_asset_no, book_balance, total, verified_balance, surplus, deficit, remarks) 
                  VALUES ('$description', '$year', '$value', '', '$dept_inventory_no', '$pg_no', '', '$book_balanced', 0, '', '', '', '')";
    mysqli_query($con, $query);
}
while ($row1 = mysqli_fetch_assoc($result1)) {
    $id = $row1['invoice_id'];
    $description = $row1['f_name'];
    $year = date('Y', strtotime($row1['f_date']));
    $value = $row1['f_price'] * $row1['f_quantity'];
    $dept_inventory_no = $row1['f_folio_number'];
    $pg_no = $row1['page_number'];

    //need to check the items is it working or not if it is add
    $result = mysqli_query($con, "SELECT COUNT(*) as count FROM f_items WHERE invoice_id='$id' AND working='yes'");

    while ($row = mysqli_fetch_assoc($result)) {
        $book_balanced = $row['count'];
        insertIntoFormaTable($con, $description, $year, $value, $dept_inventory_no, $pg_no, $book_balanced);
    }
}

if (mysqli_error($con)) {
    echo "Error inserting data: " . mysqli_error($con);
} else {
    echo "<script>window.location.href='furnitureForm_A.php';</script>";
}
