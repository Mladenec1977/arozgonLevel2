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
$a2 = array();
for ($i = 0, $size = count($a1); $i < $size; ++$i) {
    if ($a1[$i]["id"] != $array_name["id"]) {
        array_push($a2, $a1[$i]);
    }
}
if (count($a2) == 0) {
    file_put_contents(FILE_ID_ITEMS, 0);
}
file_put_contents(FILE_DIRECTORY, json_encode($a2));
$answer = ['ok' => true];
echo json_encode($answer);
?>