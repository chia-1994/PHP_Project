<?php

session_start();

unset($_SESSION['admin']);

header('Location: member_user_login.php');
