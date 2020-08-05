<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>
<?php
    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");

    if(isset($_POST['name']))
        {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $note = $_POST['note'];

            
            if ($name != "" ||  $address != "" ||  $phone != "" ||  $note != "" ) {
                $query = "INSERT INTO users (name,address,phone,data)
                VALUES('$name','$address','$phone','$note')";
                            
                $result = mysqli_query($con,$query);
                

                
            }
        }
?>
