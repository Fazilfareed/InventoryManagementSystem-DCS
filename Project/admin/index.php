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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/lab.css">
    <title>Inventory Management System</title>
    <style>
        .main-container {
            padding: 20px;
            min-height: 100vh;
            height: fit-content;
            background: rgb(195, 193, 193);
            margin: auto;
        }

        .animation-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            /* height: 150vh; */
            padding: 20px;
            padding-bottom: 20px;
        }

        .dashboard-summary {
            width: 80%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
        }

        th {
            background-color: #0056b3;
            color: white;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #004085;
            width: 25%;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            transition: background-color 0.3s;
        }

        td:hover {
            background-color: #e9ecef;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        .alerts-box {
            margin-top: 20px;
            width: 80%;
            display: flex;
            justify-content: space-between;
        }

        .alerts,
        .pie-chart {
            width: 48%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            height: 400px;
            overflow: hidden;
        }

        .scrollable-table {
            max-height: 200px;
            overflow-y: auto;
        }

        .pie-chart {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #myPieChart {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .items-not-working {
            width: 60%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            height: 400px;
            overflow: hidden;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include "../header/header.php"; ?>
    <div class="main-container">
        <div class="animation-container">
            <div class="dashboard-summary">
                <h2>Total Summary</h2>
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Total Quantity</th>
                        <th>Total Cost</th>
                    </tr>
                    <?php
                    $officeQuery = "SELECT SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost FROM o_invoice";
                    $officeResult = mysqli_query($con, $officeQuery);
                    $officeData = mysqli_fetch_assoc($officeResult);

                    $labQuery = "
                    SELECT type, SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost 
                    FROM invoice 
                    GROUP BY type";
                    $labResult = mysqli_query($con, $labQuery);

                    $furnitureQuery = "SELECT SUM(f_quantity) AS total_quantity, SUM(f_price * f_quantity) AS total_cost FROM f_invoice";
                    $furnitureResult = mysqli_query($con, $furnitureQuery);
                    $furnitureData = mysqli_fetch_assoc($furnitureResult);

                    echo "<tr><td>Office Equipment</td><td>{$officeData['total_quantity']}</td><td>Rs.{$officeData['total_cost']}</td></tr>";

                    $labTotalQuantity = 0;
                    while ($labData = mysqli_fetch_assoc($labResult)) {
                        echo "<tr><td>Lab Equipment - {$labData['type']}</td><td>{$labData['total_quantity']}</td><td>Rs.{$labData['total_cost']}</td></tr>";
                        $labTotalQuantity += $labData['total_quantity'];
                    }
                    echo "<tr><td>Furniture</td><td>{$furnitureData['total_quantity']}</td><td>Rs.{$furnitureData['total_cost']}</td></tr>";
                    ?>

                </table>
            </div>
            <div class="alerts-box">
                <div class="alerts">
                    <h2>Alerts: Warranty Remaining</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Folio Number</th>
                            <th>Remaining (Months)</th>
                        </tr>
                    </table>
                    <div class="scrollable-table">
                        <table>
                            <?php
                            $alertsQuery = "
                            SELECT name, folio_number, DATE_ADD(date, INTERVAL warranty MONTH) AS warrenty_dead
                            FROM invoice 
                            WHERE DATEDIFF(DATE_ADD(date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                            AND DATE_ADD(date, INTERVAL warranty MONTH) > NOW()
                            UNION
                            SELECT name, folio_number, DATE_ADD(date, INTERVAL warranty MONTH) AS warrenty_dead
                            FROM o_invoice 
                            WHERE DATEDIFF(DATE_ADD(date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                            AND DATE_ADD(date, INTERVAL warranty MONTH) > NOW()
                            UNION
                            SELECT f_name AS name, f_folio_number AS folio_number, DATE_ADD(f_date, INTERVAL warranty MONTH) AS warrenty_dead
                            FROM f_invoice 
                            WHERE DATEDIFF(DATE_ADD(f_date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                            AND DATE_ADD(f_date, INTERVAL warranty MONTH) > NOW()";

                            $alertsResult = mysqli_query($con, $alertsQuery);
                            if (mysqli_num_rows($alertsResult) > 0) {
                                while ($alertRow = mysqli_fetch_assoc($alertsResult)) {
                                    $warrantyEndDate = new DateTime($alertRow['warrenty_dead']);
                                    $currentDate = new DateTime();
                                    $remainingTime = $currentDate->diff($warrantyEndDate);
                                    $remainingMonths = ($remainingTime->y * 12) + $remainingTime->m;
                                    echo "<tr>
                                        <td>{$alertRow['name']}</td>
                                        <td>{$alertRow['folio_number']}</td>
                                        <td>{$remainingMonths} months left</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No items close to expiry.</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="pie-chart">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
            <div class="items-not-working">
                <h2>Items Not Working</h2>
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Set ID</th>
                        <th>Item Name</th>
                        <th>Location</th>
                    </tr>
                </table>
                <div class="scrollable-table">
                    <table>
                        <?php
                        $officeNotWorking = "SELECT set_id, item, location FROM o_items WHERE working = 'no'";
                        $officeNotWorkingResult = mysqli_query($con, $officeNotWorking);
                        while ($officeRow = mysqli_fetch_assoc($officeNotWorkingResult)) {
                            echo "<tr><td>Office Equipment</td><td>{$officeRow['set_id']}</td><td>{$officeRow['item']}</td><td>{$officeRow['location']}</td></tr>";
                        }
                        $labNotWorking = "SELECT set_id, item, location FROM items WHERE working = 'no'";
                        $labNotWorkingResult = mysqli_query($con, $labNotWorking);
                        while ($labRow = mysqli_fetch_assoc($labNotWorkingResult)) {
                            echo "<tr><td>Lab Equipment</td><td>{$labRow['set_id']}</td><td>{$labRow['item']}</td><td>{$labRow['location']}</td></tr>";
                        }
                        $furnitureNotWorking = "SELECT f_set_id, location FROM f_items WHERE working = 'no'";
                        $furnitureNotWorkingResult = mysqli_query($con, $furnitureNotWorking);
                        while ($furnitureRow = mysqli_fetch_assoc($furnitureNotWorkingResult)) {
                            echo "<tr><td>Furniture</td><td>{$furnitureRow['f_set_id']}</td><td>Furniture</td><td>{$furnitureRow['location']}</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <script>
            var ctx = document.getElementById("myPieChart").getContext("2d");
            var myPieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Office Equipment", "Lab Equipment", "Furniture"],
                    datasets: [{
                        data: [<?php echo $officeData['total_quantity']; ?>, <?php echo $labTotalQuantity; ?>, <?php echo $furnitureData['total_quantity']; ?>],
                        backgroundColor: ["#007bff", "#28a745", "#ffc107"],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ": " + tooltipItem.raw + " items";
                                }
                            }
                        }
                    }
                }
            });
        </script>
    </div>
</body>

</html>