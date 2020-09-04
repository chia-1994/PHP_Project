<?php
$page_title = '資料列表';
require __DIR__ . '/text10.php';

$perPage = 5; // 每頁有幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM `address_book`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// die('~~~'); //exit; // 結束程式
// 總頁數 = 總比數 除以一頁有幾筆 例如 6筆資料 6/5...1  =兩頁  ceil=無條件進位
$totalPages = ceil($totalRows / $perPage);

$rows = [];
// 如果總比數大於0
if ($totalRows > 0) {
    // 如果用戶輸入的頁數小於1 跳轉到自己
    if ($page < 1) {
        header('Location: quary.php');
        exit;
    }
    // 如果用戶輸入的數字大於總頁數 跳轉到最後一頁
    if ($page > $totalPages) {
        header('Location: quary.php?page=' . $totalPages);
        exit;
    };

    $sql = sprintf("SELECT * FROM `address_book` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}

?>

<?php require __DIR__ . '/part/header.php'; ?>
<?php require __DIR__ . '/part/narbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"> <a class="page-link" href="?page=<?= $page - 1 ?>" href="#">>Previous</a></li>
                    <!-- 看有幾頁 就會出現幾個按鈕  -->
                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        if ($i < 1) continue;
                        if ($i > $totalPages) break;

                    ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page + 1 ?>" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
    </div>
    <table class="table table-striped">
        <!-- `sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at` -->
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col"><i class="fas fa-user-times"></i></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">電郵</th>
                <th scope="col">手機</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
                <th scope="col"><i class="fas fa-edit"></i></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a href="del.php?sid=<?= $r['sid'] ?>" onclick="ifDel(event)" data-sid="<?= $r['sid'] ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a></td>
                    <!-- 第二種方法 當點擊超連結 呼叫function delete_it -->
                    <td><a href="javascript:delete_it(<?= $r['sid'] ?>)">
                            <i class="fas fa-user-times"></i>
                        </a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <!-- 同下  -->
                    <td><?= htmlentities($r['birthday']) ?></td>
                    <!-- 防止 別人寫入js破壞檔案 這行會破壞輸入的標籤 其實
                  每行都該加入 但我懶 -->
                    <td><?= strip_tags($r['address']) ?></td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php include __DIR__ . '/part/js.php'; ?>
<script>
    // 
    function ifDel(event) {
        const a = event.currentTarget;
        console.log(event.target, event.currentTarget);
        // getAttribute get到屬性名為data-sid 的dom
        const sid = a.getAttribute('data-sid');
        // 如果按下不同意 就取消del
        if (!confirm(`是否要刪除編號為 ${sid} 的資料?`)) {
            event.preventDefault(); // 取消連往 href 的設定 相當於 onsumit retrun false
        }
    }
    // 如果按是 就執行del檔案
    function delete_it(sid) {
        if (confirm(`是否要刪除編號為 ${sid} 的資料???`)) {
            location.href = 'del.php?sid=' + sid;
        }
    }

    // 這是第二種方法較為方便 當點擊超連結 觸發這個function
    function delete_it(sid) {
        if (confirm(`是否要刪除編號為 ${sid} 的資料???`)) {
            location.href = 'del.php?sid=' + sid;
        }
    }
</script>
<?php include __DIR__ . '/part/foot.php'; ?>