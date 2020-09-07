<?php

require __DIR__. '/_connect_db.php';

$referer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : 'cosme_data_list.php';

if(empty($_GET['sid'])){
    header('Location: '. $referer);
    exit;
}
$sid = intval($_GET['sid']) ?? 0;

$pdo->query("DELETE FROM product_cosme WHERE sid=$sid");
header('Location: '. $referer);

?>
