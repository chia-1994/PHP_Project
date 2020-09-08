<?php
$page_title = '登入';
$page_name = 'member';
$page_name1 = 'member_loginpage';
require __DIR__ . '../../parts/__html_head.php'; ?>
<style>
    .btn {
        background-color: #86A697;
    }

    a {
        color: #ffffff;
    }

    a:hover {
        color: #ffffff;
    }
</style>
<link rel="stylesheet" href="style_right.css">
<?php require __DIR__ . '../../parts/__navbar.php'; ?>
<div class="concon">
    <div class=" conconcon">
        <a class="astylenow" href="member_manage_login.php">管理者登入</a>
        <a class="astylenow" href="member_user_login.php">使用者登入</a>
        <a class="astylenow" href="member_new.php">會員註冊</a>
    </div>


    <?php require __DIR__ . '../../parts/__scripts.php'; ?>
    <?php require __DIR__ . '../../parts/__html_foot.php'; ?>