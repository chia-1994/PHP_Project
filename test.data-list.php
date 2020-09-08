<?php
// $page_title = '資料列表';
// $page_name = 'data-list';
require __DIR__ . '/parts/connect.php';

$stmt = $pdo->query("SELECT * FROM `orders` WHERE 1");

$rows = $stmt->fetchAll();

$page_name = 'orders';

?>


<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
<style>
    table {
        margin-left: 250px;
        font-size: 14px;
        margin-top: 2rem;
        margin-right: 1rem;
    }
</style>





<table class="table table-hover">
    <!-- `orderID`, `orderNumber`, `memberId`, `ship_name`, `ship_phone`, `ship_Address`, `created_at`, `shipStatus`, `paymentMethod`, `paymentStatus`, `paymentDate`, `product_Price`, `ship_Fee``shopDiscount`, `totalPrice`, `note`, `updated_at` -->
    <thead>
        <tr>
            <th scope="col" class="text-nowrap">訂單編號</th>

            <th scope="col" class="text-nowrap">會員ID</th>
            <th scope="col" class="text-nowrap">收件人</th>
            <th scope="col">電話</th>
            <th scope="col">地址</th>
            <th scope="col">建立時間</th>
            <th scope="col" class="text-nowrap">出貨狀態</th>
            <th scope="col" class="text-nowrap">付款方式</th>
            <th scope="col" class="text-nowrap">總品項</th>
            <th scope="col" class="text-nowrap">商品價格</th>
            <th scope="col" class="text-nowrap">折扣</th>
            <th scope="col" class="text-nowrap">總金額</th>
            <th scope="col" class="text-nowrap">附註</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $r) : ?>
            <tr>

                <td><?= $r['orderID'] ?></td>

                <td><?= $r['memberId'] ?></td>
                <td><?= $r['ship_name'] ?></td>
                <td><?= $r['ship_phone'] ?></td>
                <td><?= htmlentities($r['ship_Address']) ?></td>
                <td><?= $r['created_at'] ?></td>
                <td><?= $r['shipStatus'] ?></td>
                <td><?= $r['paymentMethod'] ?></td>
                <td><?= $r['orderNumber'] ?></td>
                <td><?= $r['product_Price'] ?></td>
                <td><?= $r['shopDiscount'] ?></td>
                <td><?= $r['totalPrice'] ?></td>
                <td><?= $r['note'] ?></td>


            </tr>
        <?php endforeach; ?>
    </tbody>

</table>


</div>
</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>