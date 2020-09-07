<?php
$page_title = '修改資料';
$page_name = 'orders';
require __DIR__ . '/parts/connect.php';



$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location:test.orders-list.php');
    exit;
}

$sql = "SELECT * FROM orders WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();
if (empty($row)) {
    header('Location:test.orders-list.php');
    exit;
}


$p_sql = "SELECT * FROM `Payment` WHERE pay_sid=0";

$pay = $pdo->query($p_sql)->fetchAll();
?>



<?php require __DIR__ . '/parts/__html_head.php'; ?>
<style>
    .container {
        margin-left: 300px;
        margin-top: 1rem;
    }

    .row {
        padding: 0;
        margin: 0;
    }

    .card {
        margin-top: 2rem;
        margin-bottom: 1rem;
        width: 1000px;
    }

    button a {
        color: white;
    }

    button a:hover {
        color: white;
        text-decoration: none;
    }

    small.error-msg {
        color: red;
    }
</style>
<?php include __DIR__ . '/parts/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>
            <div class="row">
                <button type="button" style="background-color: #26453D;" class="btn btn-info"><a href="test.orders-list.php">訂單列表</a></button>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">編輯資料</h5>
                        <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                            <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                            <div class="form-group">
                                <label for="ship_name">收件人姓名</label>
                                <input type="text" class="form-control" id="ship_name" name="ship_name" required value="<?= htmlentities($row['ship_name']) ?>">
                                <small class="form-text error-msg"></small>
                            </div>
                            <div class="form-group">
                                <label for="ship_phone">收件人電話</label>
                                <input type="tel" class="form-control" id="ship_phone" name="ship_phone" value="<?= htmlentities($row['ship_phone']) ?>" pattern="09\d{2}-?\d{3}-?\d{3}">
                                <small class="form-text error-msg"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">收件地址</label>
                                <textarea class="form-control" name="ship_Address" id="ship_Address" cols="30" rows="3" value="<?= $row['ship_Address'] ?>"><?= htmlentities($row['ship_Address']) ?></textarea>
                                <small class="form-text error-msg"></small>
                            </div>

                            <div class="form-group">
                                <label for="pay_sid">付款方式</label><br>
                                <?php foreach ($pay as $p) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?php echo $row['payment_method'] == $p['sid'] ? 'checked' : '' ?> name="pay_sid" id="p<?= $p['sid'] ?>" value="<?= $p['sid'] ?>" require>
                                        <label class="form-check-label" for="p<?= $p['sid'] ?>">
                                            <?= $p['payment_method'] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label for="address">備註</label>
                                <textarea class="form-control" name="note" id="note" cols="30" rows="3"><?= htmlentities($row['note']) ?></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-secondary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
</div>






</div>

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
            fetch('orders-edit-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                // .then(str => {
                //     console.log(str);
                // });
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '修改成功';
                        infobar.className = "alert alert-success";

                        setTimeout(() => {
                            location.href = '<?= $_SERVER['HTTP_REFERER'] ?? "test.orders-list.php" ?>';
                        }, 2000)

                    } else {
                        infobar.innerHTML = obj.error || '資料沒有修改';
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
<?php include __DIR__ . '/parts/__html_foot.php'; ?>