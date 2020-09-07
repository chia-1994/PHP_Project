<?php
$page_title = '會員登入';
$page_name = 'member_login';
require __DIR__ . '/connect_database.php';
?>

<?php require __DIR__ . '../../parts/__html_head.php'; ?>
<style>
    .btn {
        background-color: #86A697;
        color: #fffffb;
        border-color: #86A697;
    }

    .btn:hover {
        background-color: #26453D;
        color: #ffffff;
        border-color: #26453D;
    }
</style>
<?php require __DIR__ . '../../parts/__navbar.php'; ?>
<div class="container mr-5">
    <div class="row">
        <div class="col-6">
            <form method="post" name="login_form" onsubmit="checkForm() ;return false;">
                <div class="form-group">
                    <label for="account">帳號(email)</label>
                    <input type="text" class="form-control" id="account" name="account">
                </div>
                <div class="form-group">
                    <label for="password">密碼</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">登入</button>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__ . '../../parts/__scripts.php'; ?>
<script>
    function checkForm() {
        const fd = new FormData(document.login_form);
        fetch('member_login_api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('登入成功');
                    location.href = 'member_list.php';
                } else {
                    alert('登入失敗');
                }
            });
    }
</script>