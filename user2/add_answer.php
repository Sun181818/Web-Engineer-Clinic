<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connectdb.php';
    $detail = trim($_POST['detail']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $sql = "INSERT INTO answers (detail,name,email,question_id) VALUES ";
    $sql .= "('{$detail}','{$name}','{$email}','{$_POST['id']}')";
    $query = mysqli_query($connect,$sql);

    // update
    mysqli_query($connect,"UPDATE questions SET reply=reply+1 WHERE id='{$_POST['id']}' ");
    if ($query == TRUE) {
        //echo "<a href='index.'></a>";
        header("Location: view_topic.php?id=$_POST[id]");
    }
    mysqli_close($connect);
}