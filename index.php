<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<center>
<body>
    <form action="save.php" method="post">
    
        <h1>แจ้งเหตุไฟฟ้าขัดข้อง</h1> <br>
        <input name="name" placeholder='ชื่อ ' type='text'>
        <br>
        <input name="address" placeholder='ที่อยู่ ' type='text'>
        <br>
        <input name="phone" placeholder='เบอร์โทรศัพท์ที่ติดต่อได้'  type='text'>
        <br>
        <input name="note" placeholder='หมายเหตุ ' type='text'>
        <br>

        <input class='send' name="submit" type='submit' value='แจ้งเรื่อง'>
    </form>
    <br><a href="login.php">login (สำหรับเจ้าหน้าที่)</a>
</body>
</center>
</html>

