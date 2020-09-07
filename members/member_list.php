<?php
$page_title = '會員列表';
$page_name = 'member_list';
require __DIR__ . '/connect_database.php';

$total_sql_str = "SELECT COUNT(*) FROM `members`";

$per_page = 3;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$total_rows = $pdo->query($total_sql_str)->fetch(PDO::FETCH_NUM)[0];


$total_pages = ceil($total_rows / $per_page);

$row = [];

if ($total_rows > 0) {
    if ($page < 1) {
        header('Location:member_list.php');
        exit;
    };
    if ($page > $total_pages) {
        header('Location:member_list.php?=page' . $total_pages);
        exit;
    };
    $datas_sql = sprintf("SELECT * FROM `members` ORDER BY id DESC LIMIT %s,%s", ($page - 1) * $per_page, $per_page);


    $rows = $pdo->query($datas_sql)->fetchAll();
};


?>


<?php require __DIR__ . '../../parts/html_head.php'; ?>
<?php require __DIR__ . '../../parts/navbar.php'; ?>

<div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">電郵</th>
                    <th scope="col">密碼</th>
                    <th scope="col">身分證字號</th>
                    <th scope="col">手機</th>
                    <th scope="col">性別</th>
                    <th scope="col">生日</th>
                    <th scope="col">地址</th>
                    <th scope="col">等級</th>
                    <th scope="col"><i class="fas fa-edit"></i></th>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['pwd'] ?></td>
                        <td><?= $r['id_number'] ?></td>
                        <td><?= $r['tel'] ?></td>
                        <td><?= $r['gender'] ?></td>
                        <td><?= $r['birth'] ?></td>
                        <td><?= $r['address'] ?></td>
                        <td><?= $r['level'] ?></td>
                        <td scope="col"><a href="member_edit.php?id=<?= $r['id'] ?>"><i class="fas fa-edit"></i></a></td>
                        <td scope="col">
                            <a href="member_delete.php?id=<?= $r['id'] ?>" onclick="if_click_delete(event)" icon_id="<?= $r['id'] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = $page - 2; $i <= $page + 2; $i++) :
                            if ($i < 1) continue;
                            if ($i > $total_pages) break;
                        ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>


    </div>
</div>


<?php require __DIR__ . '../../parts/scripts.php'; ?>
<script>
    function if_click_delete(event) {
        const a = event.currentTarget;
        const del_icon_id = a.getAttribute('icon_id');
        if (!confirm(`是否要刪除編號為 ${del_icon_id} 的資料?`)) {
            event.preventDefault();
        }
    };
</script>
<?php require __DIR__ . '../../parts/html_foot.php'; ?>