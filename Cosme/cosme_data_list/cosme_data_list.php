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

        .table-wrapper {
            margin-left: 15%;
            padding: 25px;
        }

        .nav-wrapper {
            margin-left: 15%;
            padding: 25px;
        }

    </style>
    <title>商品管理-化妝品/保養品</title>
</head>

<body>
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

        <?php require __DIR__ .'/parts/_connect_db.php';?>
        <?php require __DIR__ .'/parts/data_request_api.php';?>
        <div class="container">
            <div class="row">
                <div class="nav-wrapper justify-contain-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page-1 ?>">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <?php for($i=$page-3; $i<=$page+3; $i++):
                        if($i<1) continue;
                        if($i>$totalPages) break;
                        ?>
                            <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page+1 ?>">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <div class="table-wrapper">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">刪除</th>
                                <th scope="col">＃</th>
                                <th scope="col">商品名稱</th>
                                <th scope="col">價格</th>
                                <th scope="col">數量</th>
                                <th scope="col">上架廠商</th>
                                <th scope="col">上架日期</th>
                                <th scope="col">編輯</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $r): ?>
                            <tr>
                                <td><a href="./parts/data_delete_api.php?sid=<?= $r['sid'] ?>" onclick="ifDel(event)" data-sid="<?= $r['sid'] ?>"><i class="fas fa-trash-alt my-trash-i"></i></a></td>
                                <td><?= $r['sid'] ?></td>
                                <td><?= $r['product'] ?></td>
                                <td><?= $r['price'] ?></td>
                                <td><?= $r['amount'] ?></td>
                                <td><?= $r['vender'] ?></td>
                                <td><?= $r['created_at'] ?></td>
                                <td><a href="./u_form.php?sid=<?= $r['sid'] ?>" onclick="" data-sid="<?= $r['sid'] ?>"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ifDel(event) {
            const a = event.currentTarget;
            const sid = a.getAttribute('data-sid');
            if (!confirm('是否刪除編號 ${sid} 的資料？')) {
                event.preventDefault();
            }
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
