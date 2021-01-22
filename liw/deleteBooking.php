<?php
    include 'connectdb.php';

    $bid = $_POST['bid'];

    $connect->query("DELETE FROM booking WHERE bid = '".$bid."'");
?>