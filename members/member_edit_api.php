<?php
require __DIR__ . '/connect_database.php';

header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

if (empty($_POST['id'])) {
    $output['code'] = 400;
    $output['error'] = '沒有 id';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['name']) < 2) {
    $output['code'] = 410;
    $output['error'] = '姓名長度要大於 2';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $_POST['email'])) {
    $output['code'] = 420;
    $output['error'] = 'email格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{6,})$/', $_POST['pwd'])) {
    $output['code'] = 430;
    $output['error'] = '密碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['tel'])) {
    $output['code'] = 440;
    $output['error'] = '手機號碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



$sql_str = "UPDATE `members` SET 
    `name`=?, 
    `email`=?, 
    `pwd`=?, 
    `id_number`=?, 
    `tel`=?, 
    `gender`=?, 
    `birth`=?, 
    `address`=?, 
    `level`=null
    WHERE `id`=?";



$sql = $pdo->prepare($sql_str);
$sql->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['pwd'],
    $_POST['id_number'],
    $_POST['tel'],
    $_POST['gender'],
    $_POST['birth'],
    $_POST['address'],
    $_POST['id'],
]);

if ($sql->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
