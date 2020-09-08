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

$sql_str = "SELECT `id`, `name`,`email`,`pwd`,`id_number`,`tel`,`gender`,`birth`,`address` ,`level` FROM `members` WHERE `email`=? AND `pwd`=?";
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
