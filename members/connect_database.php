<?php 
$db_host = 'localhost';
$db_name = 'triangle';
$db_user = 'lin';
$db_pass = 'lin';

$dsn = "mysql:host={$db_host};dbname={$db_name}";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
];

$pdo = new PDO($dsn,$db_user,$db_pass,$pdo_options);


if (!isset($_SESSION)) {
    session_start();
}
