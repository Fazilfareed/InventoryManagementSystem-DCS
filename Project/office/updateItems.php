<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}

$queryinvoice = "SELECT * FROM o_invoice";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['id']) && isset($_GET['setid'])) {
    $id = $_GET['id'];
    $setid = $_GET['setid'];
    $query1 = "SELECT * FROM o_items WHERE set_id = '$setid' AND invoice_id='$id'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    if (!$result1) {
        die("Database query failed.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
    <style>
        body{
            background: #ececec;
            padding-top: 50px;
            padding-bottom: 400px;
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
    <h2>Update Office Items</h2>

    <form action="actionItem.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $row1['invoice_id']; ?> " /> <br>

        <label for="setid">Set Id</label>
        <input type="text" name="setid" value="<?php if (isset($_GET['setid']) && isset($_GET['id'])) {
                                                    echo $row1['set_id'];
                                                } ?>" required /> <br>

        <label for="item">Item</label> 
        <input type="text" name="item" value="<?php if (isset($_GET['setid']) && isset($_GET['id'])) {
                                                    echo $row1['item'];
                                                } ?>" /><br>


        <label for="serial_number">Serial number</label> 
        <input type="text" name="serial_number" value="<?php if (isset($_GET['setid']) && isset($_GET['id'])) {
                                                            echo $row1['serial_number'];
                                                        } ?>" /><br>

        <label for="location">Location</label> 
        <input type="text" name="location" value="<?php if (isset($_GET['setid']) && isset($_GET['id'])) {
                                                        echo $row1['location'];
                                                    } ?>" required /><br>

        <div class="radio-group">
            <div><input type="radio" name="working" value="Yes" <?php if (isset($row1['working']) && $row1['working'] == 'yes') echo 'checked'; ?> /> Yes</div>
            <div><input type="radio" name="working" value="No" <?php if (isset($row1['working']) && $row1['working'] == 'no') echo 'checked'; ?> /> No</div>
            <div><input type="radio" name="working" value="R" <?php if (isset($row1['working']) && $row1['working'] == 'R') echo 'checked'; ?> /> R</div>
            <div><input type="radio" name="working" value="S" <?php if (isset($row1['working']) && $row1['working'] == 'S') echo 'checked'; ?> /> S</div>
            <div><input type="radio" name="working" value="D" <?php if (isset($row1['working']) && $row1['working'] == 'D') echo 'checked'; ?> /> D</div>
            <div><input type="radio" name="working" value="T" <?php if (isset($row1['working']) && $row1['working'] == 'T') echo 'checked'; ?> /> T</div>
        </div>
        <br>
        <input class="button" type="submit" name="setupdate" value="Update" style="width: 25%;" /> <br>
    </form>
</body>

</html>