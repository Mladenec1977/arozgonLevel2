<?php
require_once 'constant.php';

$read_front = file_get_contents('php://input');
$array_login = json_decode($read_front, true);

if ($array_login == null) {
    $answer = ['ok' => false];
    echo json_encode($answer);
    exit();
}
if (!file_get_contents(FILE_LOGIN_PASS)) {
    $save = [$array_login];
    file_put_contents(FILE_LOGIN_PASS, json_encode($save));
    $answer = ['ok' => true];
    echo json_encode($answer);
    exit();
}
$read_a1 = file_get_contents(FILE_LOGIN_PASS);
$a1 = json_decode($read_a1, true);

for ($i = 0, $size = count($a1); $i < $size; ++$i) {
    if ($a1[$i]["login"] == $array_login["login"]) {
        $answer = ['ok' => false];
        echo json_encode($answer);
        exit();
    }
}
array_push($a1, $array_login);
file_put_contents(FILE_LOGIN_PASS, json_encode($a1));
$answer = ['ok' => true];
echo json_encode($answer);
?>