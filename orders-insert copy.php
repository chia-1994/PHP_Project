<?php
$page_title = '新增資料';
$page_name = 'orders';
require __DIR__ . '/parts/connect.php';

// $p_sql = "SELECT * FROM `Payment` WHERE pay_sid=0";

// $pay = $pdo->query($p_sql)->fetchAll();

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

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <!-- `ship_name`, `ship_phone`, `ship_Address`, `created_at`, `payment_method`,  `note` -->
                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="ship_name">ship_name</label>
                            <input type="text" class="form-control" id="ship_name" name="ship_name">
                        </div>
                        <div class="form-group">
                            <label for="ship_phone">ship_phone</label>
                            <input type="text" class="form-control" id="ship_phone" name="ship_phone">
                        </div>
                        <!-- <div class="form-group">
                            <label for="ship_Address">ship_Address</label>
                            <textarea class="form-control" name="ship_Address" id="ship_Address" cols="30" rows="3"></textarea>
                        </div> -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>






</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    function checkForm() {

        // TODO: 檢查資料格式

        const fd = new FormData(document.form1);

        fetch('orders-insert-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.text())
            .then(str => {
                console.log(str);
            });

        // return false;
    }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>