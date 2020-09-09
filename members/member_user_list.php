<?php
$page_title = '會員列表';
$page_name = 'member';
$page_name1 = 'member_list';
require __DIR__ . '/connect_database.php';

$id = $_SESSION['admin']['id'];

if (empty($id)) {
    header('Location : member_user_list.php');
    exit;
}
$sql_str = "SELECT * FROM members WHERE id=$id ";

$data_sql = sprintf($sql_str);

$row = $pdo->query($data_sql)->fetch();
?>


<?php require __DIR__ . '../../parts/__html_head.php'; ?>
<style>
    a .fas {
        color: #86A697;
    }

    a .fas:hover {
        color: #26453D;
    }

    .page-item.active .page-link {
        background-color: #86A697;
        color: #fffffb;
        border-color: #86A697;
    }

    .page-item.disabled .page-link {
        background-color: #ffffff;
        color: #ddd;
        border-color: #ddd;
    }

    .page-link {
        color: #86A697;
        background-color: #ffffff;
        border-color: #ddd;
    }

    .page-link:hover {
        color: #86A697;
        background-color: #eee;
        border-color: #ddd;
    }
</style>
<link rel="stylesheet" href="member_style.css">
<?php require __DIR__ . '../../parts/__navbar.php'; ?>

<div class="concon">
    <div class="nvb-flex conconcon">
        <div class="astylename" href="member_list.php"><?= $row['name'] ?></div>
        <a class="astyle" href="member_user_logout.php">登出</a>
    </div>
    <table class="table table-striped conconcon table-overflow">
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['pwd'] ?></td>
                <td><?= $row['id_number'] ?></td>
                <td><?= $row['tel'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['birth'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['level'] ?></td>
                <td scope="col"><a href="member_user_edit.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a></td>
            </tr>

        </tbody>
    </table>



</div>



<?php require __DIR__ . '../../parts/__scripts.php'; ?>
<script>
    function if_click_delete(event) {
        const a = event.currentTarget;
        const del_icon_id = a.getAttribute('icon_id');
        if (!confirm(`是否要刪除編號為 ${del_icon_id} 的資料?`)) {
            event.preventDefault();
        }
    };
</script>
<?php require __DIR__ . '../../parts/__html_foot.php'; ?>