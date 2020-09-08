<?php

session_start();

unset($_SESSION['admin']);

header('Location: member_manage_login.php');
