<?php
$page_title = '資料新增';
$page_name = 'data-insert';
require __DIR__ . '/parts/__connect_db.php';
?>

<?php include __DIR__ . '/../parts/__html_head.php' ?>
<link rel="stylesheet" href="./../product_css/insert.css">
<?php include __DIR__ . '/../parts/__navbar.php' ?>
<!-- `sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time` -->
<!-- novalidate 此表單不做檢查   required 此欄必填 -->
<!-- 以下為小專右邊頁面-->
<div class="QAQ"></div>
<div class="concon">
    <div class="nvb-flex">
        <a class="acolor" href="./clothes-data-list.php">資料列表</a>
        <a class="acolor" href="./clothes-data-insert.php">新增資料</a>
        <!-- 以上為小專右邊頁面-->
        <!-- 以下拿掉row & col-6 + 補上tomid-->
    </div>
    <div class="col">
        <div class="alert alert-success" role="alert" id="infobar" style="display:none">
            新增成功
        </div>
        <div class="card tomid">
            <div class="card-body">
                <h5 class="card-title">資料新增</h5>
                <form name="form1" onsubmit="checkForm();return false;" novalidate>
                    <div class="form-group">
                        <label for="gender">性別</label>
                        <select class="form-control selectsize" id="gender" name="gender">
                            <option>男裝</option>
                            <option>女裝</option>
                            <option>OTHER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">品名</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="class">類別</label>
                        <select class="form-control selectsize" id="class" name="class">
                            <option>上身類</option>
                            <option>下身類</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">顏色</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="form-group">
                        <label for="size">尺寸</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <div class="form-group">
                        <label for="price">價格</label>
                        <input type="text" class="form-control" id="price" name="price">
                        <small id="emailHelp" class="form-text errormsg"></small>
                    </div>
                    <div class="form-group">
                        <label for="vendor">廠商</label>
                        <input type="text" class="form-control" id="vendor" name="vendor">
                    </div>
                    <div class="form-group">
                        <label for="added_time">上架時間</label>
                        <input type="text" class="form-control" id="added_time" name="added_time" value="Now" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btn">上架</button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../parts/__scripts.php' ?>
<script>
    //所有必填的欄位
    const $gender = document.querySelector('#gender')
    const $name = document.querySelector('#name')
    const $class = document.querySelector('#class')
    const $color = document.querySelector('#color')
    const $size = document.querySelector('#size')
    const $price = document.querySelector('#price')
    const $vendor = document.querySelector('#vendor')
    const infobar = document.querySelector('#infobar')
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {

        let isPass = true;

        // TODO: 檢查模式
        if (!$price.value) {
            isPass = false;
            $price.style.borderColor = 'red';
            $price.nextElementSibling.innerHTML = '必填'
        }


        if (isPass) {
            const fd = new FormData(document.form1); //把資料放到這一個沒有外觀的表單

            fetch('clothes-data-insert-api.php', {
                    method: 'POST',
                    body: fd //我要送的資料
                })


                .then(r => r.json()) //以下看不太懂 用複製的
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '新增成功';
                        infobar.className = "alert alert-success";
                        // if(infobar.classList.contains('alert-danger')){
                        //     infobar.classList.replace('alert-danger', 'alert-success')
                        // }
                        setTimeout(() => {
                            location.href = 'clothes-data-list.php';
                        }, 2000)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        infobar.className = "alert alert-danger";
                        // if(infobar.classList.contains('alert-success')){
                        //     infobar.classList.replace('alert-success', 'alert-danger')
                        // }
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        }
    }
</script>
<?php include __DIR__ . '/../parts/__html_foot.php' ?>