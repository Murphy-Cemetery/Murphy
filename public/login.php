<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../inc/Residents.class.php');
$resident = new Residents();
if (isset($_REQUEST['login'])) {
    $resident->login($_POST['user_name'], $_POST['user_password']);
}
if (isset($_REQUEST['logout'])) {
    $resident->logout();
    header('Location: ../index.html');
    exit;
}
require_once('../tpl/login.tpl.php');
?>
