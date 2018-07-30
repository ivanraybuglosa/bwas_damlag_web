<?php

$dbHost = 'localhost';
$dbName = 'android_db';
$dbUser = 'root';
$dbPass = '';

    try {
        $config = new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUser,$dbPass);
        $config->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    include_once('web_config.php');

    $pdo = new Config($config);
    date_default_timezone_set('Asia/Manila');
?>