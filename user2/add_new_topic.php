<?php include '../connectdb.php'; 
    //require 'connectdb.php'?>

<?php

    $topic = trim($_POST['topic']);
    $detail = trim($_POST['detail']);
    $email = trim($_POST['email']);
    $created = date('Y-m-d H:i:s');
    $reply = "0";
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


    $q = "INSERT INTO questions (topic, detail, email, created, reply, pic) VALUES ('$topic', '$detail', '$email', '$created', '$reply', '$file')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: webboard.php");
        //echo "Success";
    }
    else {
        echo "Fail". mysqli_error($connect);
    }

    mysqli_close($connect);
?>

