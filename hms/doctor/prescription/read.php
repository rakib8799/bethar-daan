
<?php
$conn = mysqli_connect("localhost", "root", "", "obcsdb"); 
if ($conn) {
 
} else {
    echo "Error";
}

$query = "select * from notice";
$connect = mysqli_query($conn, $query);
$num = mysqli_num_rows($connect); 
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Display post description</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background-color: #5d6d7d;
        }

        .container {
            max-width: 1000px;
            margin: 70px auto;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th {
            background-color:green;
            color: #fff;
            padding: 10px;
            font-size: 1.5em;
        }

        table td {
            padding: 10px;
            color: #fff;
            font-size: 1.3em;
            
            /* text-align: center; */
        }

        table tr:nth-child(odd) {
            background-color: #797676;

        }
    </style>
</head>

<body>
    <div class="container">

          <?php
            $targetUrl = 'index.php';
            echo '<a href="' . $targetUrl . '" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;"> Go to homepage </a>';
   
            ?>

    
   
        <table border="15">
            <tr>
               
                <th>Notice</th>
                <!-- <th>vroll</th>
                <th>vseries</th>
                <th>vdept</th>
                <th>vemail</th> --> 

                <!-- <th>university</th> -->
                <!-- <th>rag_date</th>
                <th>rag_time</th>
                <th>rag_place</th> -->
                <!-- <th>sname</th>
                <th>sroll</th>
                <th>sseries</th>
                <th>sdept</th>
                <th>smobile</th>
                <th>sfb</th> -->
                <!-- <th>description</th> -->

            </tr>
            <?php
            if ($num > 0) {
                while ($data = mysqli_fetch_assoc($connect)) {
                    echo "  
                               <tr>  
                               <td>" . $data['notice_description'] . "</td>  
                           
                               </tr>  
                          ";
                }
            }
            ?>
        </table>

    </div>
</body>

</html>