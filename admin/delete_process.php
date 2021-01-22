<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['']);
    $pid = $_GET['pid'];

    $q = "DELETE FROM professor WHERE pid = '$pid'";

    $result = mysqli_query($connect, $q);

    if(mysqli_affected_rows($connect) > 0) {
        header("Location: table_professor.php");
        //echo "Success";
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>