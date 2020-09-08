<?php
$page_title = '會員登入';
$page_name = 'member';
$page_name1 = 'member_user_login';
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
<link rel="stylesheet" href="style_right.css">
<?php require __DIR__ . '../../parts/__navbar.php'; ?>
<div class="concon">
    <div class="nvb-flex conconcon col-6">
        <div class="astylename" href="member_list.php">會員登入</div>

    </div>

    <div class="col-6  conconcon">
        <form method="post" name="login_form" onsubmit="checkForm() ;return false;">
            <div class="form-group">
                <label for="email">帳號(email)</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class=" form-group">
                <label for="pwd">密碼</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="checkPassword" onclick="showpwd()">
                <label class="form-check-label" for="checkPassword">檢視密碼</label>
                <small class="form-text eerror_msg"></small>
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
        </form>
    </div>
</div>
</div>

<?php require __DIR__ . '../../parts/__scripts.php'; ?>
<script>
    function showpwd() {
        const inputtwd = document.getElementById("pwd");
        if (inputtwd.type === "password") {
            inputtwd.type = "text";
        } else {
            inputtwd.type = "password";
        }
    }


    function checkForm() {
        const fd = new FormData(document.login_form);
        fetch('member_user_login_api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('登入成功');
                    location.href = 'member_user_list.php';
                } else {
                    alert('登入失敗');
                }
            });
    }
</script>