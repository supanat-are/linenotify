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

        <P><a href="line-notify.php">หน้าแจ้งเตือน</a></p>
        <a href="logout.php">Logout</a>
    
    </div>
</body>
<?php
    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");
?>


    <H>ตารางรายการการร้องเรียนเหตุไฟฟ้าขัดข้อง</H>
    <table border="3" cellpadding="3" cellspacing = "3" >
        <thead>
    <tr >
        <th><b>ชื่อ</b></th>
        <th><b>ที่อยู่</b></th>
        <th><b>เบอร์โทรศัพท์</b></th>
        <th><b>หมายเหตุ</b></th>
        <th><b>วันที่</b></th>
        <th><b>แก้ไกข้อมูล</b></th>  
    </tr>
    <thead>

<?php
$sql = "SELECT * FROM users";
$result= $con->query($sql);
if ($result->num_rows>0) {

    while($row=$result->fetch_assoc()){ ?>
    <tbody>
    <tr>
    
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["address"];?></td>
        <td><?php echo $row["phone"];?></td> 
        <td><?php echo $row["data"];?></td>
        <td><?php echo $row["trn_date"];?></td>
        <th><a href="delete.php?id=<?php echo $row["id"];?>">delete</a></th>

    </tr>
    <tbody>
<?php } 

}?>
</center>