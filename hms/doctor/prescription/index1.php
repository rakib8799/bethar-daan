<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bathar Daan Medical Center</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 25%;
            background-color: #f2f2f2;
            padding: 20px;
        }

        #main {
            width: 75%;
            padding: 20px;
        }

        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: calc(100% - 16px); /* Adjusting for padding */
            margin-bottom: 10px;
            padding: 8px;
        }

        #saveAsPdfBtn {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div id="sidebar" style="width: 25%; background-color: #f2f2f2; padding: 20px;">
        <h2>Sidebar</h2>
        <label for="textarea1">Text Area 1</label>
        <textarea id="textarea1" rows="4"></textarea>

        <label for="textarea2">Text Area 2</label>
        <textarea id="textarea2" rows="4"></textarea>

        <label for="textarea3">Text Area 3</label>
        <textarea id="textarea3" rows="4"></textarea>
    </div>

    <div id="main" style="width: 75%; padding: 20px;">
        <h2>Main Content</h2>

        <label for="name">Name</label>
        <input type="text" id="name" style="width: calc(100% - 16px);">

        <label for="age">Age</label>
        <input type="text" id="age" style="width: calc(100% - 16px);">

        <label for="mainTextarea1">Main Text Area 1</label>
        <textarea id="mainTextarea1" rows="4" style="width: calc(100% - 16px);"></textarea>

        <label for="mainTextarea2">Main Text Area 2</label>
        <textarea id="mainTextarea2" rows="4" style="width: calc(100% - 16px);"></textarea>

        <button id="saveAsPdfBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;" onclick="saveAsPdf()">Save as PDF</button>
    </div>

    <script>
        function saveAsPdf() {
            const pdf = new jsPDF();

            // Get values from the form
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const textarea1 = document.getElementById('textarea1').value;
            const textarea2 = document.getElementById('textarea2').value;
            const textarea3 = document.getElementById('textarea3').value;
            const mainTextarea1 = document.getElementById('mainTextarea1').value;
            const mainTextarea2 = document.getElementById('mainTextarea2').value;

            // Add content to PDF
            pdf.text(`Name: ${name}`, 20, 20);
            pdf.text(`Age: ${age}`, 20, 30);
            pdf.text(`Text Area 1: ${textarea1}`, 20, 40);
            pdf.text(`Text Area 2: ${textarea2}`, 20, 50);
            pdf.text(`Text Area 3: ${textarea3}`, 20, 60);
            pdf.text(`Main Text Area 1: ${mainTextarea1}`, 20, 70);
            pdf.text(`Main Text Area 2: ${mainTextarea2}`, 20, 80);

            // Save PDF
            pdf.save('Bathar_Daan_Medical_Center_Form.pdf');
        }
    </script>
</body>
</html>
