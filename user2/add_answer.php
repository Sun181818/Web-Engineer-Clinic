<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../connect.php';
    $detail = trim($_POST['detail']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $sql = "INSERT INTO answers (detail,name,email,question_id) VALUES ";
    $sql .= "('{$detail}','{$name}','{$email}','{$_POST['id']}')";
    $query = mysql_query($sql);

    // update
    mysql_query("UPDATE questions SET reply=reply+1 WHERE id='{$_POST['id']}' ");
    if ($query == TRUE) {
        echo "Success!<BR>";
        echo "<a href='view_topic.php?id=$_POST[id]'>Back to view your topic.</a>";
    }
    mysql_close();
}