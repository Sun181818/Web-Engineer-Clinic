<?php

include 'connectdb.php';

$username = $_POST[username];
$professorname = $_POST[professorname];
$date = $_POST["date"];
$time = $_POST["time"];
$subject = $_POST["subject"];
$detail = $_POST["detail"];
$status = "0";

$connect->query("INSERT INTO booking(user_name,professor_name,date,time,subject,detail,status)VALUES('$username','$professorname','$date','$time','$subject','$detail','$status')");
?>