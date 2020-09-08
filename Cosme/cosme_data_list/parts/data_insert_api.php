<?php
require __DIR__. '/_connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => '',
];


$sql = "INSERT INTO `product_cosme`(`product`, `price`, `amount`, `vender`, `created_at`) 
VALUES (?,?,?,?,NOW())";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['product'],
    $_POST['price'],
    $_POST['amount'],
    $_POST['vender'],
    ]);

if ($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
