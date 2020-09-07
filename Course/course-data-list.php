<?php
$page_title = '課程列表';
$page_name = 'course-data-list';
require __DIR__ . './parts/__connect_db.php';

$perPage = 10; // 每頁有幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM `course_list`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// die('~~~'); //exit; // 結束程式
$totalPages = ceil($totalRows / $perPage);

$rows = [];
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: course-data-list.php');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: course-data-list.php?page=' . $totalPages);
        exit;
    };

    $sql = sprintf("SELECT * FROM `course_list` ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}

?>


<?php require __DIR__ . './parts/__html_head.php'; ?>
<?php include __DIR__ . './parts/__navbar.php'; ?>
<style>
    .container {
        width: 85%;
        float: right;
        margin: 0 1vm 0 15vm;
    }

    .row {
        padding-right: 0px;
    }

    .creat_course {
        margin-left: 4rem;
        font-size: 18px;
        padding-top: 30px;
    }

    .col.d-flex.justify-content-end {
        font-size: 14px;
        padding-top: 30px;
    }

    .table {
        table-layout: fixed;
        min-width: 1920px;
        margin-left: 2rem;
        font-size: 14px;
        margin-top: 2rem;
        margin-right: 1rem;
    }

    th {
        background-color: #3c3c3c;
        text-align: center;
        color: #ffffff;
        font-weight: normal;
    }

    thead th:first-child,
    tbody td:first-child {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(2),
    tbody td:nth-child(2) {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(3),
    tbody td:nth-child(3) {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(4),
    tbody td:nth-child(4) {
        width: 10em;
    }

    thead th:nth-child(5),
    tbody td:nth-child(5) {
        width: 10em;
    }

    thead th:nth-child(6),
    tbody td:nth-child(6) {
        width: 6em;
        text-align: center;
    }

    thead th:nth-child(7),
    tbody td:nth-child(7) {
        width: 6em;
        text-align: center;
    }

    thead th:nth-child(8),
    tbody td:nth-child(8) {
        width: 6em;
        text-align: center;
    }

    thead th:nth-child(9),
    tbody td:nth-child(9) {
        width: 14em;
    }

    thead th:nth-child(10),
    tbody td:nth-child(10) {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(11),
    tbody td:nth-child(11) {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(12),
    tbody td:nth-child(12) {
        width: 4em;
        text-align: center;
    }

    thead th:nth-child(13),
    tbody td:nth-child(13) {
        width: 12em;
        text-align: center;
    }


    thead th:last-child,
    tbody td:last-child {
        width: 20%;
    }
</style>

<div class="container">
    <div class="row">

        <div class="creat_course">
            <a class="fas fa-plus-square" href="course-data-insert.php">新增課程</a>
        </div>

        <div class="col d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a href="?page=1" class="page-link ">第一頁<</a> </li> <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page - 1 ?>">
                                    <i class="fas fa-arrow-circle-left"></i></a>
                                <?php for ($i = $page - 1; $i <= $page + 1; $i++) :
                                    if ($i < 1) continue;
                                    if ($i > $totalPages) break;
                                ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </li>
                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link " href="?page=<?= $totalPages ?>">>最末頁</a>
                </li>
                </ul>
            </nav>

        </div>
    </div>

    <table class="table table-hover">
        <!-- `sid`, `teacher`, `course_name`, `course_type`, `date`, `course_time`, `place`, `members`, `price`, `on_sale`, `created_at`, `introduction` FROM `course_list` -->
        <thead>
            <tr>
                <th scope="col" class="text-nowrap">編輯課程</th>
                <th scope="col" class="text-nowrap">刪除課程</th>
                <th scope="col" class="text-nowrap">課程編號</th>
                <th scope="col" class="text-nowrap">講師</th>
                <th scope="col" class="text-nowrap">課程名稱</th>
                <th scope="col" class="text-nowrap">課程類型</th>
                <th scope="col" class="text-nowrap">課程日期</th>
                <th scope="col" class="text-nowrap">時間</th>
                <th scope="col" class="text-nowrap">課程地點</th>
                <th scope="col" class="text-nowrap">人數限制</th>
                <th scope="col" class="text-nowrap">課程費用</th>
                <th scope="col" class="text-nowrap">上／下架</th>
                <th scope="col" class="text-nowrap">表單建立時間</th>
                <th scope="col" class="text-nowrap">課程簡介</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a href="course-data-edit.php?sid=<?= $r['sid'] ?>"><i class="fas fa-edit"></i></td>
                    <td><a href="course-data-delete.php?sid=<?= $r['sid'] ?>" onclick="ifDel(event)" data-sid="<?= $r['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['teacher'] ?></td>
                    <td><?= $r['course_name'] ?></td>
                    <td><?= $r['course_type'] ?></td>
                    <td><?= $r['date'] ?></td>
                    <td><?= $r['course_time'] ?></td>
                    <td><?= $r['place'] ?></td>
                    <td><?= $r['members'] ?></td>
                    <td><?= $r['price'] ?></td>
                    <td><?= $r['on_sale'] ?></td>
                    <td><?= $r['created_at'] ?></td>
                    <td><?= $r['introduction'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . './parts/__scripts.php'; ?>
<script>
    function ifDel(event) {
        const a = event.currentTarget;
        console.log(event.target, event.currentTarget);
        const sid = a.getAttribute('data-sid');
        if (!confirm(`是否要刪除編號為 ${sid} 的資料?`)) {
            event.preventDefault(); // 取消連往 href 的設定
        }
    }

    function delete_it(sid) {
        if (confirm(`是否要刪除編號為 ${sid} 的資料???`)) {
            location.href = 'course-data-delete.php?sid=' + sid;
        }
    }
</script>
<?php include __DIR__ . './parts/__html_foot.php'; ?>