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
        }

        .animation-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            height: 100vh;
            padding: 20px;
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
                // Calculate the total quantity and cost for Office Equipment
                $officeSummaryQuery = "SELECT SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost FROM o_invoice";
                $officeResult = mysqli_query($con, $officeSummaryQuery);
                $officeData = mysqli_fetch_assoc($officeResult);
                
                // Query to calculate total quantity and cost for Lab Equipment by type
                $labSummaryQuery = "
                    SELECT type, SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_cost 
                    FROM invoice 
                    GROUP BY type";
                $labResult = mysqli_query($con, $labSummaryQuery);
                
                // Query to calculate total quantity and cost for Furniture
                $furnitureSummaryQuery = "SELECT SUM(f_quantity) AS total_quantity, SUM(f_price * f_quantity) AS total_cost FROM f_invoice";
                $furnitureResult = mysqli_query($con, $furnitureSummaryQuery);
                $furnitureData = mysqli_fetch_assoc($furnitureResult);

                // Display Office Equipment Summary
                echo "<tr><td>Office Equipment</td><td>{$officeData['total_quantity']}</td><td>\${$officeData['total_cost']}</td></tr>";

                // Display Lab Equipment Summary
                $labTotalQuantity = 0; // Initialize variable to calculate total lab equipment quantity
                while ($labData = mysqli_fetch_assoc($labResult)) {
                    echo "<tr><td>Lab Equipment - {$labData['type']}</td><td>{$labData['total_quantity']}</td><td>\${$labData['total_cost']}</td></tr>";
                    $labTotalQuantity += $labData['total_quantity']; // Accumulate total quantity
                }

                // Display Furniture Summary
                echo "<tr><td>Furniture</td><td>{$furnitureData['total_quantity']}</td><td>\${$furnitureData['total_cost']}</td></tr>";
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
                    // Check database connection
                    if (!$con) {
                        die("Database connection failed: " . mysqli_connect_error());
                    }

                // Alerts query to retrieve items with warranty less than 6 months remaining and not expired
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

                // Check if query executed successfully
                if (!$alertsResult) {
                    die("Query failed: " . mysqli_error($con));
                }

                // Check if there are any results and display them, or show a message if no items are close to expiry
                if (mysqli_num_rows($alertsResult) > 0) {
                    while ($alertRow = mysqli_fetch_assoc($alertsResult)) {
                        // Calculate the warranty end date
                        $warrantyEndDate = new DateTime($alertRow['warranty_end']);
                        $currentDate = new DateTime();
                        $remainingTime = $currentDate->diff($warrantyEndDate);

                        // Check if the warranty has less than 6 months remaining
                        if ($remainingTime->y == 0 && $remainingTime->m < 6) {
                            $remainingMonths = ($remainingTime->y * 12) + $remainingTime->m; // Total remaining months
                            echo "<tr>
                                    <td>{$alertRow['name']}</td>
                                    <td>{$alertRow['folio_number']}</td>
                                    <td>{$remainingMonths} months left</td>
                                </tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='3'>No items close to expiry.</td></tr>";
                }
                ?>
            </table>
        </div>
    <div class="pie-chart">
        <canvas id="myPieChart"></canvas> <!-- Canvas for Pie Chart -->
    </div>
</div>
    <script>
        const ctx = document.getElementById('myPieChart').getContext('2d');
        // Pie chart data
        const data = {
            labels: ['Office Equipment', 'Lab Equipment', 'Furniture'],
            datasets: [{
                label: 'Equipment Distribution',
                data: [
                    <?php
                    // Get total quantities for pie chart
                    echo $officeData['total_quantity'] . ", ";
                    $labSummaryQueryCount = "SELECT SUM(quantity) AS total_quantity FROM invoice"; // Overall lab quantity
                    $labSummaryResultCount = mysqli_query($con, $labSummaryQueryCount);
                    $labDataCount = mysqli_fetch_assoc($labSummaryResultCount);
                    echo $labDataCount['total_quantity'] . ", ";
                    echo $furnitureData['total_quantity'];
                    ?>
                ],
                backgroundColor: [
                    '#0056b3', // Blue for Office Equipment
                    '#007bff', // Light blue for Lab Equipment
                    '#28a745'  // Green for Furniture
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        };

        // Pie chart configuration
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

        // Create pie chart
        const myPieChart = new Chart(ctx, config);
    </script>
</body>

</html>