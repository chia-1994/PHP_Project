<?php
require __DIR__ . './parts/__course_connect_db.php';
// require __DIR__. './parts/admin_required.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

if (empty($_POST['sid'])) {
    $output['code'] = 990;
    $output['error'] = '沒有sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


// TODO: 檢查資料格式

if (mb_strlen($_POST['teacher']) < 2) {
    $output['code'] = 410;
    $output['error'] = '姓名長度要大於2個字';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['course_name']) < 2) {
    $output['code'] = 420;
    $output['error'] = '請填寫課程名稱';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['course_type']) < 2) {
    $output['code'] = 430;
    $output['error'] = '請填寫課程類型';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['date']) < 2) {
    $output['code'] = 440;
    $output['error'] = '請看指引填寫日期格式';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['course_time']) < 2) {
    $output['code'] = 450;
    $output['error'] = '請看指引填寫上課時間';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['place']) < 2) {
    $output['code'] = 460;
    $output['error'] = '請填寫課程類型';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['members']) < 2) {
    $output['code'] = 470;
    $output['error'] = '姓名長度要大於2個字';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['price']) < 2) {
    $output['code'] = 480;
    $output['error'] = '請填寫課程名稱';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (mb_strlen($_POST['on_sale']) < 2) {
    $output['code'] = 490;
    $output['error'] = '請填寫課程類型';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `course_list` (`teacher`, `course_name`, `course_type`, `date`, `course_time`, `place`, `members`, `price`, `on_sale`, `introduction`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$sql = "UPDATE `course_list` SET 
`teacher`=?,
`course_name`=?,
`course_type`=?,
`date`=?,
`course_time`=?,
`place`=?,
`members`=?,
`price`=?,
`on_sale`=?,
`introduction`=? 
WHERE `sid`=?";


$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['teacher'],
    $_POST['course_name'],
    $_POST['course_type'],
    $_POST['date'],
    $_POST['course_time'],
    $_POST['place'],
    $_POST['members'],
    $_POST['price'],
    $_POST['on_sale'],
    $_POST['introduction'],
    $_POST['sid']
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
