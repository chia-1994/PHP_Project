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
</style>
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

            <div class="nav-link dropright active">
                <a class="dropdown-toggle" data-toggle="dropdown" style="color: #FFFFFB">
                    課程管理
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="course-data-list.php">課程列表</a>
                    <a class="dropdown-item" href="#">會員報名</a>
                    <a class="dropdown-item" href="#">確認報名</a>
                </div>
            </div>

            <li class="nav-item">
                <a class="nav-link <?= $page_name == '##' ? 'active' : '' ?>" href="#">廠商管理</a>
            </li>
        </ul>

    </div>


    <!-- a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
