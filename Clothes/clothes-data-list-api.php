<?php
require __DIR__ . '/parts/__connect_db.php';  //連線到資料庫

$perPage = 6; //每頁有幾筆資料

$output=[
    'perPage'=> $perPage,
    'totalRows'=> 0,
    'totalPages'=> 0,
    'page'=> 0,
    'rows'=> [],
    ];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //頁數為整數

$t_sql = "SELECT COUNT(*)FROM `clothes_category`";

$output['totalRows'] = $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$output['totalPages'] = $totalPages = ceil($totalRows / $perPage); //總頁數

$rows = [];

if ($totalRows > 0) {  //如果有資料才做  還有一個轉向的作法

    if ($page < 1) $page = 1; //???????
    if ($page > $totalPages) $page = $totalPages;

    $output['page'] = $page;

    $sql = sprintf("SELECT * FROM `clothes_category`ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);
    $output['rows'] = $stmt->fetchAll();
}

//在HTML出現前拿資料(一般的準則)

echo json_encode($output, JSON_UNESCAPED_UNICODE);

