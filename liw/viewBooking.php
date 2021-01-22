<?php
    include 'connectdb.php';

    $query = $connect->query("SELECT *, DATE_FORMAT(date,'%d-%m-%Y') AS niceData FROM booking");
    $result = array();

    while ($rowData = $query->fetch_assoc()) {
        $result[] = $rowData;
    }

    echo json_encode($result);
