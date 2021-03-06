<?php
$page_title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/parts/__connect_db.php';  //連線到資料庫

$perPage = 10; //每頁有幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //頁數為整數

$t_sql = "SELECT COUNT(*)FROM `clothes_category`";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$totalPages = ceil($totalRows / $perPage); //總頁數

$rows = [];

if ($totalRows > 0) {  //如果有資料才做  還有一個轉向的作法

    if ($page < 1) $page = 1; //???????
    if ($page > $totalPages) $page = $totalPages;

    $sql = sprintf("SELECT * FROM `clothes_category`ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}
//在HTML出現前拿資料(一般的準則)


?>
<?php include __DIR__ . '/../parts/__html_head.php' ?>
<link rel="stylesheet" href="./../product_css/list.css">
<?php include __DIR__ . '/../parts/__navbar.php' ?>
<!-- 以下為右邊頁面加入 -->
<!-- container改成concon -->
<div class="concon">
    <div class="nvb-flex conconcon">
        <a class="astylenow" href="./clothes-data-list.php">資料列表</a>
        <a class="astyle" href="./clothes-data-insert.php">新增資料</a>

        <form class="form-inline ed" name="form1" onsubmit="searchKeyword(); return false; novalidate">
                <input class=" form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

    </div>
    <!-- ------------>
    <table class="table table-striped conconcon">
        <!-- `sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time` -->
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash"></i></th>
                <th scope="col">#</th>
                <th scope="col">性別</th>
                <th scope="col">品名</th>
                <th scope="col">類型</th>
                <th scope="col">顏色</th>
                <th scope="col">尺寸</th>
                <th scope="col">價格</th>
                <th scope="col">廠商</th>
                <th scope="col">上架時間</th>
                <th scope="col"><i class="fas fa-edit"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a href="javascript:delete_it(<?= $r['sid'] ?>)"><i class="fas fa-trash trashcolor"></i></a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['gender'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['class'] ?></td>
                    <td><?= $r['color'] ?></td>
                    <td><?= $r['size'] ?></td>
                    <td><?= $r['price'] ?></td>
                    <td><?= $r['vendor'] ?></td>
                    <td><?= $r['added_time'] ?></td>
                    <td><a href="clothes-data-edit.php?sid=<?= $r['sid'] ?>"><i class="fas fa-edit editcolor"></i></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center" style="margin-top: 20px">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <span aria-hidden="true"><i class="fas fa-arrow-circle-left Paginationcolor"></i></span>
                        </a>
                    </li>
                    <?php for ($i = $page - 2; $i <= $page + 2; $i++) :
                        if ($i < 1) continue;
                        if ($i > $totalPages) break;
                    ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link Paginationcolor" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor ?>
                    <li class="page-item  <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <span aria-hidden="true"><i class="fas fa-arrow-circle-right Paginationcolor"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../parts/__scripts.php' ?>
<script>
    function delete_it(sid) {
        if (confirm(`確認刪除編號 ${sid} 的資料?`)) {
            location.href = 'clothes-data-delete.php?sid=' + sid;
        }
    }
    // const table = document.querySelector('table');

    // table.addEventListener('click', (event) => {
    //     const t = event.target;
    //     //console.log(t.classList)
    //     const ar = [...t.classList];
    //     // -1表示找不到
    //     console.log(ar.indexOf('trashcolor'));
    //     // 如果有找到則...
    //     if (ar.indexOf('trashcolor') !== -1) {
    //         t.closest('tr').remove();
    //     }
    // })
</script>
<?php include __DIR__ . '/../parts/__html_foot.php' ?>