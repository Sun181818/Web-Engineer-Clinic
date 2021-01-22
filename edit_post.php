<?php include '../connectdb.php'; 
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $id = $_POST['id'];
    $topic = $_POST['topic'];
    $detail = $_POST['detail'];

    $q = "UPDATE questions SET topic = '$topic', detail = '$detail'WHERE id = '$id'";


    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: index2.php");
        //echo "Success";
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>