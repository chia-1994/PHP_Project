<?php

session_start();

unset($_SESSION['admin']);

# session_destroy(); // 清掉所有 session 資料

header('vendor-list.php');

// redirect // 轉向
