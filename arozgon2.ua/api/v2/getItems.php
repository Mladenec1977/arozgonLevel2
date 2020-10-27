<?php
require_once 'constant.php';
$connect = mysqli_connect('arozgon2.ua', 'root', 'root', 'arozgon2');
if ($connect == false) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
}
$sql = "SELECT * FROM basatydo WHERE 1";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) {
    if ($rows[$i]['checked'] == 0) {
        $rows[$i]['checked'] = false;
    } else {
        $rows[$i]['checked'] = true;
    }
}

$array_items = ['items' => $rows];
echo json_encode($array_items);
?>