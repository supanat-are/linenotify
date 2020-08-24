<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>money</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>



<center>


<?php

    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];


            $query = "DELETE FROM users WHERE id = '".$id."' ";
                        
            $result = mysqli_query($con,$query);
            
            echo "ลบข้อมูลสำเร็จ";

            header("location: showdata.php");
        

    }
?>

</center>
</body>