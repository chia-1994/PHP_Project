<?php
require __DIR__ . '/parts/connect.php';

// TODO: 檢查資料格式


// $sql = "INSERT INTO `orders`(
//      `ship_name`, 
//      `ship_phone`, 
//      `ship_Address`
//     --  `note`,
//     --  `payment_method`, 
//      ) VALUES (?, ?, ?)";

// $stmt = $pdo->prepare($sql);
// $stmt->execute([

//     $_POST['ship_name'],
//     $_POST['ship_phone'],
//     $_POST['ship_Address'],
//     // $_POST['note'],
//     // $_POST['payment_method'],
// ]);

// echo $stmt->rowCount();
// echo 'ok';
$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];



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


$sql = "INSERT INTO `orders`(
    `ship_name`, 
    `ship_phone`
     ) VALUES (?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['ship_name'],
    $_POST['ship_phone'],

]);

// echo $stmt->rowCount();
// echo 'ok';
if ($stmt->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
