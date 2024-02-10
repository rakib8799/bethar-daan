<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document1</title>
    <link rel="stylesheet" href="victim.css">
  

</head>

 
<body style="background: linear-gradient(to right, #43e97b, #38f9d7); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

<form action="insert.php" method="POST" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

    <div style="text-align: center;">

        <!-- Go to Dashboard button -->
        <a href="../dashboard.php" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Go to Dashboard</a>

        <!-- victim form start -->
        <div style="margin-bottom: 20px;">

            <h2>Give Notice</h2>

            <div style="margin-top: 10px; text-align: left;">
                <p>Notice Box :</p>
                <textarea name="notice_description" class="name" style="width: 200px; height: 100px;" required></textarea>
            </div>

        </div>

        <div style="margin-top: 10px; text-align: center;">

            <input type="submit" value="Submit" name="submit" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">

            <br>

            <h2>Your all data will be hidden</h2>

        </div>

        <div style="margin-top: 10px; text-align: center;">

            <?php
                $targetUrl = 'read.php';
                echo '<a href="' . $targetUrl . '" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Display all data from database</a>';
            ?>

        </div>

        <div style="margin-top: 20px;">

            <!-- <p>Copyright@<a href="#">SHOUKHIN</a> all right reserved.</p> -->

        </div>

    </div>

</form>

</body>


</html>