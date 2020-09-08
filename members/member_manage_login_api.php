<?php
require __DIR__ . '/connect_database.php';
$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$accound = isset($_POST['account']) ? $_POST['account'] : '';
$password = isset($_POST['pwd']) ? $_POST['pwd'] : '';

$sql_str = "SELECT `id`, `account`, `pwd` , `name` FROM `manage` WHERE `account`=? AND `pwd`=?";
$sql = $pdo->prepare($sql_str);
$sql->execute([
    $accound,
    $password,
]);

if ($sql->rowCount()) {
    $output['success'] = true;
    $_SESSION['admin'] = $sql->fetch();
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
