<?php
require __DIR__ . '/parts/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `course_list` WHERE 1");

echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
// echo json_encode($stmt->fetchAll(PDO::FETCH_NUM), JSON_UNESCAPED_UNICODE);  // 索引式陣列
// echo json_encode($stmt->fetchAll(PDO::FETCH_BOTH), JSON_UNESCAPED_UNICODE); // 給兩種: 索引式 + 關聯式
