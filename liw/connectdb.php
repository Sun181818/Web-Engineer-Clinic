
<?php


    $db_host = "localhost"; // localhost server
    $db_user = "root"; // database username
    $db_password = "123456789"; // database password
    $db_name = "bookingdb"; // database name

    $connect = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if(mysqli_connect_error($connect)){
        echo 'Fail to connect' . mysqli_connect_error();
    }

    try {

        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        $e->getMessage();
    }


?>