<?php
require_once '../vendor/autoload.php';

if (isset($_GET['page'])) {
    if($_GET['page']=='') {
        include 'dashboard.php';
    }
    elseif ($_GET['page']=='register') {
        include 'register.php';
    }
    elseif ($_GET['page']=='login') {
        include 'login.php';
    }
    elseif ($_GET['page']=='home') {
        include 'home.php';
    }
    elseif ($_GET['page']=='add') {
        include 'add.php';
    }
    elseif ($_GET['page']=='edit') {
        include 'edit.php';
    }
    elseif ($_GET['page']=='logout') {
        include 'logout.php';
    }
}
