<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://front.ua');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Authorization');
define("FILE_ID_ITEMS", 'iditems.txt');
define("FILE_DIRECTORY", 'directory.json');
define("FILE_LOGIN_PASS", 'loginpass.json');
?>