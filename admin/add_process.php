<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $title = $_POST['title'];
    $user_name = $_POST['user_name'];
    $expert = $_POST['expert'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = 'p';

    $q = "INSERT INTO user (title, user_name, password, expert, position, office, email, level) VALUES ('$title', '$user_name','$password', '$expert', '$position', '$office', '$email','$level')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: table_professor.php");
        //echo "Success";
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>