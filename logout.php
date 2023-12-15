<?php
session_start();
require_once('required/auth.php');

onlyAdmin();

unset($_SESSION['is_login']);
unset($_SESSION['username']);

header('location:index.php?login=sukses');
exit;

