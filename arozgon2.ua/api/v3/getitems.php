<?php
session_start();
require_once 'constant.php';
require_once 'pdostart.php';

$sql = "SELECT * FROM basatydo";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
$array_copy =[];
$idlog = 0;
if (isset($_SESSION['idlog'])) {
    $idlog = $_SESSION['idlog'];
}
for ($i = 0; $i < count($rows); $i++) {
    if ($rows[$i]['idlog'] == $idlog) {
        $array_copy1 = [];
        if ($rows[$i]['checked'] == 0) {
            $array_copy1 = ['id' => $rows[$i]['id'], 'text' => $rows[$i]['text'], 'checked' => false];
        } else {
            $array_copy1 = ['id' => $rows[$i]['id'], 'text' => $rows[$i]['text'], 'checked' => true];
        }
        array_push($array_copy, $array_copy1);
    }
}

$array_items = ['items' => $array_copy];
echo json_encode($array_items);
?>