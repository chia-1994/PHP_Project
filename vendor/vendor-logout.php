<?php

session_start();

unset($_SESSION['admin']);

header('Location: vendor-login.php');
