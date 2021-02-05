<?php include '../connectdb.php';

    $professor_name = $_POST['professor_name'];
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = "0";

    $q = "INSERT INTO booking (user_name, professor_name, subject, detail, date, time, status) VALUES ('$user_name', '$professor_name', '$subject', '$detail', '$date', '$time', '$status')";

    $result = mysqli_query($connect, $q );

    if($result) {
        header("Location: booking.php");
    }
    else {
        echo "Fail" . mysqli_error($connect);
    }

    mysqli_close($connect);
?>