<?php
$page_title = '首頁';
require __DIR__ . '/parts/connect.php';

$stmt = $pdo->query("SELECT * FROM `ShoppingCart` LIMIT 5");

$rows = $stmt->fetchAll();
?>



<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>


<?php include __DIR__ . '/parts/__html_foot.php'; ?>