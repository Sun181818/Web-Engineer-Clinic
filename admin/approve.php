<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $bid = $_POST['bid'];
    $status = $_POST['status'];

    $q = "UPDATE booking SET status = '$status' WHERE bid = '$bid'";


    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: index.php");
        //echo "Success";
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>