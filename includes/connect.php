<?php

$dsn = "mysql:host=localhost;dbname=portfolio;charset=utf8mb4";
try {
    $connect = new PDO($dsn, 'root', '');
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('unable to connect');
}
?>