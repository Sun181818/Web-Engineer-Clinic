<?php include '../connectdb.php'; 
    //require 'connectdb.php'?>

<?php

    $topic = trim($_POST['topic']);
    $detail = trim($_POST['detail']);
    $email = trim($_POST['email']);
    $created = date('Y-m-d H:i:s');

$q = "INSERT INTO questions (topic, detail, email, created) VALUES ('$topic', '$detail', '$email', '$created')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: index.php");
        //echo "Success";
    }
    else {
        echo "Fail". mysqli_error($connect);
    }

    mysqli_close($connect);
?>

