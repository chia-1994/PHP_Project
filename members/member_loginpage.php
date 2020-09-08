<?php
$page_title = '登入';
$page_name = 'member_loginpage'; 
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
<?php require __DIR__ . '../../parts/__navbar.php'; ?>
<div class="container mr-5">
    <div class="row">
        <button type="button" class="btn mt-1">
            <a href="member_manage_login.php">管理者登入</a></button>
    </div>
    <br>
    <div class="row">
        <button type="button" class="btn mt-1">
            <a href="member_user_login.php">使用者登入</a></button>
    </div>
    <br>
    <div class="row">
        <button type="button" class="btn mt-1">
            <a href="member_new.php">會員註冊</a></button>
    </div>
</div>


<?php require __DIR__ . '../../parts/__scripts.php'; ?>
<?php require __DIR__ . '../../parts/__html_foot.php'; ?>