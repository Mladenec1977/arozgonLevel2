<?php
require_once 'constant.php';
require_once 'pdostart.php';
require_once 'check_string.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die();
}

$read_front = file_get_contents('php://input');
$array_login = json_decode($read_front, true);
$login = $array_login['login'];
$pass = $array_login['pass'];

$sql = "SELECT * FROM tydo";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    if ($row['login'] == $login) {
        $answer = ['ok' => false];
        echo json_encode($answer);
        exit();
    }
}
$sql2 = "INSERT INTO `tydo` (idlog, login, password) VALUES (NULL, '$login', '$pass')";
$result2 = $pdo->exec($sql2);
if ($result2 == 1) {
    $answer = ['ok' => true];
    echo json_encode($answer);
} else {
    $answer = ['ok' => false];
    echo json_encode($answer);
}