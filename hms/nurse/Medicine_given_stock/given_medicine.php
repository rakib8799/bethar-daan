<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Given Medicine List</title>
    <style>
        /* Your interactive CSS code here */
    </style>
</head>
<body>
    <h2>Given Medicine List</h2>

    <!-- Form for adding a new entry to the given medicine list -->
    <form action="process_given.php" method="post">
        <label for="medicine_name">Medicine Name:</label>
        <!-- Use a dropdown to select medicine names from the previous database -->
        <select name="medicine_name" required>
            <?php include 'fetch_medicines.php'; ?>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Add Entry</button>
    </form>

    <!-- Display added entries using fetch_entries_given.php -->
    <div id="entries">
        <?php include 'fetch_entries_given.php'; ?>
    </div>

    <script>
        // Your interactive JavaScript code here
    </script>
</body>
</html>
