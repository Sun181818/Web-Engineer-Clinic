<?php

    $connect = mysqli_connect('localhost','root','','bookingdb');

    if(mysqli_connect_error($connect)){
        echo 'Fail ' . mysqli_connect_error();
    }

    $result = mysqli_query($connect,"SELECT * FROM booking");

?>

<?php while($row = mysqli_fetch_array($result)): ?>

    <tr>

<td><?php echo $row['bid'] ?></td>
<td><?php echo $row['subject'] ?></td>
<td><?php echo $row['user_name'] ?></td>
<td><?php echo $row['professor_name'] ?></td>
<td><?php echo $row['date'] ?></td>
<td><?php echo $row['time'] ?></td>
<td><?php echo $row['status'] ?></td>

<td><span class="badge badge-success">Accepted</span></td>
</tr>