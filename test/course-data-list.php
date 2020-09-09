<?php
$page_title = '課程列表';
$page_name = 'course-data-list';
require __DIR__ . './parts/__course_connect_db.php';

$perPage = 5; // 每頁有幾筆資料

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
<?php include __DIR__ . './parts/__course_navbar.php'; ?>
<style>
    .container {
        width: 85%;
    }

    .col.d-flex.justify-content-center {
        width: 300px;

    }

    .table {
        table-layout: fixed;
        min-width: 2000px;
        font-size: 16px;
        margin-left: 200px;
    }

    th {
        background-color: #cdc;
        text-align: center;
        color: #000;
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

    thead th:nth-child(14),
    tbody td:nth-child(14) {
        width: 20%;
    }

    /* thead th:last-child,
    tbody td:last-child {
        width: 12em;
    } */




    /*以下為小專右邊頁面使用CSS*/
    .fas.fa-trash-alt {
        color: #cdc;
        cursor: pointer;
    }

    .fas.fa-edit {
        color: #cdc;
        cursor: pointer;
    }

    .Paginationcolor {
        color: #cdc;
    }

    .page-item.active {
        background-color: #cdc;
        border-color: #cdc;
    }

    .page-link {
        background-color: #cdc;
        border-color: #cdc;
    }

    /*HEAD*/
    .nvb-flex {
        display: flex;
        justify-content: left;
        align-items: center;
    }

    .right {
        position: absolute;
        right: 0;
    }

    .astyle:hover {
        color: #fff;
        background-color: #cdc;
        text-decoration: none;
    }

    .astylenow {
        /*整個按鍵*/
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 40px;
        border-radius: 10px;
        margin: 20px 10px 20px 0;
        border: 2px solid #CDC;
        text-align: center;
        letter-spacing: 0.4em;
        background-color: #CDC;
        color: #fff;
        font-size: 18px;
    }

    .astyle {
        /*整個按鍵*/
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 40px;
        border-radius: 10px;
        margin: 20px 10px 20px 200px;
        border: 2px solid #CDC;
        text-align: center;
        letter-spacing: 0.4em;
        background-color: #fff;
        color: #000;
        font-size: 18px;
    }

    .astylenow:hover {
        color: #CDC;
        background-color: #FFF;
        text-decoration: none;
    }

    .astyle:hover {
        color: #FFF;
        background-color: #CDC;
        text-decoration: none;
    }



    /* .QAQ {
        將版面擠出右邊navbar
        width: 15%;
        height: 100vh;
    } */

    .concon {
        /*剩下的右邊版面*/
        width: 2000px;
        height: 100vh;
        flex-wrap: nowrap;
        /* position: fixed; */
        right: 0;
        top: 0;
    }

    /* HEAD*/
    .conconcon {
        position: relative;
        /*剩下左邊版面的80%為列表範圍 預留左右+置中*/
        width: 80%;
        margin: 0 auto;
    }

    /*以上為小專右邊頁面使用CSS*/
    /* ===============*/
    .conconcon {
        /*剩下左邊版面的80%為列表範圍 預留左右+置中*/
        width: 80%;
        margin: 0 auto;
        position: relative;
    }

    .ed {
        margin: 20px 0 20px 0;
        position: absolute;
        right: 0;
    }

    /*以上為小專右邊頁面使用CSS*/

    .page-btn {
        margin-left: 45%;
    }

    .page-btn .page-link {
        color: #86A697;
        border: none;
    }

    .page-btn .active .page-link {
        color: #FFFFFB;
        background-color: #26453D;
    }

    .page-item:hover .page-link {
        color: #fff;
        background-color: #cdc;
    }
</style>

<div class="concon">
    <div class="row">

        <div class="nvb-flex conconcon">
            <a class="astyle" href="course-data-insert.php">新增課程</a>

            <form class="form-inline right" name="form1" onsubmit="searchKeyword(); return false; novalidate">
                <input class=" form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="conconcon">
            <div class="row">

                <table class="table table-striped table-hover">
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

                <nav aria-label="Page navigation example" class="page-btn">
                    <ul class="pagination">
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a href="?page=1" class="page-link">第一頁<</a> </li> <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fas fa-arrow-left"></i></a>
                        </li>
                        <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                            if ($i < 1) continue;
                            if ($i > $totalPages) break;
                        ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>"><i class="fas fa-arrow-right"></i></a>
                        </li>
                        <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $totalPages ?>">>最末頁</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
