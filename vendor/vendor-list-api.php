<?php

require __DIR__ . '/connect_db.php';

$account = $_SESSION["admin"]["vendor_name"];

$perPage = 3; // 每頁有幾筆資料
// 如果用戶有輸入就跳到用戶輸入的頁數 沒有輸入 就跳到第一頁
$output = [
    'perPage' => $perPage,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => 0,
    'rows' => [],
];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($account=='king') {
    $t_sql = "SELECT COUNT(1) FROM `vendor-list`";
    $output['totalRows'] = $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// 總頁數= 總比數 除以一頁有幾筆


} else {

    $sql = "SELECT * FROM `vendor-list` WHERE `vendor_name`=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $account,
    ]);

// 總共有幾筆
    $output['totalRows'] = $totalRows = $stmt->fetch(PDO::FETCH_NUM)[0];
// 總頁數= 總比數 除以一頁有幾筆
}
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
    if ($account=='king') {
        $t_sql = sprintf("SELECT * FROM `vendor-list` ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

        $stmt = $pdo->query($t_sql);
        $output['rows'] = $stmt->fetchAll();

//        $output['totalRows'] = $totalRows = $stmt->fetch(PDO::FETCH_NUM)[0];
//        $output['totalPages'] = $totalPages = ceil($totalRows / $perPage);

    } else {
        $output['account'] = $account;
        $sql = sprintf("SELECT * FROM `vendor-list` WHERE `vendor_name`=? ");
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $account,
        ]);
        $output['rows'] = $stmt->fetchAll();
//        $output['totalRows'] = $totalRows = $stmt->fetch(PDO::FETCH_NUM)[0];
//        $output['totalPages'] = $totalPages = ceil($totalRows / $perPage);
        // 把他塞到 rows 裡面 然後 下面利用foreach呈現在表格上



    }
    //stmt = 拿sql 的 筆數  (ex limit 0,5 從第0筆開始 撈五筆)


}
echo json_encode($output, JSON_UNESCAPED_UNICODE);