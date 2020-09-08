<?php
$page_title = '編輯資料';
$page_name = 'data-edit';
require __DIR__. '/_connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if(empty($sid)){
    header('Location: cosme_data_list.php');
    exit;
}

$sql = " SELECT * FROM product_cosme WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();
if(empty($row)){
    header('Location: cosme_data_list.php');
    exit;
}


?>
<?php

require __DIR__. '/_connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

if(empty($_POST['sid'])){
    $output['code'] = 405;
    $output['error'] = '沒有 sid';
    exit;
}

$sql = "UPDATE `product_cosme` SET 
    `product`=?,
    `price`=?,
    `amount`=?,
    `vender`=?,
    `created_at`=NOW(),
    WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
        $_POST['product'],
        $_POST['price'],
        $_POST['amount'],
        $_POST['vender'],
]);

if($stmt->rowCount()){
    $output['success'] = true;
}

?>
