<?php include '../connectdb.php'; 
    //require 'connectdb.php'?>
<?php

    //print_r($_POST['title']);
    $title = $_POST['title'];
    $professor_name = $_POST['professor_name'];
    $expert = $_POST['expert'];
    $position = $_POST['position'];
    $office = $_POST['office'];
    $email = $_POST['email'];

    $q = "INSERT INTO professor (title, professor_name, expert, position, office, email) VALUES ('$title', '$professor_name', '$expert', '$position', '$office', '$email')";

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