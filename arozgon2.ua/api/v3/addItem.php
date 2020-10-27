<?php
session_start();
require_once 'constant.php';
require_once 'pdostart.php';
require_once 'check_string.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die();
}

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);
$text = check_string_html($array_name['text']);
if ($text == null) {
    exit();
}
$idlog = 0;
if (isset($_SESSION['idlog'])) {
    $idlog = $_SESSION['idlog'];
}


$sql = "INSERT INTO basatydo (id, text, checked, idlog) VALUES (null, '$text', 1, '$idlog')";
$result = $pdo->exec($sql);

if ($result == 1) {
    $array_id = [id => $idlog];
    echo json_encode($array_id);
} else {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
}
?>