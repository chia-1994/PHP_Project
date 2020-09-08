<?php

require __DIR__ . '../../parts/connect.php';

$perPage = 10; // 每頁有幾筆資料
// 如果用戶有輸入就跳到用戶輸入的頁數 沒有輸入 就跳到第一頁
$search = isset($_POST['search']) ? $_POST['search'] : '';

$where = ' WHERE ';
if ($search) {
    // $search2 = $pdo->quote("%$search%");  // avoid SQL injection
    $where .= " (`name` LIKE '%$search%' OR `firm` LIKE '%$search%') ";
}


$output = [
    'perPage' => $perPage,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => 0,
    'rows' => [],
];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 到shoplist撈資料
// 塞選過期時間

if ($search) {
    $t_sql = "SELECT COUNT(1) FROM `shop_list` $where";
    // 總共有幾筆
} else {
    $t_sql = "SELECT COUNT(1) FROM `shop_list` WHERE unix_timestamp(expried) > unix_timestamp(now())  ";
    // 總共有幾筆
}

$output['totalRows'] = $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// 總頁數= 總比數 除以一頁有幾筆
$output['totalPages'] = $totalPages = ceil($totalRows / $perPage);


// 如果撈到的總筆數大於0 
if ($totalRows > 0) {
    // 如果用戶輸入小於1 跳轉到第一頁
    if ($page < 1) {
        $page = 1;
    }
    // 如果用戶輸入的頁數 大於 總頁數 跳轉到最後一頁 用.去串接 $totalPages 相當於js +號的字串相接
    if ($page > $totalPages) {
        $page = $totalPages;
    };
    $output['page']  = $page;                           //從0開始 拿五筆
    // sql = 篩選到 全部的資料    第一頁 LIMIT = 1-1*5 拿五筆 =0~5 以此類推
    // 塞選過期時間
    $sql = sprintf("SELECT * FROM `shop_list` WHERE unix_timestamp(expried) > unix_timestamp(now())  ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $sql2 = sprintf("SELECT * FROM `shop_list` %s LIMIT %s, %s", $where, ($page - 1) * $perPage, $perPage);
    //stmt = 拿sql 的 筆數  (ex limit 0,5 從第0筆開始 撈五筆)
    $stmt = '';
    if ($search) {
        $stmt = $pdo->query($sql2);
    } else {
        $stmt = $pdo->query($sql);
    }

    // 把他塞到 rows 裡面 然後 下面利用foreach呈現在表格上
    $output['rows'] = $stmt->fetchAll();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
