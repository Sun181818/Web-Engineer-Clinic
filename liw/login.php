  
<?php

include 'connectdb.php';

$email = $_POST["email"];
$password = $_POST["password"];

//$email = "Liw@gmail.com";
//$password = "12345";


$sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'";

$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);


if ($count != 1) {
    echo json_encode("Error");
} else {
    $row = mysqli_fetch_array($result);
    echo json_encode($row[user_name]);
}

?>