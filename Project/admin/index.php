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
    <title>Inventory Management System</title>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            overflow: hidden;
            color: #333;
            overflow-y: auto;
        }

        .animation-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            height: 200vh;
            padding: 20px;
            padding-bottom: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
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
        }

        th {
            background-color: #0056b3;
            color: white;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #004085;
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
            background-color: transparent;
            display: flex;
            justify-content: space-between;
        }

        .alerts {
            width: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
        }

        .pie-chart {
            width: 50%;
            height: 400px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-color: rgba(255, 255, 255, 0.9);
            margin-left: 10px;
        }

        #myPieChart {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php include "../header/header.php"; ?>
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
                // Calculating total quantity and price for office equipments
                $officeSummaryQuery = "SELECT SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost FROM o_invoice";
                $officeResult = mysqli_query($con, $officeSummaryQuery);
                $officeData = mysqli_fetch_assoc($officeResult);
                
                // Calculating total quantity and price for lab equipments
                $labSummaryQuery = "
                    SELECT type, SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost 
                    FROM invoice 
                    GROUP BY type";
                $labResult = mysqli_query($con, $labSummaryQuery);
                
                // Calculating total quantity and price for furniture
                $furnitureSummaryQuery = "SELECT SUM(f_quantity) AS total_quantity, SUM(f_price * f_quantity) AS total_cost FROM f_invoice";
                $furnitureResult = mysqli_query($con, $furnitureSummaryQuery);
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
                    <th>Remaining Time (Months)</th>
                </tr>
                <?php

                    if (!$con) {
                        die("Database connection failed: " . mysqli_connect_error());
                    }

                $alertsQuery = "
                    SELECT name, folio_number, DATE_ADD(date, INTERVAL warranty MONTH) AS warranty_end
                    FROM invoice 
                    WHERE DATEDIFF(DATE_ADD(date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                    AND DATE_ADD(date, INTERVAL warranty MONTH) > NOW()
                    UNION
                    SELECT name, folio_number, DATE_ADD(date, INTERVAL warranty MONTH) AS warranty_end
                    FROM o_invoice 
                    WHERE DATEDIFF(DATE_ADD(date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                    AND DATE_ADD(date, INTERVAL warranty MONTH) > NOW()
                    UNION
                    SELECT f_name AS name, f_folio_number AS folio_number, DATE_ADD(f_date, INTERVAL warranty MONTH) AS warranty_end
                    FROM f_invoice 
                    WHERE DATEDIFF(DATE_ADD(f_date, INTERVAL warranty MONTH), NOW()) < (6 * 30)
                    AND DATE_ADD(f_date, INTERVAL warranty MONTH) > NOW()";

                $alertsResult = mysqli_query($con, $alertsQuery);

                if (!$alertsResult) {
                    die("Query failed: " . mysqli_error($con));
                }

                if (mysqli_num_rows($alertsResult) > 0) {
                    while ($alertRow = mysqli_fetch_assoc($alertsResult)) {
                        $warrantyEndDate = new DateTime($alertRow['warranty_end']);
                        $currentDate = new DateTime();
                        $remainingTime = $currentDate->diff($warrantyEndDate);
                        if ($remainingTime->y == 0 && $remainingTime->m < 6) {
                            $remainingMonths = ($remainingTime->y * 12) + $remainingTime->m;
                            echo "<tr>
                                    <td>{$alertRow['name']}</td>
                                    <td>{$alertRow['folio_number']}</td>
                                    <td>{$remainingMonths} months left</td>
                                </tr>";
                        }
                    }
                } 
                else {
                    echo "<tr><td colspan='3'>No items close to expiry.</td></tr>";
                }
                ?>
            </table>
        </div>
    <div class="pie-chart">
        <canvas id="myPieChart"></canvas>
    </div>
</div>
    <script>
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const data = {
            labels: ['Office Equipment', 'Lab Equipment', 'Furniture'],
            datasets: [{
                label: 'Equipment Distribution',
                data: [
                    <?php
                    echo $officeData['total_quantity'] . ", ";
                    $labSummaryQueryCount = "SELECT SUM(quantity) AS total_quantity FROM invoice";
                    $labSummaryResultCount = mysqli_query($con, $labSummaryQueryCount);
                    $labDataCount = mysqli_fetch_assoc($labSummaryResultCount);
                    echo $labDataCount['total_quantity'] . ", ";
                    echo $furnitureData['total_quantity'];
                    ?>
                ],
                backgroundColor: [
                    '#0056b3',
                    '#007bff',
                    '#28a745' 
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        };
        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Equipment Distribution'
                    }
                }
            }
        };
        const myPieChart = new Chart(ctx, config);
    </script>
<div class="alerts-box">
    <div class="alerts">
        <h2>Items Not Working</h2>
        <table>
            <tr>
                <th>Category</th>
                <th>Set ID</th>
                <th>Model Number / Item Name</th>
                <th>Location</th>
            </tr>
            <?php
            $officeNotWorkingQuery = "SELECT set_id, model_number, location FROM o_items WHERE working = 'no'";
            $officeNotWorkingResult = mysqli_query($con, $officeNotWorkingQuery);
            while ($officeRow = mysqli_fetch_assoc($officeNotWorkingResult)) {
                echo "<tr><td>Office Equipment</td><td>{$officeRow['set_id']}</td><td>{$officeRow['model_number']}</td><td>{$officeRow['location']}</td></tr>";
            }
            $labNotWorkingQuery = "SELECT set_id, item, location FROM items WHERE working = 'no'";
            $labNotWorkingResult = mysqli_query($con, $labNotWorkingQuery);
            while ($labRow = mysqli_fetch_assoc($labNotWorkingResult)) {
                echo "<tr><td>Lab Equipment</td><td>{$labRow['set_id']}</td><td>{$labRow['item']}</td><td>{$labRow['location']}</td></tr>";
            }
            $furnitureNotWorkingQuery = "SELECT f_set_id, location FROM f_items WHERE working = 'no'";
            $furnitureNotWorkingResult = mysqli_query($con, $furnitureNotWorkingQuery);
            while ($furnitureRow = mysqli_fetch_assoc($furnitureNotWorkingResult)) {
                echo "<tr><td>Furniture</td><td>{$furnitureRow['f_set_id']}</td><td>N/A</td><td>{$furnitureRow['location']}</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>

</html>