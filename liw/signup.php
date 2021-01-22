<?php

include 'connectdb.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE user_name = '" . $username . "' OR email = '" . $email . "'";

$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode("Error");
} else {
    $insert = "INSERT INTO user(user_name,email,password)VALUES('" . $username . "','" . $email . "','" . $password . "')";
    $query = mysqli_query($connect, $insert);
    if ($query) {
        echo json_encode("Success");
    }
}

?>