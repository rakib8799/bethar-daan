<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Stock Management - Sell</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Sale Medicine Stock</h2>

    <!-- Form to add new sale entry -->
    <form action="process_sell.php" method="post">
        <label for="medicine_name">Medicine Name:</label>
        <input type="text" name="medicine_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <label for="type">Type:</label>
        <input type="text" name="type" required>

        <label for="date">Date:</label>
        <input type="date" name="date" required>

        <button type="submit">Add Sale Entry</button>
    </form>

    <!-- Display sale entries from the database -->
    <h2>Sale Medicine Stock Entries</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Quantity</th>
            <th>Type</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        // Fetch and display sale entries from the database
        include("fetch_entries_sell.php");
        ?>
    </table>
</div>

</body>
</html>
