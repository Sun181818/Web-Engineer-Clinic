<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
}


    include '../connectdb.php'; 
    //require 'connectdb.php'?>

<?php

    $uid = $_SESSION['uid'];
    $topic = trim($_POST['topic']);
    $detail = trim($_POST['detail']);
    $email = trim($_POST['email']);
    $created = date('Y-m-d H:i:s');
    $reply = "0";
    $picture = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


    $q = "INSERT INTO webboard (uid, topic, detail, email, created, reply, pic) VALUES ('$uid', '$topic', '$detail', '$email', '$created', '$reply', '$picture')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: webboard.php");
        //echo "Success";
    }
    else {
        echo "Fail". mysqli_error($connect);
    }

    mysqli_close($connect);
?>

