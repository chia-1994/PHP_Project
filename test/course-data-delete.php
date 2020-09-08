<?php
require __DIR__ . '/parts/__course_connect_db.php';
// require __DIR__ . './parts/admin_required.php';
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'course-data-list.php';

if (empty($_GET['sid'])) {
    header('Location: ' . $referer);
    exit;
}
$sid = intval($_GET['sid']) ?? 0;

$pdo->query("DELETE FROM course_list WHERE sid=$sid ");
header('Location: ' . $referer);
