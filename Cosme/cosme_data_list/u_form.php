<!DOCTYPE html>
<html lang="en">

<?php
require __DIR__. '/parts/_connect_db.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
//if(empty($sid)){
// header('Location: cosme_data_list.php');
// exit;
//}

$sql = " SELECT * FROM product_cosme WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();
//if(empty($row)){
// header('Location: cosme_data_list.php');
// exit;
//}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/../fontawesome/css/all.css">
    <style>
        * {
            font-family: 'Noto Sans TC', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        .navbar {
            width: 15%;
            height: 100vh;
            background-color: #26453D;
            display: block;
            padding: 20px 0 0 0;
            position: fixed;

        }

        .nav-link {
            color: #FFFFFB;
            margin: 10px 0px 10px 0px;
        }

        .nav-link:hover {
            color: #FFFFFB;
            background-color: #86A697;
        }

        .active {
            background-color: #86A697;
        }

        .flex-column {
            margin-top: 20px;
            justify-content: flex-start;
        }

        .form-row {
            margin-left: 15%;
            padding: 25px;
        }

        .redstar {
            color: red;
        }

    </style>
    <title>修改資料</title>
</head>

<body>
    <?php require __DIR__ .'/../../parts/__navbar.php';?>
    <style>
        .btn-wrapper {
            padding-top: 25px;
            padding-left: 15%;
        }

        .f-btn {
            color: #FFFFFB;
            background-color: #26453D;
        }

        .btn-a {
            text-decoration: none;
            color: #FFFFFB;
        }

        .btn-a:hover {
            text-decoration: none;
            color: #86A697;
        }

    </style>

    <div class="container">
        <div class="btn-wrapper">
            <button type="button" class="btn f-btn"><a class="btn-a" href="">商品列表</a></button>
            <button type="button" class="btn f-btn"><a class="btn-a" href="">新增資料</a></button>
        </div>
        <h2 style="margin-left: 15%; padding: 25px;">修改資料</h2>
        <div class="row form-row">
            <form name="u_form" onsubmit="checkForm(); return false;">
                <input type="hidden" name="sid" value="<?= $sid ?>">
                <div class="form-group">
                    <label for="EnterProduct"><span class="redstar">*</span>商品名稱</label>
                    <input type="text" minlength="2" class="form-control" id="product" name="product" value="<?= htmlentities($row['product']) ?>" required>
                    <small class="form-text error-msg"></small>
                </div>
                <div class="form-group">
                    <label for="EnterPrice"><span class="redstar">*</span>價格</label>
                    <input type="number" min="0" class="form-control" id="price" name="price" value="<?= htmlentities($row['price']) ?>" required>
                    <small class="form-text error-msg"></small>
                </div>
                <div class="form-group">
                    <label for="EnterAmount"><span class="redstar">*</span>數量</label>
                    <input type="number" min="0" max="999" class="form-control" id="amount" name="amount" value="<?= htmlentities($row['amount']) ?>" required>
                    <small class="form-text error-msg"></small>
                </div>
                <div class="form-group">
                    <label for="EnterVender"><span class="redstar">*</span>上架廠商</label>
                    <input type="text" minlength="2" class="form-control" id="vender" name="vender" value="<?= htmlentities($row['vender']) ?>" required>
                    <small class="form-text error-msg"></small>
                </div>

                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    <script>
        function checkForm() {
            let isPass = true;
            //            if (){
            // isPass = false;
            // }
            //        }

            if (isPass) {
                const fd = new FormData(document.u_form);
                fetch('./parts/data_update_api.php', {
                        method: 'POST',
                        body: fd
                    })
                    .then(r => r.json())
                    .then(obj => {
                        console.log(obj);
                        if (obj.success) {
                            alert('修改成功！');
                            setTimeout(() => {
                                window.history.back();
                            }, 3000)
                        } else {
                            alert('修改失敗！');
                            $submit.style.dsplay = 'block';
                        }


                    })
            } else {
                $submit.style.display = 'block';
            }
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
