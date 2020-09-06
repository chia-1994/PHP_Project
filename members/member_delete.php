<?=
    require __DIR__ . '/connect_database.php';

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'member_list.php';

if (empty($_GET['id'])) {
    header('Location: ' . $referer);
    exit;
}

$id = intval($_GET['id']) ?? 0;

$sql_str = "DELETE FROM `members` WHERE id=$id ";

$pdo->query($sql_str);

header('Location: ' . $referer);
?>