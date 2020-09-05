<?php
require __DIR__ . '/text10.php';
// 這行是寫給瀏覽器看的 讓他知道我們傳送的是json
header('Content-Type: application/json');
// TODO: 檢查資料格式
$output = [
    // 如果成功前端成功post到後端  success會變true 預設值是false
    'success' => false,
    // 把資料送回前端 (你送啥就傳啥回去) 讓前端知道自己傳送什麼
    'postData' => $_POST,
    // 這個數字代表 不同的狀況而已 不必糾結 
    'code' => 0,
    // 預設值是空的 如果前端出現錯誤 把 哪裡錯了填進去提醒他
    'error' => ''
];

// TODO: 檢查資料格式
// email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
// mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;


// 檢查用戶輸入的名字 如果小於二 把'姓名長度要大於 2'填入error 提醒使用者
// mb_strlen 是 語法 判斷字串長度的語法 
if (mb_strlen($_POST['name']) < 2) {
    $output['code'] = 410;
    $output['error'] = '姓名長度要大於 2';
    // 錯了就立即結束程式 不在繼續往下執行 exit會直接終止程式 
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// preg_match 語法 第一個放正規表達式 第二個放你想檢查的東西 這邊我們檢查的是 使用者輸入的資料 第三個是你要用什麼變數接收他 這裡我們不需要第三個變數 
// 檢查用戶輸入的手機 如果不符合正規表達式 跳出手機號碼格式錯誤
if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['mobile'])) {
    $output['code'] = 420;
    $output['error'] = '手機號碼格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`,
 `birthday`, `address`, `created_at`
 ) VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);
// 如果成功 就把 success改成成功 
if ($stmt->rowCount()) {
    $output['success'] = true;
}
// 把$output用json的格式送到前端 讓前端讀得懂代碼 
echo json_encode($output, JSON_UNESCAPED_UNICODE);
