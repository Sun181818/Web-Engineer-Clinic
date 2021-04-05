<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $pid = $_POST['pid'];
    $pid2 = $_POST['pid2'];
    $uid = $_POST['user_id'];
    $level = 'u';

    $q = "UPDATE user SET level = '$level' WHERE uid = '$uid'";
    $q2 = "DELETE FROM professor WHERE pid = '$pid'";
    $q3 = "DELETE FROM booking WHERE pid = '$pid2'";

    $result = mysqli_query($connect, $q );
    $result2 = mysqli_query($connect, $q2);
    $result3 = mysqli_query($connect, $q3);

    if($result && $result2 && $result3) {
        header("Location: table_professor.php");
        //echo "Success";
        //echo $q2 . $q;
    }
    else {
        echo "Fail" . "..." . mysqli_error($connect);
    }

    mysqli_close($connect);
?>