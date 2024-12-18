<?php
include("../config/connection.php");
session_start();

if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}

$queryinvoice = "SELECT * FROM invoice";
$result = mysqli_query($con, $queryinvoice);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = "SELECT * FROM o_invoice WHERE invoice_id = $id";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $query2 = "SELECT * FROM o_items WHERE invoice_id = $id";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_assoc($result2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
    <style>
        body {
            background: #ececec;
            padding-top: 50px;
            padding-bottom: 50px;
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
    <h2><?php if (isset($_GET['id'])) {
            echo "Update Office Invoice";
        } else {
            echo "Add Office Invoice";
        } ?></h2>

    <form action="actionItem.php" method="POST">

        <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['invoice_id'];
                                                } ?> " /> <br>

        <label for="aName">Article Name</label>
        <input type="text" name="aname" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['name'];
                                                } ?>" required /> <br>

        <label for="date">Date</label>
        <input type="date" name="date" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['date'];
                                                } ?>" required /><br>

        <label for="price">Price(Per Unit)</label>
        <input type="number" name="price" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['price'];
                                                    } ?>" required /><br>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['quantity'];
                                                    } ?>" required /><br>


        <label for="warranty">Warranty Period</label>
        <input type="number" name="warranty" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['warranty'];
                                                    } ?>" placeholder="In months" required /><br>

        <label for="folio">Folio Number</label>
        <input type="text" name="folio" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['folio_number'];
                                                } ?>" required /><br>

        <label for="description">Description</label>
        <textarea name="description" rows="10"><?php if (isset($_GET['id'])) {
                                                                echo $row1['description'];
                                                            } ?></textarea> <br><br><br>

        <label for="sName">Supplier Name</label>
        <input type="text" name="sName" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['supplier_name'];
                                                } ?>" required /> <br>

        <label for="s_tp">Supplier T.P.</label>
        <input type="number" name="s_tp" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['supplier_tt'];
                                                } ?>" /> <br>

        <label for="srn">SRN Number</label>
        <input type="number" name="srn" value="<?php if (isset($_GET['id'])) {
                                                    echo $row1['srn'];
                                                } ?>" /> <br>

        <label for="pageNumber">Page Number</label>
        <input type="text" name="pageNumber" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['page_number'];
                                                    } ?>" /> <br>
        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php if (isset($_GET['id'])) {
                                                        echo $row1['location'];
                                                    } ?>" required />
        <br>

        <select name="type" style="margin:20px ; padding: 10px; font-size:15px;" onchange="updateTableHeader()" hidden='hidden'>
            <option value="electronic">electronic</option>
        </select>
        <div id="itemField" style="display: none;">
            <label for="item">Item name</label>
            <input type="text" name="item" value="item" required />
        </div>
        <button type="button" onclick="addtable()" onclick="addtype()" style="background-color:#55C2C3; color: black; margin: 10px; padding:8px;" <?php if (isset($_GET['id'])) { ?> disabled="disabled" <?php } ?>>Add Serial Number</button>

        <div>
            <table id="dataTable" hidden="hidden">
                <thead id="tableHeader">
                    <tr>
                        <th>No</th>
                        <th>Serial_number</th>
                    </tr>
                </thead>

                <tbody id="tableBody">
                </tbody>
            </table>
        </div>


        <script>
            function addtable() {
                addtable.executed = false;
                if (addtable.executed) return;
                addtable.executed = true;


                var quantity = parseInt(document.querySelector('input[name="quantity"]').value);
                var folio = document.querySelector('input[name="folio"]').value;

                if (!quantity || !folio) {
                    alert("Please enter a valid quantity and folio number.");
                    return;
                }
                //visibility of item field
                var itemField = document.getElementById('itemField');
                if (itemField.style.display === 'none' || itemField.style.display === '') {
                    itemField.style.display = 'block';
                }

                let element = document.getElementById("dataTable");
                element.removeAttribute("hidden");


                // Clear existing rows in table body
                var tableBody = document.getElementById("tableBody");
                tableBody.innerHTML = '';

                var selectedType = document.querySelector('select[name="type"]').value;

                var tableHeader = document.getElementById("dataTable").getElementsByTagName('thead')[0].insertRow();
                var rowNumberHeader = document.createElement("th");

                var tableBody = document.getElementById("tableBody");
                for (var i = 1; i <= quantity; i++) {
                    var newRow = tableBody.insertRow();



                    //for get folio number
                    let parts = folio.split('-');
                    let result = parts[0];

                    let lastPart = result.split('/').pop();
                    let incrementedNumber = parseInt(lastPart) + i - 1;
                    let updatedString = result.replace(lastPart, incrementedNumber);

                    var cell = newRow.insertCell();
                    cell.textContent = updatedString;

                    if (selectedType == "electronic") {
                        var cell = newRow.insertCell();
                        var input = document.createElement("input");
                        input.type = "text";
                        input.name = "Serial_number" + i;
                        cell.appendChild(input);
                    }
                }

                var inputContainer = document.getElementById("input-container");
                inputContainer.innerHTML = '';

                var typeInputContainer = document.getElementById("input-row");
                typeInputContainer.style.visibility = "hidden";

                var addTypeButton = document.getElementById("addTypeButton");
                addTypeButton.style.display = "none";

                addTypeButton.removeAttribute("disabled");
            }

            function addtype() {


                var inputContainer = document.getElementById("input-container");

                var inputRow = document.createElement('div');
                inputRow.className = 'input-row';

                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'type[]';

                var removeButton = document.createElement('button');
                removeButton.className = 'removeButton';
                removeButton.textContent = ("Remove");
                removeButton.onclick = function() {
                    remove(inputRow);
                };

                inputRow.appendChild(newInput);
                inputRow.appendChild(removeButton);

                inputContainer.appendChild(inputRow);
            }

            function remove(inputRow) {
                var inputContainer = document.getElementById('input-container');

                inputContainer.removeChild(inputRow);
            }
        </script>

        <input class="button" type="submit" name="<?php if (isset($_GET['id'])) {
                                                        echo "update";
                                                    } else {
                                                        echo "padd";
                                                    } ?>" value="<?php if (isset($_GET['id'])) {
                                                                        echo "Update";
                                                                    } else {
                                                                        echo "Add";
                                                                    } ?>" style="width: 25%;" /> <br>
    </form>
</body>

</html>