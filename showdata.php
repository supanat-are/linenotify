<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="form">

        <P><a href="show.php">ตารางบัญทึกข้อมูล</a></p>
        <a href="login.php">Logout</a>
    
    </div>
</body>
<?php
    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");
?>
    <div class = "">
    <H>ข้อร้องเรียนไฟฟ้าขัดข้องล่าสุด</H>
    <table border="3" cellpadding="3" cellspacing = "3" >
    <tr >

        <td><b>ชื่อ</b></td>
        <td><b>ที่อยู่</b></td>
        <td><b>เบอร์โทรศัพท์</b></td>
        <td><b>หมายเหตุ</b></td>
        <td><b>วันที่</b></td>

    </tr>
    </div>
<?php



$sql = "SELECT * FROM users ORDER BY trn_date DESC LIMIT 1";
$result= $con->query($sql);
if ($result->num_rows>0) {
    if($row=$result->fetch_assoc()){ ?>
    <tr>

        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["address"];?></td>
        <td><?php echo $row["phone"];?></td> 
        <td><?php echo $row["data"];?></td>
        <td><?php echo $row["trn_date"];?></td>

    

    </tr>
<?php } 
}?>

