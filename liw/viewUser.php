<?php

include 'connectdb.php';

$query = $connect->query("SELECT * FROM user ");
$result = array();

while ($rowData = $query->fetch_assoc()) {
    $result[] = $rowData;
}

echo json_encode($result);

