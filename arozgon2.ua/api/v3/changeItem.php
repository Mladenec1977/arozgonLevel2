<?php
session_start();
require_once 'constant.php';
require_once 'pdostart.php';
require_once 'check_string.php';
if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    die();
}

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);

$id = $array_name['id'];
$text = check_string_html($array_name['text']);
$chec = 1;
if ($array_name['checked'] == false) {
    $chec = 0;
}
$sql = "UPDATE basatydo SET text='$text', checked='$chec' WHERE id='$id'";
$result = $pdo->exec($sql);
if ($result == 1) {
    $answer = ['ok' => true];
    echo json_encode($answer);
} else {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
    $answer = ['ok' => false];
    echo json_encode($answer);
}
?>