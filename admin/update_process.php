<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    $pid = $_POST['pid'];
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $expert = $_POST['expert'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $free_time = $_POST['free_time'];


    $q = "UPDATE professor SET title = '$title',firstname = '$firstname',lastname = '$lastname', expert = '$expert', position = '$position', office = '$office', free_time = '$free_time' WHERE pid = '$pid'";


    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: table_professor.php");
        //echo $pid . $title . $firstname . $lastname . $expert . $position . $office;
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>