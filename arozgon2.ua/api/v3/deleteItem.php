<?php
session_start();
require_once 'constant.php';
require_once 'pdostart.php';
if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
    die();
}

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);

$delete_id = $array_name["id"];

$sql = "DELETE FROM `basatydo` WHERE id = '$delete_id'";
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