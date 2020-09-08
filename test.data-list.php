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

INSERT INTO `shop_list` (`sid`, `name`, `price`, `MD`, `expried`, `firm`) VALUES
(NULL, '日本味王蔓越莓口含錠60粒', '380', '2020-08-05', '2021-01-28', '東版生技有限公司'),
(NULL, '【情人蜂蜜-中秋送禮】台灣天空森林蜜700g*3入組(MOMO獨家限量)', '990', '2019-08-05', '2020-12-28', '東版生技有限公司'),
(NULL, '黑芝麻糊30g x 12入(100%全天然)', '380', '2020-08-05', '2021-01-28', '宏偉有限公司'),
(NULL, '纖怡穀麥萃-蔓越莓南瓜籽', '500', '2020-10-05', '2021-10-28', '宏偉食品有限公司'),
(NULL, '統百米菓夾心餅(特濃黑芝麻)', '90', '2020-08-05', '2021-01-28', '宏偉食品有限公司'),
(NULL, '台樹西伯利亞野生松子', '380', '2020-08-05', '2021-01-28', '宏偉食品有限公司'),
(NULL, '里仁黃金苦蕎茶', '190', '2020-08-05', '2021-01-28', '東風食品有限公司'),
(NULL, 'Biona有機麥芽飲品(咖啡口感)', '360', '2020-08-07', '2021-10-28', '東風食品有限公司'),
(NULL, 'Aroina100%有機野櫻莓原汁', '680', '2020-08-05', '2021-01-28', '東風食品有限公司'),
(NULL, '米森有機黑森林野莓茶', '60', '2018-08-05', '2021-01-28', '東風食品有限公司'),
(NULL, '樂亞蜜有機雨前綠茶-玫瑰', '380', '2020-08-05', '2021-01-28', '東風食品有限公司'),
(NULL, '鈺統三機植物絞肉', '150', '2020-07-05', '2020-01-28', '誠食食品有限公司'),
(NULL, '福業【嘉年華+】有機冷凍白花椰', '380', '2020-08-05', '2021-01-28', '誠食食品有限公司'),
(NULL, '桑椹鳳檸雪酪', '190', '2020-08-04', '2021-05-28', '誠食食品有限公司'),
(NULL, '有機冷凍地瓜塊', '380', '2020-08-05', '2021-01-28', '誠食食品有限公司'),
(NULL, '淨源茶坊【嘉年華+】有機茶禮盒(鐵罐)', '380', '2020-09-05', '2021-04-28', '誠食食品有限公司')