<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['']);
    $id = $_GET['id'];

    $q = "DELETE FROM questions WHERE id = '$id'";

    $result = mysqli_query($connect, $q);

    if(mysqli_affected_rows($connect) > 0) {
        header("Location: index2.php");
        //echo "Success";
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>