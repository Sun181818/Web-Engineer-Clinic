<?php include '../connectdb.php'; 
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $pid = $_POST['pid'];
    $title = $_POST['title'];
    $professor_name = $_POST['professor_name'];
    $expert = $_POST['expert'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $email = $_POST['email'];

    $q = "UPDATE professor SET title = '$title', professor_name = '$professor_name', expert = '$expert', position = '$position', office = '$office', email = '$email' WHERE pid = '$pid'";


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