<?php include '../connectdb.php';

    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $subject = $_POST['subject'];
    $detail = $_POST['detail'];
    $status = "0";
    $created_at = date('Y-m-d H:i:s');
    $updated_at = $created_at;

    $q = "INSERT INTO booking (uid, pid, date,time,subject,detail,status,created_at,updated_at) VALUES ('$uid', '$pid', '$date', '$time', '$subject', '$detail', '$status', '$created_at','$updated_at')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: booking.php");
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>