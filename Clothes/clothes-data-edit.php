<?php
$page_title = '編輯資料';
$page_name = 'data-edit';
require __DIR__ . '/parts/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if(empty($sid)){
    header('Location:clothes-data-list.php');
    exit;
}

$sql = " SELECT * FROM clothes_category WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();
if(empty($row)){
    header('Location:clothes-data-list.php');
    exit;
}


?>



<?php include __DIR__ . '/parts/__html_head.php' ?>
<style>
    .errorpointer {
        color: red;
    }

    .errormsg {
        color: red;
    }

    .selectsize {
        height: 41px;
    }
</style>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<!-- `sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time` -->
<!-- novalidate 此表單不做檢查   required 此欄必填 -->
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-success" role="alert" id="infobar" style="display:none">
                新增成功
            </div>
            <div class="card" style="width: 36rem;">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>
                    <form name="form1" onsubmit="checkForm();return false;" novalidate>
                    <input type="hidden" name="sid" value="<?= $row['sid']?>">
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
                            <input type="text" class="form-control" id="name" name="name"value="<?= htmlentities($row['name'])?>" required>
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
                            <input type="text" class="form-control" id="color" name="color" value="<?= htmlentities($row['color'])?>">
                        </div>
                        <div class="form-group">
                            <label for="size">尺寸</label>
                            <input type="text" class="form-control" id="size" name="size" value="<?= htmlentities($row['size'])?>">
                        </div>
                        <div class="form-group">
                            <label for="price">價格</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= htmlentities($row['price'])?>">
                            <small id="emailHelp" class="form-text errormsg"></small>
                        </div>
                        <div class="form-group">
                            <label for="vendor">廠商</label>
                            <input type="text" class="form-control" id="vendor" name="vendor" value="<?= htmlentities($row['vendor'])?>">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">確認編輯</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/__scripts.php' ?>
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

            fetch('clothes-data-edit-api.php', {
                    method: 'POST',
                    body: fd //我要送的資料
                })

                
                .then(r => r.json())  //以下看不太懂 用複製的
                .then(obj => {
                    console.log(obj);
                    if(obj.success){
                        infobar.innerHTML = '已完成編輯';
                        infobar.className = "alert alert-success";
                        // if(infobar.classList.contains('alert-danger')){
                        //     infobar.classList.replace('alert-danger', 'alert-success')
                        // }
                        setTimeout(()=>{
                            location.href = '<?= $_SERVER['HTTP_REFERER'] ?? "clothes-data-list.php" ?>';
                        }, 1500)
                    } else {
                        infobar.innerHTML = obj.error || '無修改內容';
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
<?php include __DIR__ . '/parts/__html_foot.php' ?>