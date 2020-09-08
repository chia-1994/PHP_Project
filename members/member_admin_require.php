<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header('Location: member_list.php');
    exit;
    #如果沒有登入就什麼都不給看
}
