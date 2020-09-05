<?php
require __DIR__ . '/text10.php';
// (referer 代表從哪裡連結到這隻檔案的 他會紀錄在f12 network裡 這是瀏覽器的預設功能)
// $_SERVER['HTTP_REFERER'] 這是 預設的功能  如果isset 就連到REFERER 如果沒有REFERER 就連到'quary.php' 
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'quary.php';
// 如果沒有給想要刪除的SID 返回referer(referer 代表從哪裡連結到這隻檔案的 他會紀錄在f12 network裡 這是瀏覽器的預設功能)
if (empty($_GET['sid'])) {
    header('Location: ' . $referer);
    exit;
}
// 把sid轉換為 整數
$sid = intval($_GET['sid']) ?? 0;
// 刪掉sid的資料然後轉回 $referer
$pdo->query("DELETE FROM address_book WHERE sid=$sid ");
header('Location: ' . $referer);
