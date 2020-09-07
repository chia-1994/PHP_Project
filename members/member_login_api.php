<?php
require __DIR__ . '/connect_database.php';
$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$accound = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['pwd']) ? $_POST['pwd'] : '';

$sql_str = "SELECT `id`, `email`, `pwd` FROM `members` WHERE `email`=? AND `pwd`=?";
$sql = $pdo->prepare($sql_str);
$sql->execute([
    $accound,
    $password,
]);

if ($sql->rowCount()) {
    $output['success'] = true;  //如果有資料(代表登入成功)就變true
    $_SESSION['members'] = $stmt->fetch();
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
