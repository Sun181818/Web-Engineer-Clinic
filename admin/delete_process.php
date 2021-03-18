<?php include '../connectdb.php';
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $uid = $_POST['uid'];

    $level = 'u';

    $q = "UPDATE user SET title = NULL, expert = NULL, position = NULL, office = NULL,level = '$level' WHERE uid = '$uid'";

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