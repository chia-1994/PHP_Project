<?php
$page_title = '會員登入';
$page_name= 'vendor-login';
require __DIR__ . '/connect_db.php';
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
<link rel="stylesheet" href="member_style.css">
<?php require __DIR__ . '../../parts/__navbar.php'; ?>
<div class="concon">
    <div class="col-6  conconcon">
        <form method="post" name="login_form" onsubmit="checkForm() ;return false;">
            <div class="form-group">
                <label for="account">Account</label>
                <input type="text" class="form-control" id="account" name="account">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
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
        // 把用戶輸入的資料 轉json傳到api / 再讓api用mysql語法跟資料庫 做比對 如果 帳密都正確就 設置一個session
        const fd = new FormData(document.login_form);
        fetch('vendor-login-api.php', {
            method: 'POST',
            body: fd
        })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('登入成功');
                    location.href = 'vendor-list.php';
                } else {
                    alert('登入失敗');
                }
            });


    }


</script>