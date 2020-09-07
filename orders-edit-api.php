<?php
require __DIR__ . '/parts/connect.php';
// require __DIR__ . '/parts/admin_required.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];


if (empty($_POST['sid'])) {
    $output['code'] = 405;
    $output['error'] = '沒有 sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['ship_name']) < 2) {
    $output['code'] = 410;
    $output['error'] = '姓名長度要大於 1';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['ship_phone'])) {
    $output['code'] = 420;
    $output['error'] = '手機號碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$sql = "UPDATE `orders` SET 
    `ship_name`=?,
    `ship_phone`=?,
    `ship_Address`=?,
    `payment_method`=?,
    `note`=?
    WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['ship_name'],
    $_POST['ship_phone'],
    $_POST['ship_Address'],
    $_POST['pay_sid'],
    $_POST['note'],
    $_POST['sid'],
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
