<?php

function checkLogin() {
    if (isset($_SESSION['is_login'])) {
        $isLogin = $_SESSION['is_login'];        
        return $isLogin ? true : false;
    }

    return false;    
}

function onlyAdmin() {
    if (!checkLogin()) {
        header('location:index.php');
        exit;
    }
}

function getUserLogin($key) {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];

        return isset($user[$key]) ? $user[$key] : null;
    }

    return null;
}

