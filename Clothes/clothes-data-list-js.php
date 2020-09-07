<?php
$page_title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/parts/__connect_db.php';  //連線到資料庫

?>


<?php include __DIR__ . '/parts/__html_head.php' ?>
<style>
    .trashcolor {
        color: #CDC;
        cursor: pointer;
    }

    .editcolor {
        color: #CDC;
        cursor: pointer;
    }

    .Paginationcolor {
        color: #CDC;
    }
</style>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container">
    <table class="table table-striped">
        <!-- `sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time` -->
        <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">性別</th>
                <th scope="col">品名</th>
                <th scope="col">類型</th>
                <th scope="col">顏色</th>
                <th scope="col">尺寸</th>
                <th scope="col">價格</th>
                <th scope="col">廠商</th>
                <th scope="col">上架時間</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true"><i class="fas fa-arrow-circle-left Paginationcolor"></i></span>
                        </a>
                    </li> -->

                    <!-- <li class="page-item">
                            <a class= "page-link Paginationcolor" href="#"></a>
                        </li> -->

                    <!-- <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true"><i class="fas fa-arrow-circle-right Paginationcolor"></i></span>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/__scripts.php' ?>
<script>
    // 前後端分離 以下用JS拿資料生出畫面

    const tbody = document.querySelector('tbody');
    let pageData;

    const hashHandler = function(){
        let h = parseInt(location.hash.slice(1)) || 1;
        if(h<1) h=1;
        console.log(`h:${h}`);
        getData(h);
    }

    window.addEventListener('hashchange',hashHandler);
    hashHandler(); //頁面一進來就直接呼叫

    const pageItemTpl = (o) => {
        return `<li class="page-item ${o.active}">
                    <a class="page-link" href="#${o.page}">${o.page}</a>
            </li>`;
    };

    const rableRowTpl = (o) => {

        return `
        <tr>
        <td>${o.sid}</td> 
        <td>${o.gender}</td>
        <td>${o.name}</td>
        <td>${o.class}</td>
        <td>${o.color}</td>
        <td>${o.size}</td>
        <td>${o.price}</td>
        <td>${o.vendor}</td>
        <td>${o.added_time}</td>
        </tr>
        `;
    };

    
    function getData(page=1){
    fetch('clothes-data-list-api.php?page='+ page)
        .then(r => r.json())
        .then(obj => {
            console.log(obj);
            pageData = obj;
            let str = '';
            for (let i of obj.rows) {
                str += rableRowTpl(i);
            }
            tbody.innerHTML = str;

            str ='';
            for (let i = obj.page-2; i <= obj.page+2; i++) {
                if(i<1) continue;
                if(i>obj.totalPages) continue;
                const o = {
                    page: i,
                    active: ''
                }
                if (obj.page === i) {
                    o.active = 'active';
                }
                str += pageItemTpl(o);
            }
            document.querySelector('.pagination').innerHTML = str;
        });
    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>