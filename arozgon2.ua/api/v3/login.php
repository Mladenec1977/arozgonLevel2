<?php
require_once 'constant.php';
require_once 'pdostart.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die();
}
session_destroy();
$read_front = file_get_contents('php://input');
$array_login = json_decode($read_front, true);

$login = $array_login['login'];
$pass = $array_login['pass'];

$sql = "SELECT * FROM tydo";
$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    if ($row['login'] == $login) {
        if ($row['password'] == $pass){
            $save_id = $row['idlog'];
            $arr_cookie_options = ['expires' => time() + 86400, 'path' => '/', 'domain' => 'arozgon2.ua',
                'secure' => true, 'httponly' => true, 'samesite' => 'None'];
            setcookie('TestCookie', 'The Cookie Value', $arr_cookie_options);
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['idlog'] = $save_id;
            $answer = ['ok' => true];
            echo json_encode($answer);
            exit();
        }
    }
}
$answer = ['ok' => false];
echo json_encode($answer);
?>