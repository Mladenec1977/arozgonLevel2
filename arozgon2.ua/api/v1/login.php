<?php
require_once 'constant.php';
session_start();

$read_front = file_get_contents('php://input');
$array_login = json_decode($read_front, true);

if ($array_login == null) {
    $answer = ['ok' => false];
    echo json_encode($answer);
    exit();
}
if (!file_get_contents(FILE_LOGIN_PASS)) {
    $answer = ['ok' => false];
    echo json_encode($answer);
    exit();
}
$read_a1 = file_get_contents(FILE_LOGIN_PASS);
$a1 = json_decode($read_a1, true);

for ($i = 0, $size = count($a1); $i < $size; ++$i) {
    if ($a1[$i]["login"] == $array_login["login"]) {
        if ($a1[$i]["pass"] == $array_login["pass"]){
            $answer = ['ok' => true];
            echo json_encode($answer);
            exit();
        }
    }
}
$answer = ['ok' => false];
echo json_encode($answer);
?>