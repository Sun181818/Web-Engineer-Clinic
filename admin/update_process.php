<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    $uid = $_POST['uid'];
    $title = $_POST['title'];
    $user_name = $_POST['user_name'];
    $expert = $_POST['expert'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $email = $_POST['email'];


    $q = "UPDATE user SET title = '$title',user_name = '$user_name', expert = '$expert', position = '$position', office = '$office', email = '$email' WHERE uid = '$uid'";


    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: table_professor.php");
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>