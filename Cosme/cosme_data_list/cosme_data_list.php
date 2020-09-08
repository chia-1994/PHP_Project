<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/../fontawesome/css/all.css">
    <title>美妝保養 商品列表</title>

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

        .table-wrapper {
            margin-left: 15%;
            padding: 25px;
            padding-top: 0;
        }

        .nav-wrapper {
            margin-left: 15%;
            padding: 25px;
            padding-top: 0;
        }

        .fas {
            color: #86A697;
        }

        .fas:hover {
            color: #26453D;
        }

        .page-btn {
            margin-left: 45%;
        }

        .page-btn .page-link {
            color: #86A697;
            border: none;
        }

        .page-btn .active .page-link {
            color: #FFFFFB;
            background-color: #26453D;
        }

    </style>


<body>
    <?php require __DIR__ .'/parts/_connect_db.php';?>
    <?php require __DIR__ .'/parts/data_request_api.php';?>
    <div class="container">
        <div class="btn-wrapper">
            <button type="button" class="btn f-btn"><a class="btn-a" href="">商品列表</a></button>
            <button type="button" class="btn f-btn"><a class="btn-a" href="">新增資料</a></button>
        </div>
        <div class="row">
            <div class="nav-wrapper justify-contain-center">

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

            <nav aria-label="Page navigation example" class="page-btn">
                <ul class="pagination">
                    <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fas fa-arrow-left"></i>
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
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
