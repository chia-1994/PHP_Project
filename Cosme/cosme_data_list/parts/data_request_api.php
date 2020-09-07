<?php

require __DIR__ .'/_connect_db.php';

$perPage = 5;
$output = [
    'perPage' => 0,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => 0,
    'rows' => [],
];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$t_sql = "SELECT COUNT(1) FROM`product_cosme`";
$output['totalRows'] = $totalRows = $pdo -> query($t_sql) -> fetch(PDO::FETCH_NUM)[0];
$output['totalPages'] = $totalPages = ceil($totalRows / $perPage);

if($totalRows > 0){
    if($page < 1){
        header('Location: data-list.php');
        exit;
    }
    if($page > $totalPages){
        header('Location: data-list.php?page='. $totalPages);
        exit;
    };
    $output['page'] = $page;
    $sql = sprintf("SELECT * FROM `product_cosme` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo -> query($sql);
    $output['rows'] = $stmt -> fetchAll();
    $rows = $output['rows'];
};

?>
