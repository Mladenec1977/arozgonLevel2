<?php
require_once 'constant.php';

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);
if ($array_name == null) {
    $answer = ['ok' => false];
    echo json_encode($answer);
    exit();
}

$connect = mysqli_connect('arozgon2.ua', 'root', 'root', 'arozgon2');
if ($connect == false) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
}
$id = $array_name['id'];
$text = $array_name['text'];
$chec = 1;
if ($array_name['checked'] == false) {
    $chec = 0;
}

$sql = "UPDATE basatydo SET text='$text', checked='$chec' WHERE id='$id'";
$result = mysqli_query($connect, $sql);

if ($result == false) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
    $answer = ['ok' => false];
    echo json_encode($answer);
} else {
    $answer = ['ok' => true];
    echo json_encode($answer);
}
?>