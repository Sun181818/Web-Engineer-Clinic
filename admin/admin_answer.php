<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
}

include '../connectdb.php';
    $uid = $_POST['uid'];
    $wid = $_POST['wid'];
    $comment = $_POST['comment'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO accept (uid,wid,comment,user_name,email) VALUES ('$uid', '$wid', '$comment', '$user_name', '$email') ";
    $query = mysqli_query($connect,$sql);

    // update
    mysqli_query($connect,"UPDATE webboard SET reply=reply+1 WHERE wid='{$_POST['wid']}' ");

    if ($query) {
        header("Location: aView.php?wid=$_POST[wid]");
    } 
    else {
    echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>
