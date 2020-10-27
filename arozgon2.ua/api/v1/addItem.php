<?php
require_once 'constant.php';

$read_front = file_get_contents('php://input');
$array_name = json_decode($read_front, true);
$text = $array_name['text'];
if ($text == null) {
    exit();
}
if (!file_get_contents(FILE_ID_ITEMS)) {
    file_put_contents(FILE_ID_ITEMS, 0);
}
$id_lost = file_get_contents(FILE_ID_ITEMS);
$id_next = $id_lost + 1;
file_put_contents(FILE_ID_ITEMS, $id_next);
$array_next_id = ['id' => $id_next];

$array_add = ['id' => $id_next, 'text' => $text, 'checked' => true];
$a1 = array();
if (!file_get_contents(FILE_DIRECTORY)) {
    $a1 = [$array_add];
    file_put_contents(FILE_DIRECTORY, json_encode($a1));
} else {
    $read_a1 = file_get_contents(FILE_DIRECTORY);
    $a1 = json_decode($read_a1, true);
    array_push($a1, $array_add);
    file_put_contents(FILE_DIRECTORY, json_encode($a1));
}
echo json_encode($array_next_id);
?>