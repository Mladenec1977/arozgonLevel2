<?php
try {
    $pdo = new PDO('mysql:host=arozgon2.ua;dbname=arozgon2','root','root');
} catch (PDOException $e) {
    http_response_code (500);
    $error = ['error' => 'Error connecting to database'];
    echo json_encode($error);
}