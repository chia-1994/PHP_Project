<?php
$page_title = '新增資料';
$page_name = 'data-insert';
require __DIR__ . '/text10.php';
?>
<?php require __DIR__ . '/part/header.php'; ?>
<style>
    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>
<?php include __DIR__ . '/part/narbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <!-- 一開始 把 infobar設為隱藏 如果成功才顯示新增成功 -->
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <!-- 如果對form下 novalidate 就不會使用html的驗證 (不會去判斷用戶輸入的是否符合格式 ex: email沒有加小老鼠)-->
                    <!-- onsubmit送出表單後 執行checkform函數 檢查格式 -->
                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                        <div class="form-group">
                            <label for="name"><span class="red-stars">**</span> name</label>
                            <!-- 對input寫required 代表此欄位必填-->
                            <input type="text" class="form-control" id="name" name="name" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="email"><span class="red-stars">**</span> email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile"><span class="red-stars">**</span> mobile</label>
                            <!--  pattern= " "  後面寫正規表達式 會檢查 用戶輸入的格式 -->
                            <!-- input的type 寫成tel 手機用戶在輸入時會自動跳出數字鍵盤 -->
                            <input type="tel" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>






</div>
<?php include __DIR__ . '/part/js.php'; ?>
<script>
    // 用正規表達式 規定用戶輸入的資料格式 如果錯誤要進行檢查 或 提醒
    const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    //   get name email mobile infobar submitBtn的DOM
    const $name = document.querySelector('#name');
    const $email = document.querySelector('#email');
    const $mobile = document.querySelector('#mobile');
    const r_fields = [$name, $email, $mobile];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {
        // ispass預設成true 如果一個沒通過檢查就會變false( 檢查了 email mobile name )

        let isPass = true;
        // 一開始的狀態是 灰色框框 > innhtml沒有警告標籤 
        // 框框顏色為#CCCCCC
        r_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            // nextEleentSibling = dom節點的下一個標籤
            el.nextElementSibling.innerHTML = '';
        });
        // 如果檢查都沒問題 然後格式也都正確 就把 submitBtn 按鈕隱藏起來 
        submitBtn.style.display = 'none';
        // TODO: 檢查資料格式
        // 如果用戶輸入的名字少於兩個字 就跳出紅色框框_請填寫正確姓名
        if ($name.value.length < 2) {
            isPass = false;
            $name.style.borderColor = 'red';
            // nextEleentSibling = dom節點的下一個"標籤" input的下一個標籤是  small 所以 small.innerhtml='請填寫正確的姓名'
            $name.nextElementSibling.innerHTML = '請填寫正確的姓名';
        }

        // 如果用戶輸入的EMAIL格式錯誤 就跳出紅色框框_請填寫正確電子郵箱

        if (!email_pattern.test($email.value)) {
            isPass = false;
            $email.style.borderColor = 'red';
            $email.nextElementSibling.innerHTML = '請填寫正確格式的電子郵箱';
        }
        // 如果用戶輸入的moblie 就跳出紅色框框_請填寫正確手機號碼
        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }
        //  如果 正規表達式 檢查都沒有錯誤  用new FormData 把form1做成表格(new FormData是一張空的列表什麼都沒有)
        if (isPass) {
            const fd = new FormData(document.form1);

            //  把資料用fetch傳給 inserapi body 為 new FormData(document.form1)
            fetch('inserapi.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        // 如果成功 就寫新增成功 
                        infobar.innerHTML = '新增成功';
                        // 把他的className改成"alert alert-success (這是bootstrap的class可以改外觀)
                        infobar.className = "alert alert-success";
                        // if(infobar.classList.contains('alert-danger')){
                        //     infobar.classList.replace('alert-danger', 'alert-success')
                        // }
                        setTimeout(() => {
                            location.href = 'quary.php';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        infobar.className = "alert alert-danger";
                        // if(infobar.classList.contains('alert-success')){
                        //     infobar.classList.replace('alert-success', 'alert-danger')
                        // }
                        submitBtn.style.display = 'block';
                    }
                    // 把infobar 秀出來 本來是display none
                    infobar.style.display = 'block';
                });

        } else {
            submitBtn.style.display = 'block';
        }
    }
</script>
<?php include __DIR__ . '/part/foot.php'; ?>