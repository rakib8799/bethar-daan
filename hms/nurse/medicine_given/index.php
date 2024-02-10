<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Given Medicine List</title>
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
    <h2>Given Medicine List</h2>

    <form action="process.php" method="post">
        <label for="medicine_name">Medicine Name:</label>
        <select name="medicine_name">
            <?php include 'fetch_medicine_names.php'; ?>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <label for="date">Date Given:</label>
        <input type="date" name="date" required>

        <button type="submit">Add Entry</button>
    </form>

    <div id="entries">
        <?php include 'fetch_entries.php'; ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function fetchEntries() {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("entries").innerHTML = xhr.responseText;
                    }
                };
                xhr.open("GET", "fetch_entries.php", true);
                xhr.send();
            }

            fetchEntries();

            document.getElementById("entries").addEventListener("click", function (event) {
                if (event.target.tagName === "A" && event.target.classList.contains("edit-link")) {
                    event.preventDefault();
                    var editId = event.target.getAttribute("data-id");
                    window.location.href = "edit.php?id=" + editId;
                }

                if (event.target.tagName === "A" && event.target.classList.contains("delete-link")) {
                    event.preventDefault();
                    var deleteId = event.target.getAttribute("data-id");
                    if (confirm("Are you sure you want to delete this entry?")) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                fetchEntries();
                            }
                        };
                        xhr.open("GET", "delete.php?id=" + deleteId, true);
                        xhr.send();
                    }
                }
            });
        });
    </script>
</body>
</html>
