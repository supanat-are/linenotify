<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
 <?php 


    $header = "แจ้งเหตุไฟฟ้าขัดข้อง";
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];

    $message = $header.
                "\n". "ชื่อ: " . $name .
                "\n". "ที่อยู่: " . $address .
                "\n". "เบอร์โทรศัพท์: " . $phone .
                "\n". "หมายเหตุ: " . $note;

    if (isset($_POST["submit"])) {
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
    }

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

    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");

    if(isset($_POST['name']))
        {
            $name1 = $_POST['name'];
            $address1 = $_POST['address'];
            $phone1 = $_POST['phone'];
            $note1 = $_POST['note'];

            
            if ($name1 != "" ||  $address1 != "" ||  $phone1 != "" ||  $note1 != "" ) {
                $query = "INSERT INTO users (name,address,phone,data)
                VALUES('$name1','$address1','$phone1','$note1')";
                            
                $result = mysqli_query($con,$query);
                

                
            }
        }


?>