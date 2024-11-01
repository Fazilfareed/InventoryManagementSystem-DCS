<?php
include("../config/connection.php");

$query = "DELETE FROM forma_table";
$result = mysqli_query($con, $query);

$result1 = mysqli_query($con, "SELECT * FROM invoice ORDER BY name ASC");
function insertIntoFormaTable($con, $description, $year, $value, $dept_inventory_no, $pg_no, $book_balanced)
{
    $query = "INSERT INTO forma_table (description, purchase_year, purchase_value, master_inventory_no, dept_inventory_no, page_no, fixed_asset_no, book_balance, total, verified_balance, surplus, deficit, remarks) 
                  VALUES ('$description', '$year', '$value', '', '$dept_inventory_no', '$pg_no', '', '$book_balanced', '', '', '', '', '')";
    mysqli_query($con, $query);
}
while ($row1 = mysqli_fetch_assoc($result1)) {
    $id = $row1['invoice_id'];
    $description = $row1['name'];
    $year = date('Y', strtotime($row1['date']));
    $value = $row1['price'] * $row1['quantity'];
    $dept_inventory_no = $row1['folio_number'];
    $pg_no = $row1['page_number'];
    $type = $row1['type'];



    // Insert into forma_table
    if ($type == "desktop") {
        $items = ["System Unit", "Monitor", "Mouse", "Keyboard"];
        $itemList = "'" . implode("','", $items) . "'"; // Create a string for SQL IN clause

        // Fetch all relevant items in one query
        $result = mysqli_query($con, "SELECT item, COUNT(*) as count FROM items WHERE invoice_id='$id' AND working='yes' AND item IN ($itemList) GROUP BY item");

        while ($row = mysqli_fetch_assoc($result)) {
            $description = $row['item'];
            $book_balanced = $row['count'];
            insertIntoFormaTable($con, $description, $year, $value, $dept_inventory_no, $pg_no, $book_balanced);
        }
    } else if (in_array($type, ["laptop", "electronic"])) {
        $result = mysqli_query($con, "SELECT item, COUNT(*) as count FROM items WHERE invoice_id='$id' AND working='yes' GROUP BY item");

        while ($row = mysqli_fetch_assoc($result)) {
            $description = $row['item'];
            $book_balanced = $row['count'];
            insertIntoFormaTable($con, $description, $year, $value, $dept_inventory_no, $pg_no, $book_balanced);
        }
    }
}

if (mysqli_error($con)) {
    echo "Error inserting data: " . mysqli_error($con);
} else {
    echo "<script>window.location.href='labForm_A.php';</script>";
}
