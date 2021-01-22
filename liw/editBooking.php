<?php

    include 'connectdb.php';

   
    $bid = $_POST['bid'];
    $subject = $_POST['subject'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $connect->query("UPDATE booking SET subject = '".$suject."',detail = '".$detail."', date = '".$date."', time = '".$time."' 
        WHERE bid = '".$bid."'");
?>