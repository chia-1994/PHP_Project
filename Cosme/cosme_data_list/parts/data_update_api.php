<?php
require __DIR__. '/_connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => '',
];

if(empty($_POST['sid'])){
    $output['code'] = 405;
    $output['error'] = '沒有 sid';
//    exit;
}

$sql = "UPDATE `product_cosme` SET 
    `product`=?,
    `price`=?,
    `amount`=?,
    `vender`=?,
    `created_at`=NOW()
    WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
        $_POST['product'],
        $_POST['price'],
        $_POST['amount'],
        $_POST['vender'],
        $_POST['sid']
]);

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
