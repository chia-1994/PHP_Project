<?php

$db_host = "localhost";
$db_name = "mo";
$db_user = "root";
$db_pass = "";

$dsn = "mysql:host={$db_host};dbname={$db_name}";

//連線設定 pdo是一個模組 用這個模組需要一個dsn
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  //attr：錯誤的模式
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //讀出來是關連式陣列
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"  //第一次連線要做什麼

];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);  //除錯用的功能

define('WEB_ROOT', '/project');

// if (!isset($_SESSION)) {
//     session_start();
// }
