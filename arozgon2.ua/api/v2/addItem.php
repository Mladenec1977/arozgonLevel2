<?php
require_once 'constant.php';

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);
$text = $array_name['text'];
if ($text == null) {
    exit();
}

$connect = mysqli_connect('arozgon2.ua', 'root', 'root', 'arozgon2');
if ($connect == false) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
}
$sql = "INSERT INTO basatydo (id, text, checked) VALUES (null, '$text', 1)";
$result = mysqli_query($connect, $sql);

if ($result == false) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
} else {
    $tydo_id = mysqli_insert_id($connect);
    $array_id = [id => $tydo_id];
    echo json_encode($array_id);
}
?>