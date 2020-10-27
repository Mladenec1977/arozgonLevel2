<?php
require_once 'constant.php';

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);

if ($array_name == null) {
    $answer = ['ok' => false];
    echo json_encode($answer);
    exit();
}
$read_a1 = file_get_contents(FILE_DIRECTORY);
$a1 = json_decode($read_a1, true);

for ($i = 0, $size = count($a1); $i < $size; ++$i) {
    if ($a1[$i]["id"] == $array_name["id"]) {
        $a1[$i] = $array_name;
        file_put_contents(FILE_DIRECTORY, json_encode($a1));
        $answer = ['ok' => true];
        echo json_encode($answer);
        exit();
    }
}
$answer = ['ok' => false];
echo json_encode($answer);
?>