<?php
require '../config/excute.php';
$_SERVER['admin'] = 'http://localhost/review-travel/app/admin/index.php';
$_SERVER['user'] = "http://localhost/review-travel/app/pages/index.php";
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data = findUser($email, $password);
    if (!empty($data)) {
        setcookie("email", $data['email'], 0, "/");
        setcookie("roles", $data['id_roles'], 0, "/");
        setcookie("alert", "Đăng nhập thành công", time() + 1, "/");
        setcookie("status", "success", time() + 1, "/");
    } else {
        setcookie("alert", "Sai email hoặc mật khẩu", time() + 1, "/");
        setcookie("status", "error", time() + 1, "/");
    }
}
header('Location: ' . $_SERVER['user']);
