<!DOCTYPE html>
<html lang="en">

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
    <title>新增資料</title>
</head>

<body>

    <?php require __DIR__ .'/parts/_connect_db.php';?>

    <div class="wrapper">

        <div class="navbar">
            <a style="color: #FFFFFB;font-size: 20px;margin-left:20%;">管理平台</a>
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link <?= $page_name == '##' ? 'active' : '' ?>" href="#">會員管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == '##' ? 'active' : '' ?>" href="#">廠商管理</a>
                </li>
                <div class="nav-link dropright <?= $page_name == '##' ? 'active' : '' ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" style="color: #FFFFFB">
                        商品管理
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">美妝保養</a>
                        <a class="dropdown-item" href="#">無毒食品</a>
                        <a class="dropdown-item" href="#">無負擔服飾</a>
                        <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a> -->
                    </div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#">課程管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'orders' ? 'active' : '' ?>" href="#">訂單管理</a>
                </li>
            </ul>

        </div>
        <div class="container">
            <h2 style="margin-left: 15%; padding: 25px;">新增資料</h2>
            <div class="row form-row">
                <form name="c_form" onsubmit="checkForm();return false;" novalidate>
                    <div class="form-group">
                        <label for="EnterProduct"><span class="redstar">*</span>商品名稱</label>
                        <input type="text" minlength="2" class="form-control" id="product" name="product" required>
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="EnterPrice"><span class="redstar">*</span>價格</label>
                        <input type="number" min="0" class="form-control" id="price" name="price" required>
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="EnterAmount"><span class="redstar">*</span>數量</label>
                        <input type="number" min="0" max="999" class="form-control" id="amount" name="amount" required>
                        <small class="form-text error-msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="EnterVender"><span class="redstar">*</span>上架廠商</label>
                        <input type="text" minlength="2" class="form-control" id="vender" name="vender" required>
                        <small class="form-text error-msg"></small>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        const $product = document.querySelector('#product');
        const $price = document.querySelector('#price');
        const $amount = document.querySelector('#amount');
        const $vender = document.querySelector('#vender');
        const $submit = document.querySelector('button[type=submit]');

        function checkForm() {
            let isPass = true;
            //            if (){
            // isPass = false;
            // }
            //        }

            if (isPass) {
                const fd = new FormData(document.c_form);
                fetch('./parts/data_insert_api.php', {
                        method: 'POST',
                        body: fd
                    })
                    .then(r => r.json())
                    .then(obj => {
                        console.log(obj);
                        if (obj.success) {
                            alert('新增成功！');
                            setTimeout(() => {
                                location.herf = 'cosme_data_list.php'
                            }, 3000)
                        } else {
                            alert('新增失敗！');
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
