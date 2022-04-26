<?php
require "../config/excute.php";
$_SERVER['admin'] = 'http://localhost/review-travel/app/admin/index.php';
$_SERVER['user'] = "http://localhost/review-travel/app/pages/index.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordComfirm = $_POST['passwordComfirm'];

    // Check user
    $check = getUserByEmail($email);
    // nếu không rỗng tức là đã có email này rồi
    if (!empty($check)) {
        setcookie("alert", "Email này đã được đăng kí rồi, hãy chọn email khác!", time() + 1, "/");
        setcookie("status", "error", time() + 1, "/");
        header('Location: ' . $_SERVER['user']);
        exit;
    }
    // check pass == passComfirm
    if ($password != $passwordComfirm) {
        setcookie("alert", "Mật khẩu nhập liệu đã không trùng", time() + 1, "/");
        setcookie("status", "error", time() + 1, "/");
        header('Location: ' . $_SERVER['user']);
        exit;
    }
    createUser($email, $password);
    setcookie("alert", "Chúc mừng đăng kí thành công", time() + 1, "/");
    setcookie("status", "success", time() + 1, "/");
    setcookie("email", $email, 0, "/");
    setcookie("roles", 1, 0, "/");
    header('Location: ' . $_SERVER['user']);
    exit;
}
