<?php
require __DIR__ . '/parts/connect.php';


$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'test.orders-list.php';

if (empty($_GET['sid'])) {
    header('Location: ' . $referer);
    exit;
}
$sid = intval($_GET['sid']) ?? 0;

$pdo->query("DELETE FROM orders WHERE sid=$sid ");
header('Location: ' . $referer);
