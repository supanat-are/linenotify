<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>

<?php

    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");


    if(isset($_POST['name']))
        {
            $name1 = $_POST['name'];
            $address1 = $_POST['address'];
            $phone1 = $_POST['phone'];
            $note1 = $_POST['note'];
            $trn_date=date("Y-m-d H:i:s");

            
            if ($name1 != "" ||  $address1 != "" ||  $phone1 != "" ||  $note1 != "" ) {
                $query = "INSERT INTO users (name,address,phone,data,trn_date)
                VALUES('$name1','$address1','$phone1','$note1','$trn_date')";
                            
                $result = mysqli_query($con,$query);
                

                
            }
        }

        header("location: index.php");
?>
