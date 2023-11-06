<?php
session_start();
$config = require_once('config.php');
try {
    $db = new PDO("mysql: host={$config['host']}; dbname={$config['database']}; charset=utf8", $config['user'], $config['password'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $error) {
    exit('Error: ' . $error->getCode());
}
