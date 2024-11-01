<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: ../login/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Equipments</title>
    <link rel="stylesheet" href="../css/lab.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <?php include("../header/header.php"); ?>
    <hr>

    <div class="main-container">

        <?php
        if (isset($_GET['searchItems'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM items WHERE invoice_id = $id";
            $result = mysqli_query($con, $query);

            if (!$result) {
                die("Database query failed.");
            }

            // Check if any row has category 'laptop'
            $hasLaptop = false;
            while ($rowCheck = mysqli_fetch_assoc($result)) {
                if ($rowCheck['category'] == 'laptop') {
                    $hasLaptop = true;
                    break;
                }
            }
            // Reset the result pointer
            mysqli_data_seek($result, 0);

            if (mysqli_num_rows($result) > 0) {
        ?>

                <div class="table-con" style="background-color:white;margin-bottom:10px;padding:2px;">
                    <?php
                    $query1 = "SELECT 	folio_number FROM invoice WHERE invoice_id = $id";
                    $result1 = $con->query($query1);

                    if ($result1) {
                        // Fetch the single row from the result
                        $row = $result1->fetch_assoc();

                        // Access the specific column
                        $value = $row['folio_number'];

                        // Output the value
                        echo "<b>Folio Numbers :</b> $value";
                    } else {
                        echo "Query error: " . $con->error;
                    }
                    ?>
                </div>
                <div class="table-con">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Item</th>
                                <th>serial_number</th>
                                <?php if ($hasLaptop) { ?>
                                    <th>Model Number</th>
                                <?php } ?>
                                <th>location</th>
                                <th>working</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>

                                    <td hidden="hidden"><?php echo $row['invoice_id'] ?></a></td>
                                    <td>
                                        <?php
                                        echo $row['set_id'];
                                        ?>
                                        </a></td>
                                    <td><?php echo $row['category'] ?></a></td>
                                    <td><?php echo $row['item'] ?></td>
                                    <td><?php echo $row['serial_number'] ?></td>
                                    <?php if ($row['category'] == 'laptop') { ?>
                                        <td><?php echo $row['model_number'] ?></td>
                                    <?php } ?>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['working'] ?></td>
                                    <td>
                                        <a href="updateItems.php?id=<?php echo $row['invoice_id'] ?>&setid=<?php echo $row['set_id'] ?>&item=<?php echo $row['item']; ?>">Edit</a>
                                    </td>
                                </tr>
                    <?php
                            }
                        } else {
                            // theres no rows
                            echo "No data";
                        }
                    }
                    ?>
                        </tbody>
                    </table>
                </div>

    </div>
</body>

</html>