<?php
require_once 'constant.php';
$read = file_get_contents(FILE_DIRECTORY);
$array1 = json_decode($read, true);
$array_items = ['items' => $array1];
echo json_encode($array_items);
?>