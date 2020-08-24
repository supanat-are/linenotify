<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<center>
<body>
    <div class="form">

        <P><a href="showdata.php">ตารางบัญทึกข้อมูล</a></p>
        <a href="logout.php">Logout</a>
    
    </div>
</body>
<?php
    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");
?>
   <div class="from" >
    <H1>ข้อร้องเรียนไฟฟ้าขัดข้องล่าสุด</H>
</div>
    <table border="3" cellpadding="3" cellspacing = "3" >
    <tr >

        <th><b>ชื่อ</b></th>
        <th><b>ที่อยู่</b></th>
        <th><b>เบอร์โทรศัพท์</b></th>
        <th><b>หมายเหตุ</b></th>
        <th><b>วันที่</b></th>

    </tr>
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
</center>