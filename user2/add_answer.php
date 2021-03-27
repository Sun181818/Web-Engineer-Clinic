<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connectdb.php';
    $uid = $_SESSION['uid'];
    $detail = trim($_POST['detail']);
    $name = trim($_POST['user_name']);
    $email = trim($_POST['email']);

    $sql = "INSERT INTO accept (uid,detail,user_name,email,question_id) VALUES ";
    $sql .= "('{$uid}','{$detail}','{$name}','{$email}','{$_POST['id']}')";
    $query = mysqli_query($connect,$sql);

    // update
    mysqli_query($connect,"UPDATE webboard SET reply=reply+1 WHERE id='{$_POST['id']}' ");
    if ($query == TRUE) {
        //echo "<a href='index.'></a>";
        header("Location: view_topic.php?id=$_POST[id]");
    }
    mysqli_close($connect);
}