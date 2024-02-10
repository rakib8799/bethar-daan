<?php
    $dbhost='localhost';
    $dbusername='root';
    $dbpass='';
    $dbname='obcsdb';
    
    $mysqli= mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

    if (isset($_POST['submit'])) {
        $notice = $_POST['notice_description']; //notice _description     ta asshe ager index.php er name er jonno je field silo oikhane name:notice_description silo ja class:A errokom onekta 
        // $vroll = $_POST['vroll'];
        // $vseries = $_POST['vseries'];
        // $vdept = $_POST['vdept'];
        // $vemail = $_POST['vemail'];
        // $university= $_POST['university'];
        // $rag_date = $_POST['rag_date'];
        // $rag_time = $_POST['rag_time'];
        // $rag_place = $_POST['rag_place'];
        // $sname = $_POST['sname'];
        // $sroll = $_POST['sroll'];
        // $sseries = $_POST['sseries'];
        // $sdept = $_POST['sdept'];
        // $smobile = $_POST['smobile'];
        // $sfb = $_POST['sfb'];
        // $description = $_POST['description'];

        $result = mysqli_query($mysqli, "INSERT INTO notice VALUES ('','$notice')");
       

        if ($result) {
            echo "victim info successfully stored  <br>";



            $targetUrl = 'index.php';
            echo '<a href="' . $targetUrl . '" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;"> Go to homepage </a>';
   


            echo"<br>";
            echo"<br>";
            

            $targetUrl = 'read.php';
            echo '<a href="' . $targetUrl . '" style="display: inline-block; padding: 10px 20px; font-size: 16px; text-align: center; text-decoration: none; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Display all data from database</a>';
   
       

        } else {
            echo "data submit hoy ni ";
        }
    }
?>