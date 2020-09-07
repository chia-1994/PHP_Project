<?php
$page_title = '新增資料';
$page_name = 'orders';
require __DIR__ . '/parts/connect.php';

$p_sql = "SELECT * FROM `Payment` WHERE pay_sid=0";

$pay = $pdo->query($p_sql)->fetchAll();

?>


<?php require __DIR__ . '/parts/__html_head.php'; ?>
<style>
    .container {
        margin-left: 300px;
        margin-top: 50px;
    }

    form {
        width: 600px;
    }

    .card {
        width: 700px;
        margin-bottom: 50px;
    }
</style>
<?php include __DIR__ . '/parts/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>
            <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="ship_name">收件人姓名</label>
                            <input type="text" class="form-control" id="ship_name" name="ship_name" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="ship_phone">收件人電話</label>
                            <input type="tel" class="form-control" id="ship_phone" name="ship_phone" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text error-msg"></small>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </form>


        </div>
    </div>

</div>
</div>






<!-- `ship_name`, `ship_phone`, `ship_Address`, `payment_method`, `note` -->
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $name = document.querySelector('#ship_name');
    const $mobile = document.querySelector('#ship_phone');
    const r_fields = [$name, $mobile];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');


    function checkForm() {
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });
        submitBtn.style.display = 'none';
        // TODO: 檢查資料格式
        if ($name.value.length < 1) {
            isPass = false;
            $name.style.borderColor = 'red';
            $name.nextElementSibling.innerHTML = '請填寫正確的姓名';
        }

        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        }

        if (isPass) {
            const fd = new FormData(document.form1);
            fetch('orders-insert-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '新增成功';
                        infobar.className = "alert alert-success";

                        setTimeout(() => {
                            location.href = 'test.orders-list.php';
                        }, 3000)


                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        infobar.className = "alert alert-danger";
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });

        } else {
            submitBtn.style.display = 'block';
        }

    }
</script>
<!-- //     function checkForm() {
//         const fd = new FormData(document.form1);
//         fetch('orders-insert-api.php', {
//                 method: 'POST',
//                 body: fd
//             })
//             .then(r => r.text())
//             .then(str => {
//                 console.log(str);
//             });

//     } -->

<?php include __DIR__ . '/parts/__html_foot.php'; ?>