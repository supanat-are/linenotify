<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>


<?php
    $con = mysqli_connect("localhost","root","","list");
    $con ->set_charset("utf8");

$header = "แจ้งเหตุไฟฟ้าขัดข้อง";
$name = "";
$address = "";
$phone = "";
$note = "";
$message2 = "ขณะนี้ยังไม่มีเหตุไฟขัดข้อง";


$sql = "SELECT * FROM users ORDER BY trn_date DESC LIMIT 1";
$result= $con->query($sql);
if ($result->num_rows>0) {
    
    if($row=$result->fetch_assoc()){ 

            echo $row["name"];
            echo $row["address"];
            echo $row["phone"]; 
            echo $row["data"];
            echo $row["trn_date"];
         
            $name = $row['name'];
            $address = $row['address'];
            $phone = $row['phone'];
            $note = $row['data'];           
              

}

$message = $header.
            "\n". "ชื่อ: " . $name .
            "\n". "ที่อยู่: " . $address .
            "\n". "เบอร์โทรศัพท์: " . $phone .
            "\n". "หมายเหตุ: " . $note;

} 
if ( $name != "" ||  $address != "" ||  $phone != "" ||  $note != "" ) {
    sendlinemesg();
    header('Content-Type: text/html; charset=utf8');
    $res = notify_message($message);
    header("location: show.php");
}else{
    sendlinemesg();
    header('Content-Type: text/html; charset=utf8');
    $res = notify_message($message2);
    header("location: show.php");

}

            sendlinemesg();
            header('Content-Type: text/html; charset=utf8');
            $res = notify_message($message);
            header("location: show.php");
            function sendlinemesg() {
                // LINE LINE_API https://notify-api.line.me/api/notify
                // LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu ต้องใช้ของตัวเอง
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

            sendlinemesg2();
            header('Content-Type: text/html; charset=utf8');
            $res = notify_message($message2);
            header("location: show.php");
            function sendlinemesg2() {
                // LINE LINE_API https://notify-api.line.me/api/notify
                // LINE TOKEN mhIYaeEr9u3YUfSH1u7h9a9GlIx3Ry6TlHtfVxn1bEu ต้องใช้ของตัวเอง
                define('LINE_API',"https://notify-api.line.me/api/notify");
                define('LINE_TOKEN',"n4pqHqsIIEfA9bFJ1OH03lDVDCAlXhpl7HpgZEO44f9");
        
                function notify_message($message2) {
                    $queryData = array('message' => $message2);
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
