<?php

$page_name = 'list_food';
require __DIR__ . '../../parts/connect.php';
?>
<?php require __DIR__ . '../../parts/__html_head.php'; ?>
<style>
    .container {
        margin-left: 250px;
        margin-top: 100px;
    }

    s .pagination {
        margin-top: 50px
    }

    i {
        margin-left: 10px;
    }
</style>
<?php include __DIR__ . '../../parts/__navbar.php'; ?>



<div class="container">
    <div class="row">
        <div class="col d-flex">
            <form class="form-inline " name="form1" onsubmit="search(); return false; novalidate">
                <input class=" form-control mr-sm-2" type="search" placeholder="Search" id="search" name="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </div>
    <div class="row">
        <table class="table table-striped">

            <thead>
                <tr>



                    <th scope="col"><i class="fas fa-trash-alt"></i></th>
                    <th scope="col">#</th>
                    <th scope="col">商品名稱</th>
                    <th scope="col">價格</th>
                    <th scope="col">製造日期</th>
                    <th scope="col">使用期限</th>
                    <th scope="col">上架廠商</th>
                    <th scope="col">編輯</th>


                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
    <div class="col d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">


            </ul>
        </nav>

    </div>

    <?php include __DIR__ . '../../parts/__scripts.php'; ?>
    <script>
        const tbody = document.querySelector('tbody')

        const hashHandler = function() {
            // 不要#字號 所以從 索引1 開始切 (location  是指 網站的url)
            // 如果轉換為數字是 nan 就 設定為 1 
            let h = parseInt(location.hash.slice(1)) || 1;
            if (h < 1) h = 1

            getData(h)
        }


        window.addEventListener('hashchange', hashHandler)

        hashHandler(); //頁面一進來 直接呼叫 

        const pageItemTpl = (obj) => {
            // 設置一個 pageItemTpl 函數 顯示按鈕 
            return `<li class="page-item ${obj.active}">
                    <a class="page-link" href="#${obj.page}">${obj.page}</a>
                    </li>`
        }

        const tableRowTpl = (obj) => {
            // 設置一個tableRowTpl 顯示 表格的內容
            return `
             
                    <tr>
                     
                    
                    <td><a href="del.php?sid=${obj.sid}" onclick="ifDel(event)" data-sid="${obj.sid}">
                    <i class="fas fa-trash-alt"></i>
                    </a></td>
                    <td>${obj.sid}</td>
                    <td>${obj.name}</td>
                    <td>${obj.price}</td>
                    <td>${obj.MD}</td>
                    <td>${obj.expried}</td>
                    <td>${obj.firm}</td>
                    <td><a href="edit.php?sid=${obj.sid}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                
                `;
        };

        function ifDel(event) {
            const a = event.currentTarget;
            console.log(event.target, event.currentTarget);
            const sid = a.getAttribute('data-sid');
            if (!confirm(`是否要刪除編號為 ${sid} 的資料?`)) {
                event.preventDefault(); // 取消連往 href 的設定
            }
        }

        const fd = new FormData(document.form1);

        function search() {
            fetch('list_api1.php', {
                method: 'POST',
                body: fd
            })

        }

        function getData() {
            fetch('list_api1.php')
                .then(r => r.json())
                .then(obj => {



                        let str = '';
                        const o = [...obj.rows]
                        for (let i = 0; i < o.length; i++) {
                            str += tableRowTpl(o[i]);
                        }
                        tbody.innerHTML = str;
                        // 把str 塞到 tbody裡
                        str = '';




                        if (obj.page === 1) {
                            // 如果是在第一頁 按鈕就不能按
                            str += `<li class="page-item  disabled">
                    <a class="page-link" href="#${obj.page}">第一頁</a>
                    </li>`
                        } else {
                            str += `<li class="page-item ">
                    <a class="page-link" href="#${obj.page==1}">第一頁</a>
                    </li>`
                        }


                        if (obj.page === 1) {
                            // 如果是在第一頁 按鈕就不能按
                            str += `<li class="page-item  disabled">
                    <a class="page-link" href="#${obj.page-1}">上一頁</a>
                    </li>`
                        } else {
                            str += `<li class="page-item ">
                    <a class="page-link" href="#${obj.page-1}">上一頁</a>
                    </li>`
                        }



                        for (let i = 1; i <= obj.totalPages; i++) {
                            // 用for迴圈 把 fetch接收到的page資料 資料 遍歷出來 放入pageItemTpl中
                            if (i < 1) continue;
                            if (i > obj.totalPages) continue;
                            // 設置一個o 物件 把 page 塞進去  這邊的功能是用來判斷是否 進入active狀態
                            const o = {
                                page: i,
                                active: ''
                            }
                            if (obj.page === i) {
                                o.active = 'active';
                            }
                            str += pageItemTpl(o);
                        }

                        if (obj.page === obj.totalPages) {
                            // 如果是在最後一頁 按鈕就不能按
                            str += `<li class="page-item  disabled">
                    <a class="page-link" href="#${obj.page}">下一頁</a>
                    </li>`
                        } else {
                            str += `<li class="page-item ">
                    <a class="page-link" href="#${obj.page+1}">下一頁</a>
                    </li>`
                        }
                        // 如果是在最後一頁 按鈕就不能按
                        if (obj.page === obj.totalPages) {
                            str += `<li class="page-item  disabled">
                    <a class="page-link" href="#${obj.page-1}">最後一頁</a>
                    </li>`
                        } else {
                            str += `<li class="page-item ">
                    <a class="page-link" href="#${obj.totalPages}">最後一頁</a>
                    </li>`
                        }
                        document.querySelector('.pagination').innerHTML = str;
                        // 把 str 塞到 class pagination裡

                    }

                );

        }
    </script>
    <?php include __DIR__ . '../../parts/__html_foot.php'; ?>