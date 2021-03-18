<?php include '../connectdb.php';
//require 'connectdb.php'
?>
<?php

$pid = $_POST['pid'];
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$position = $_POST['position'];
$expert = $_POST['expert'];
//$phone = $_POST['phonenumber'];
$office = $_POST['office'];
//$address = $_POST['address'];


$q = "UPDATE professor SET title = '$title',firstname = '$firstname',lastname = '$lastname',position = '$position',expert = '$expert',office = '$office' WHERE pid = '$pid'";


$result = mysqli_query($connect, $q);

if ($result) {
    header("Location: profile.php");
} else {
    echo "Fail" . mysqli_error($connect);
}

mysqli_close($connect);
?>