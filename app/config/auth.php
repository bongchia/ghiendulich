<?php
if (empty($_COOKIE['email'])) {
    header('Location: ../pages/');
} else {
    $email = $_COOKIE['email'];
}

if ($_COOKIE['roles'] == 1) {
    header('Location: ../pages/');
}
