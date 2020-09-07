<?php
require __DIR__ . '/parts/__connect_db.php';

$output = [
    'seccess' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// TODO: 檢查模式
//以下為設定讓表單送出後匯入資料表

if($_POST)

$sql = "INSERT INTO `clothes_category`(
    `gender`, `name`, `class`, `color`, 
    `size`, `price`, `vendor`, `added_time`
    ) VALUES(?,?,?,?,?,?,?,NOW())";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['gender'],
    $_POST['name'],
    $_POST['class'],
    $_POST['color'],
    $_POST['size'],
    $_POST['price'],
    $_POST['vendor'],
]);

//以下不懂 用複製的

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);


// echo $stmt->rowCount();

// <!-- `sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time` -->
// 在SQL時一律用雙引號

// echo 'OK';