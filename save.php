<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<div class = "">
    <H>ตารางรายการการร้องเรียนเหตุไฟฟ้าขัดข้อง</H>
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


?>


<?php



    


$header = "แจ้งเหตุไฟฟ้าขัดข้อง";
$name = "";
$address = "";
$phone = "";
$note = "";

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

        <?php 
            $name = $row["name"];
            $address = $row["address"];
            $phone = $row["phone"];
            $note = $row["data"];
        ?>
        




    </tr>
<?php } 
}?>

<?php 
    if ( $name <> "" ||  $address <> "" ||  $phone <> "" ||  $note <> "" ) {
        sendlinemesg();
        header('Content-Type: text/html; charset=utf8');
        $res = notify_message($message);
        echo "<script>alert('ดำเดินการเรียบร้อย ทางเราจะรีบทำการตรวจสอบและแก้ไข');</script>";
        header("location: index.php");
    } else {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
        header("location: index.php");
    }

$message = $header.
                "\n". "ชื่อ: " . $name .
                "\n". "ที่อยู่: " . $address .
                "\n". "เบอร์โทรศัพท์: " . $phone .
                "\n". "หมายเหตุ: " . $note;

                sendlinemesg();
                header('Content-Type: text/html; charset=utf8');
                $res = notify_message($message);
                header("location: index.php");

    function sendlinemesg() {
		// LINE LINE_API https://notify-api.line.me/api/notify
		// LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu แนะนำให้ใช้ของตัวเองนะครับเพราะของผมยกเลิกแล้วไม่สามารถใช้ได้
        define('LINE_API',"https://notify-api.line.me/api/notify");
        define('LINE_TOKEN',"n4pqHqsIIEfA9bFJ1OH03lDVDCAlXhpl7HpgZEO44f9");

        function notify_message($message) {
            $queryData = array('message' => $message);
            $queryData = http_build_query($queryData,'','&');
            $headerOptions = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                )
            );
            $context = stream_context_create($headerOptions);
            $result = file_get_contents(LINE_API, FALSE, $context);
            $res = json_decode($result);
            return $res;
        }
    }
?>