<?php
$_SERVER['user'] = "http://localhost/review-travel/app/pages/index.php";
setcookie("email", '', 0, "/");
setcookie("roles", '', 0, "/");

header('Location: ' . $_SERVER['user']);
