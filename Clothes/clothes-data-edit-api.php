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

// if($_POST)

$sql = "UPDATE `clothes_category` SET
`name`=?,
`color`=?,
`size`=?,
`price`=?,
`vendor`=?
 WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['color'],
    $_POST['size'],
    $_POST['price'],
    $_POST['vendor'],
    $_POST['sid'],
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