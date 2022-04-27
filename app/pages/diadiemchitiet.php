<?php
require '../config/connect.php';
require '../config/excute.php'; ?>

<?php
$data = $name_dd = null;
$roles = 2;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $name_dd = getPlaceById($id)['name'];
    $data = getPostsByIdPlace($id);
    $comments = getAllCommentBy($id);
}
if (isset($_COOKIE['roles'])) {
    $roles = $_COOKIE['roles'];
}
if (isset($_POST['content'])) {
    $content = $_POST['content'];
    $idUser = getIdUser($_COOKIE['email'])['id'];
    createComment($idUser, $id, $content);
    setcookie("alert", "Đăng bình luận thành công!", time() + 1, "/");
    setcookie("status", "success", time() + 1, "/");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $result = findPostsByName($name);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/9a2c373fc2.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="./js/query.js"></script>
    <title>GhienDuLich - KinhNghiemDuLich</title>
    <link href="image/logo.png" rel="icon">
</head>

<body>
    <!-------------------- header---------------- -->
    <header class="header1">
        <div class="top">
            <div class="container">
                <div class="header-top">

                    <ul>
                        <li><a href="index.php"><svg width="237.96" height="45.185" viewBox="0 0 237.96 45.185" xmlns="http://www.w3.org/2000/svg">
                                    <g id="svgGroup" stroke-linecap="round" fill-rule="evenodd" font-size="9pt" stroke="#ff8c00" stroke-width="0.25mm" fill="black" style="stroke:#ff8c00;stroke-width:0.25mm;fill:#ff8c00">
                                        <path d="M 40.752 12.924 Q 41.436 12.924 41.796 12.996 A 1.207 1.207 0 0 1 42.347 13.243 Q 42.744 13.57 42.801 14.28 A 2.817 2.817 0 0 1 42.804 14.328 Q 38.88 15.156 36.558 18.576 A 13.818 13.818 0 0 0 34.79 22.152 A 11.661 11.661 0 0 0 34.236 25.704 Q 34.236 28.571 35.394 29.536 A 2.22 2.22 0 0 0 36.864 30.024 A 2.923 2.923 0 0 0 38.631 29.415 Q 39.055 29.102 39.449 28.629 A 6.561 6.561 0 0 0 39.708 28.296 A 12.504 12.504 0 0 0 41.029 25.861 Q 42.235 22.979 42.84 18.504 Q 43.524 13.248 45.396 11.736 A 5.919 5.919 0 0 1 46.617 10.952 A 7.793 7.793 0 0 1 47.628 10.548 Q 47.124 14.364 47.124 16.308 Q 47.124 28.788 44.812 35.887 A 25.164 25.164 0 0 1 44.046 37.944 A 14.819 14.819 0 0 1 41.976 41.482 A 9.714 9.714 0 0 1 34.02 45.18 A 8.492 8.492 0 0 1 32.234 45.003 Q 31.096 44.759 30.236 44.174 A 4.894 4.894 0 0 1 29.628 43.686 A 5.876 5.876 0 0 1 28.71 42.6 A 3.979 3.979 0 0 1 28.044 40.41 A 4.644 4.644 0 0 1 28.241 39.028 A 3.736 3.736 0 0 1 29.16 37.494 Q 30.243 36.393 32.175 36.361 A 7.03 7.03 0 0 1 32.292 36.36 Q 33.12 36.36 33.984 36.72 Q 32.616 37.62 32.616 39.492 A 3.513 3.513 0 0 0 32.849 40.785 A 3.254 3.254 0 0 0 33.372 41.67 A 2.688 2.688 0 0 0 34.029 42.256 A 2.229 2.229 0 0 0 35.226 42.588 Q 36.324 42.588 37.152 42.138 A 3.731 3.731 0 0 0 37.778 41.702 Q 38.07 41.455 38.366 41.123 A 8.899 8.899 0 0 0 38.844 40.536 Q 39.636 39.48 40.247 37.939 A 16.323 16.323 0 0 0 40.356 37.656 A 21.105 21.105 0 0 0 41.213 34.564 Q 41.871 31.335 41.973 26.889 A 68.232 68.232 0 0 0 41.976 26.748 A 12.761 12.761 0 0 1 40.687 29.499 A 10.187 10.187 0 0 1 38.808 31.716 A 8.92 8.92 0 0 1 37.306 32.801 Q 35.912 33.588 34.488 33.588 A 5.804 5.804 0 0 1 32.665 33.316 A 4.641 4.641 0 0 1 30.258 31.482 A 7.83 7.83 0 0 1 29.099 28.829 Q 28.8 27.584 28.8 26.1 Q 28.8 22.284 30.636 19.008 A 12.368 12.368 0 0 1 32.996 15.887 A 10.615 10.615 0 0 1 36.324 13.752 A 11.148 11.148 0 0 1 39.713 12.964 A 13.341 13.341 0 0 1 40.752 12.924 Z M 3.132 8.496 L 2.808 8.028 A 7.481 7.481 0 0 0 0.726 5.983 A 8.736 8.736 0 0 0 0.432 5.796 A 11.4 11.4 0 0 1 0.307 5.72 Q 0.058 5.567 0 5.508 Q 1.557 4.567 2.998 4.474 A 4.88 4.88 0 0 1 3.312 4.464 A 7.627 7.627 0 0 1 5.122 4.665 A 4.728 4.728 0 0 1 7.956 6.534 A 16.872 16.872 0 0 1 8.599 7.524 Q 10.129 10.032 13.222 16.252 A 395.475 395.475 0 0 1 13.464 16.74 Q 13.895 17.638 14.774 19.45 A 134.192 134.192 0 0 1 14.778 19.458 Q 15.567 21.084 16.082 22.149 A 1614.095 1614.095 0 0 1 16.2 22.392 A 53.898 53.898 0 0 0 18.521 26.831 A 48.605 48.605 0 0 0 18.9 27.468 Q 19.008 26.064 19.89 18.846 Q 20.708 12.151 20.767 8.043 A 43.431 43.431 0 0 0 20.772 7.416 A 22.728 22.728 0 0 0 20.758 6.652 Q 20.727 5.738 20.628 4.5 Q 23.12 4.5 23.993 5.063 A 1.568 1.568 0 0 1 24.012 5.076 A 1.976 1.976 0 0 1 24.587 5.645 Q 24.876 6.092 24.876 6.696 A 3.615 3.615 0 0 1 24.857 6.94 Q 24.746 8.1 23.972 14.429 A 3226.705 3226.705 0 0 1 23.688 16.74 Q 22.5 26.388 22.5 30.096 Q 22.5 31.1 22.541 31.695 A 7.232 7.232 0 0 0 22.572 32.04 Q 22.811 32.25 23.3 32.534 A 12.022 12.022 0 0 0 23.508 32.652 A 11.128 11.128 0 0 1 22.012 33.472 Q 21.185 33.84 20.408 33.99 A 5.497 5.497 0 0 1 19.368 34.092 Q 17.606 34.092 16.273 32.28 A 7.617 7.617 0 0 1 16.056 31.968 A 9.6 9.6 0 0 1 15.706 31.401 Q 14.716 29.706 11.718 23.958 Q 8.321 17.445 6.739 14.579 A 105.513 105.513 0 0 0 6.48 14.112 A 55.852 55.852 0 0 1 6.393 14.808 Q 6.259 15.832 6.001 17.624 A 596.598 596.598 0 0 1 5.832 18.792 Q 5.132 23.819 4.936 27.689 A 56.271 56.271 0 0 0 4.86 30.528 A 23.352 23.352 0 0 0 4.874 31.299 Q 4.903 32.167 4.991 33.347 A 80.163 80.163 0 0 0 5.004 33.516 A 16.858 16.858 0 0 1 3.913 33.483 Q 2.296 33.378 1.618 32.932 A 1.623 1.623 0 0 1 1.602 32.922 A 2.013 2.013 0 0 1 0.999 32.309 Q 0.755 31.912 0.724 31.397 A 2.525 2.525 0 0 1 0.72 31.248 A 3.3 3.3 0 0 1 0.739 31.026 Q 0.868 29.756 1.908 21.582 Q 3.002 12.981 3.119 9.125 A 30.341 30.341 0 0 0 3.132 8.496 Z M 58.926 18.04 A 18.849 18.849 0 0 0 57.168 22.212 Q 57.42 19.62 58.122 13.86 Q 58.824 8.1 58.824 6.3 Q 58.824 4.718 58.475 3.562 A 5.036 5.036 0 0 0 57.834 2.178 A 4.086 4.086 0 0 0 56.754 1.12 Q 56.225 0.755 55.527 0.463 A 10.823 10.823 0 0 0 54.144 0 Q 54.576 1.08 54.576 4.212 A 63.384 63.384 0 0 1 54.511 6.972 Q 54.22 13.612 52.632 24.552 A 149.84 149.84 0 0 0 52.432 26.025 Q 52.02 29.186 52.02 30.456 Q 52.02 31.109 52.18 31.612 A 2.191 2.191 0 0 0 52.92 32.706 Q 53.581 33.222 54.863 33.358 A 9.535 9.535 0 0 0 55.872 33.408 A 6.201 6.201 0 0 0 56.03 33.406 Q 56.332 33.398 56.918 33.364 A 93.665 93.665 0 0 0 57.384 33.336 A 9.998 9.998 0 0 1 57.304 32.755 Q 57.168 31.534 57.168 29.466 Q 57.168 26.856 57.816 24.228 A 25.065 25.065 0 0 1 58.12 23.105 Q 58.385 22.209 58.693 21.444 A 12.466 12.466 0 0 1 59.418 19.926 A 16.259 16.259 0 0 1 59.722 19.414 Q 60.114 18.782 60.52 18.265 A 8.597 8.597 0 0 1 61.416 17.28 A 6.695 6.695 0 0 1 61.495 17.207 Q 62.088 16.673 62.622 16.456 A 1.863 1.863 0 0 1 63.324 16.308 Q 64.764 16.308 64.764 18.684 A 13.706 13.706 0 0 1 64.733 19.561 Q 64.614 21.396 64.044 24.462 Q 63.481 27.485 63.358 28.96 A 8.665 8.665 0 0 0 63.324 29.664 A 7.204 7.204 0 0 0 63.371 30.512 Q 63.445 31.133 63.634 31.627 A 2.829 2.829 0 0 0 64.602 32.94 Q 65.88 33.876 68.904 33.876 Q 69.768 33.876 70.236 33.84 Q 69.12 33.228 68.652 32.382 A 2.473 2.473 0 0 1 68.51 32.075 Q 68.288 31.499 68.217 30.596 A 11.742 11.742 0 0 1 68.184 29.682 Q 68.184 27.828 68.886 23.76 Q 69.588 19.692 69.588 17.442 A 9.826 9.826 0 0 0 69.556 16.64 Q 69.496 15.906 69.321 15.288 A 4.66 4.66 0 0 0 68.67 13.878 A 2.745 2.745 0 0 0 67.847 13.103 Q 67.355 12.801 66.699 12.668 A 5.674 5.674 0 0 0 65.574 12.564 A 3.532 3.532 0 0 0 65.048 12.604 Q 63.095 12.898 60.876 15.354 A 15.78 15.78 0 0 0 58.926 18.04 Z M 226.65 18.04 A 18.849 18.849 0 0 0 224.892 22.212 Q 225.144 19.62 225.846 13.86 Q 226.548 8.1 226.548 6.3 Q 226.548 4.718 226.199 3.562 A 5.036 5.036 0 0 0 225.558 2.178 A 4.086 4.086 0 0 0 224.478 1.12 Q 223.949 0.755 223.251 0.463 A 10.823 10.823 0 0 0 221.868 0 Q 222.3 1.08 222.3 4.212 A 63.384 63.384 0 0 1 222.235 6.972 Q 221.944 13.612 220.356 24.552 A 149.84 149.84 0 0 0 220.156 26.025 Q 219.744 29.186 219.744 30.456 Q 219.744 31.109 219.904 31.612 A 2.191 2.191 0 0 0 220.644 32.706 Q 221.305 33.222 222.587 33.358 A 9.535 9.535 0 0 0 223.596 33.408 A 6.201 6.201 0 0 0 223.754 33.406 Q 224.056 33.398 224.642 33.364 A 93.665 93.665 0 0 0 225.108 33.336 A 9.998 9.998 0 0 1 225.028 32.755 Q 224.892 31.534 224.892 29.466 Q 224.892 26.856 225.54 24.228 A 25.065 25.065 0 0 1 225.844 23.105 Q 226.109 22.209 226.417 21.444 A 12.466 12.466 0 0 1 227.142 19.926 A 16.259 16.259 0 0 1 227.446 19.414 Q 227.838 18.782 228.244 18.265 A 8.597 8.597 0 0 1 229.14 17.28 A 6.695 6.695 0 0 1 229.219 17.207 Q 229.812 16.673 230.346 16.456 A 1.863 1.863 0 0 1 231.048 16.308 Q 232.488 16.308 232.488 18.684 A 13.706 13.706 0 0 1 232.457 19.561 Q 232.338 21.396 231.768 24.462 Q 231.205 27.485 231.082 28.96 A 8.665 8.665 0 0 0 231.048 29.664 A 7.204 7.204 0 0 0 231.095 30.512 Q 231.169 31.133 231.358 31.627 A 2.829 2.829 0 0 0 232.326 32.94 Q 233.604 33.876 236.628 33.876 Q 237.492 33.876 237.96 33.84 Q 236.844 33.228 236.376 32.382 A 2.473 2.473 0 0 1 236.234 32.075 Q 236.012 31.499 235.941 30.596 A 11.742 11.742 0 0 1 235.908 29.682 Q 235.908 27.828 236.61 23.76 Q 237.312 19.692 237.312 17.442 A 9.826 9.826 0 0 0 237.28 16.64 Q 237.22 15.906 237.045 15.288 A 4.66 4.66 0 0 0 236.394 13.878 A 2.745 2.745 0 0 0 235.571 13.103 Q 235.079 12.801 234.423 12.668 A 5.674 5.674 0 0 0 233.298 12.564 A 3.532 3.532 0 0 0 232.772 12.604 Q 230.819 12.898 228.6 15.354 A 15.78 15.78 0 0 0 226.65 18.04 Z M 121.021 12.677 A 5.376 5.376 0 0 0 119.88 12.564 Q 117.756 12.564 115.2 15.372 A 15.935 15.935 0 0 0 113.349 17.856 A 18.433 18.433 0 0 0 111.456 22.212 A 40.466 40.466 0 0 0 111.57 21.491 Q 111.727 20.427 111.807 19.478 A 21.859 21.859 0 0 0 111.888 17.658 A 7.299 7.299 0 0 0 111.887 17.536 A 6.024 6.024 0 0 0 110.844 14.166 A 4.566 4.566 0 0 0 109.938 13.196 Q 108.896 12.351 107.172 11.808 Q 107.784 14.22 107.784 17.082 A 23.326 23.326 0 0 1 107.78 17.507 Q 107.746 19.355 107.427 21.945 A 87.674 87.674 0 0 1 107.028 24.768 Q 106.272 29.592 106.272 30.312 Q 106.272 31.114 106.483 31.697 A 2.193 2.193 0 0 0 107.172 32.688 A 2.247 2.247 0 0 0 107.417 32.858 Q 108.33 33.408 110.124 33.408 A 6.201 6.201 0 0 0 110.282 33.406 Q 110.584 33.398 111.17 33.364 A 93.665 93.665 0 0 0 111.636 33.336 A 9.998 9.998 0 0 1 111.556 32.755 Q 111.42 31.534 111.42 29.466 Q 111.42 26.856 112.068 24.228 A 24.273 24.273 0 0 1 112.373 23.105 Q 112.64 22.209 112.952 21.444 A 12.175 12.175 0 0 1 113.688 19.926 A 16.832 16.832 0 0 1 114 19.41 Q 114.4 18.775 114.812 18.255 A 8.813 8.813 0 0 1 115.704 17.28 A 6.834 6.834 0 0 1 115.833 17.163 Q 116.414 16.649 116.926 16.444 A 1.748 1.748 0 0 1 117.576 16.308 Q 119.016 16.308 119.016 18.684 A 13.706 13.706 0 0 1 118.985 19.561 Q 118.866 21.396 118.296 24.462 Q 117.733 27.485 117.61 28.96 A 8.665 8.665 0 0 0 117.576 29.664 A 7.204 7.204 0 0 0 117.623 30.512 Q 117.697 31.133 117.886 31.627 A 2.829 2.829 0 0 0 118.854 32.94 Q 120.132 33.876 123.156 33.876 Q 124.02 33.876 124.488 33.84 Q 123.372 33.228 122.904 32.382 A 2.473 2.473 0 0 1 122.762 32.075 Q 122.54 31.499 122.469 30.596 A 11.742 11.742 0 0 1 122.436 29.682 Q 122.436 27.828 123.138 23.76 Q 123.84 19.692 123.84 17.442 A 9.826 9.826 0 0 0 123.808 16.64 Q 123.748 15.906 123.573 15.288 A 4.66 4.66 0 0 0 122.922 13.878 Q 122.273 12.949 121.021 12.677 Z M 167.796 12.564 Q 168.876 12.492 169.308 12.492 A 8.245 8.245 0 0 1 170.34 12.552 Q 171.469 12.695 172.152 13.176 Q 172.903 13.705 173.074 14.921 A 5.59 5.59 0 0 1 173.124 15.696 A 4.066 4.066 0 0 1 173.1 16.044 Q 172.997 17.104 172.44 20.754 A 71.427 71.427 0 0 0 172.023 23.936 Q 171.856 25.499 171.794 26.868 A 34.442 34.442 0 0 0 171.756 28.44 A 25.697 25.697 0 0 0 171.887 31.099 Q 172.034 32.513 172.347 33.744 A 15.33 15.33 0 0 0 172.44 34.092 A 10.803 10.803 0 0 1 170.931 33.49 Q 170.175 33.115 169.616 32.653 A 4.587 4.587 0 0 1 168.696 31.644 A 6.139 6.139 0 0 1 167.824 29.496 A 8.693 8.693 0 0 1 167.652 27.72 A 7.672 7.672 0 0 1 167.666 27.303 Q 167.724 26.266 168.024 23.842 A 176.568 176.568 0 0 1 168.048 23.652 Q 166.932 27.756 164.646 30.546 Q 162.72 32.896 160.986 33.267 A 3.068 3.068 0 0 1 160.344 33.336 Q 156.888 33.336 156.317 29.172 A 13.388 13.388 0 0 1 156.204 27.36 A 18.567 18.567 0 0 1 156.259 26.008 Q 156.385 24.3 156.798 21.834 Q 157.392 18.288 157.392 16.452 Q 157.392 14.616 156.888 12.744 A 18.407 18.407 0 0 1 158.36 12.799 Q 160.235 12.95 161.226 13.518 A 2.436 2.436 0 0 1 162.294 14.81 Q 162.468 15.262 162.535 15.837 A 6.601 6.601 0 0 1 162.576 16.596 Q 162.576 17.82 161.82 21.456 Q 161.209 24.395 161.092 26.158 A 11.678 11.678 0 0 0 161.064 26.928 Q 161.064 28.573 161.613 29.202 A 1.126 1.126 0 0 0 162.504 29.592 A 1.322 1.322 0 0 0 163.025 29.475 Q 163.546 29.252 164.16 28.602 Q 164.929 27.788 165.65 26.537 A 17.326 17.326 0 0 0 165.96 25.974 Q 166.824 24.336 167.418 21.87 Q 168.012 19.404 168.012 16.866 Q 168.012 14.328 167.796 12.564 Z M 204.732 25.2 A 15.314 15.314 0 0 0 204.856 27.243 Q 205.159 29.479 206.201 30.456 A 2.892 2.892 0 0 0 208.26 31.212 A 4.383 4.383 0 0 0 209.897 30.882 A 6.211 6.211 0 0 0 211.032 30.276 Q 212.436 29.34 213.48 27.684 A 2.588 2.588 0 0 1 214.014 27.86 Q 214.76 28.208 214.776 28.982 A 1.652 1.652 0 0 1 214.776 29.016 A 11.335 11.335 0 0 1 213.435 30.902 A 8.035 8.035 0 0 1 211.068 32.76 Q 208.872 33.876 206.676 33.876 A 6.646 6.646 0 0 1 201.801 31.848 A 8.298 8.298 0 0 1 201.654 31.698 A 6.989 6.989 0 0 1 200.07 28.93 Q 199.736 27.868 199.631 26.588 A 14.877 14.877 0 0 1 199.584 25.38 A 16.008 16.008 0 0 1 200.268 20.612 A 13.447 13.447 0 0 1 202.5 16.326 Q 205.416 12.564 210.384 12.564 Q 212.25 12.564 213.496 13.176 A 4.179 4.179 0 0 1 214.56 13.914 A 4.654 4.654 0 0 1 215.579 15.315 A 4.245 4.245 0 0 1 215.964 17.118 Q 215.964 18.972 214.83 20.34 A 3.77 3.77 0 0 1 213.561 21.355 A 3.709 3.709 0 0 1 211.932 21.708 A 4.38 4.38 0 0 1 210.447 21.442 A 5.116 5.116 0 0 1 210.204 21.348 A 3.43 3.43 0 0 0 210.551 20.871 Q 210.869 20.352 211.16 19.566 A 12.344 12.344 0 0 0 211.212 19.422 A 8.806 8.806 0 0 0 211.54 18.272 Q 211.671 17.644 211.679 17.069 A 5.371 5.371 0 0 0 211.68 16.992 A 3.677 3.677 0 0 0 211.595 16.163 Q 211.331 15.027 210.247 14.835 A 2.725 2.725 0 0 0 209.772 14.796 A 2.98 2.98 0 0 0 207.676 15.68 Q 206.811 16.498 206.136 18.072 Q 204.732 21.348 204.732 25.2 Z M 130.032 32.04 L 128.988 31.428 Q 129.019 31.176 129.601 27.27 A 6418.508 6418.508 0 0 1 129.78 26.064 A 154.55 154.55 0 0 0 130.943 16.275 Q 131.351 11.468 131.364 7.154 A 94.007 94.007 0 0 0 131.364 6.876 Q 131.364 4.688 131.066 3.48 A 4.241 4.241 0 0 0 130.86 2.844 A 13.438 13.438 0 0 1 132.655 3.44 Q 134.664 4.284 135.471 5.608 A 3.675 3.675 0 0 1 135.684 6.012 Q 138.888 4.464 141.696 4.464 A 10.055 10.055 0 0 1 145.478 5.15 Q 147.778 6.074 149.404 8.247 A 11.552 11.552 0 0 1 149.508 8.388 A 14.542 14.542 0 0 1 151.935 14 A 20.615 20.615 0 0 1 152.352 18.252 A 18.897 18.897 0 0 1 151.667 23.425 A 16.156 16.156 0 0 1 150.156 27.036 Q 147.708 31.32 143.28 32.976 Q 140.868 33.876 138.204 33.876 A 20.302 20.302 0 0 1 135.186 33.66 A 16.643 16.643 0 0 1 133.29 33.264 Q 131.452 32.764 130.443 32.264 A 5.484 5.484 0 0 1 130.032 32.04 Z M 94.068 24.48 Q 92.34 24.48 90.684 24.084 A 5.073 5.073 0 0 0 90.668 24.289 Q 90.648 24.633 90.648 25.2 Q 90.648 28.188 91.764 29.7 A 4.489 4.489 0 0 0 92.523 30.513 A 2.931 2.931 0 0 0 94.428 31.212 A 5.133 5.133 0 0 0 97.021 30.499 A 6.349 6.349 0 0 0 97.38 30.276 Q 98.784 29.34 99.828 27.684 A 2.588 2.588 0 0 1 100.362 27.86 Q 101.108 28.208 101.124 28.982 A 1.652 1.652 0 0 1 101.124 29.016 A 12.616 12.616 0 0 1 98.877 31.657 A 8.732 8.732 0 0 1 92.952 33.876 A 7.091 7.091 0 0 1 87.946 31.835 A 9.432 9.432 0 0 1 87.66 31.554 A 7.645 7.645 0 0 1 85.738 28.049 Q 85.435 26.877 85.397 25.492 A 14.637 14.637 0 0 1 85.392 25.092 Q 85.392 21.996 86.58 19.206 A 11.277 11.277 0 0 1 90.041 14.734 A 13.388 13.388 0 0 1 90.36 14.49 Q 92.952 12.564 96.102 12.564 A 10.927 10.927 0 0 1 97.783 12.684 Q 98.642 12.818 99.327 13.102 A 4.374 4.374 0 0 1 100.728 14.004 Q 102.204 15.444 102.204 17.784 A 7.669 7.669 0 0 1 101.95 19.819 A 5.266 5.266 0 0 1 99.846 22.824 Q 97.488 24.48 94.068 24.48 Z M 178.208 31.816 A 4.788 4.788 0 0 0 178.524 32.436 A 2.061 2.061 0 0 0 179.201 33.096 Q 180.276 33.774 182.592 33.876 A 93.856 93.856 0 0 1 182.532 32.949 Q 182.448 31.518 182.448 30.636 Q 182.448 26.973 182.941 21.711 A 200.259 200.259 0 0 1 183.492 16.596 Q 184.34 9.518 184.499 7.145 A 13.552 13.552 0 0 0 184.536 6.3 Q 184.536 4.718 184.187 3.562 A 5.036 5.036 0 0 0 183.546 2.178 A 4.086 4.086 0 0 0 182.466 1.12 Q 181.937 0.755 181.239 0.463 A 10.823 10.823 0 0 0 179.856 0 A 2.881 2.881 0 0 1 179.962 0.328 Q 180.206 1.245 180.267 3.226 A 47.183 47.183 0 0 1 180.288 4.68 Q 180.288 7.436 179.581 13.738 A 335.558 335.558 0 0 1 179.082 17.928 Q 177.876 27.576 177.876 28.98 A 30.062 30.062 0 0 0 177.882 29.605 Q 177.895 30.235 177.937 30.671 A 5.866 5.866 0 0 0 177.984 31.05 Q 178.045 31.425 178.208 31.816 Z M 134.244 30.636 Q 135.648 31.176 137.376 31.176 Q 140.508 31.176 142.794 29.16 Q 145.08 27.144 146.106 24.228 Q 147.132 21.312 147.132 18.036 A 17.565 17.565 0 0 0 146.859 14.849 Q 146.397 12.346 145.152 10.512 Q 143.172 7.596 139.824 7.596 A 11.411 11.411 0 0 0 137.977 7.738 A 8.395 8.395 0 0 0 136.152 8.244 Q 136.152 10.44 135.198 19.296 A 482.606 482.606 0 0 0 134.874 22.393 Q 134.268 28.385 134.245 30.479 A 14.5 14.5 0 0 0 134.244 30.636 Z M 81.26 15.786 A 3.493 3.493 0 0 0 81.288 15.444 A 5.594 5.594 0 0 0 81.232 14.621 Q 81.168 14.193 81.032 13.854 A 2.052 2.052 0 0 0 80.478 13.05 A 1.981 1.981 0 0 0 80.099 12.795 Q 79.246 12.348 77.58 12.348 A 14.398 14.398 0 0 0 76.961 12.362 A 18.061 18.061 0 0 0 76.104 12.42 A 9.079 9.079 0 0 1 76.173 12.869 Q 76.32 13.994 76.32 15.804 Q 76.32 18 75.744 21.96 A 137.227 137.227 0 0 0 75.663 22.527 Q 75.297 25.115 75.202 26.556 A 13.523 13.523 0 0 0 75.168 27.432 Q 75.168 30.24 76.14 31.698 A 3.243 3.243 0 0 0 76.264 31.871 Q 76.979 32.805 78.495 33.416 A 11.35 11.35 0 0 0 79.92 33.876 A 2.165 2.165 0 0 1 79.838 33.658 Q 79.49 32.571 79.506 29.574 A 33.549 33.549 0 0 1 79.611 27.195 Q 79.813 24.561 80.406 21.114 Q 81.13 16.906 81.26 15.786 Z M 195.452 15.786 A 3.493 3.493 0 0 0 195.48 15.444 A 5.594 5.594 0 0 0 195.424 14.621 Q 195.36 14.193 195.224 13.854 A 2.052 2.052 0 0 0 194.67 13.05 A 1.981 1.981 0 0 0 194.291 12.795 Q 193.438 12.348 191.772 12.348 A 14.398 14.398 0 0 0 191.153 12.362 A 18.061 18.061 0 0 0 190.296 12.42 A 9.079 9.079 0 0 1 190.365 12.869 Q 190.512 13.994 190.512 15.804 Q 190.512 18 189.936 21.96 A 137.227 137.227 0 0 0 189.855 22.527 Q 189.489 25.115 189.394 26.556 A 13.523 13.523 0 0 0 189.36 27.432 Q 189.36 30.24 190.332 31.698 A 3.243 3.243 0 0 0 190.456 31.871 Q 191.171 32.805 192.687 33.416 A 11.35 11.35 0 0 0 194.112 33.876 A 2.165 2.165 0 0 1 194.03 33.658 Q 193.682 32.571 193.698 29.574 A 33.549 33.549 0 0 1 193.803 27.195 Q 194.005 24.561 194.598 21.114 Q 195.322 16.906 195.452 15.786 Z M 90.828 22.572 L 91.368 22.572 Q 94.5 22.572 95.994 20.952 Q 97.488 19.332 97.488 17.064 A 3.009 3.009 0 0 0 97.381 16.246 A 2.439 2.439 0 0 0 97.002 15.462 Q 96.516 14.796 95.58 14.796 Q 93.988 14.796 92.828 16.502 A 7.36 7.36 0 0 0 92.484 17.064 A 12.722 12.722 0 0 0 91.414 19.661 Q 91.057 20.877 90.866 22.28 A 21.455 21.455 0 0 0 90.828 22.572 Z M 81.107 9.268 A 16.647 16.647 0 0 0 81.828 9.18 Q 82.2 8.063 82.316 7.271 A 4.516 4.516 0 0 0 82.368 6.624 Q 82.368 4.538 79.967 4.131 A 7.855 7.855 0 0 0 78.66 4.032 Q 78.187 4.032 77.617 4.088 A 16.647 16.647 0 0 0 76.896 4.176 Q 76.524 5.293 76.408 6.085 A 4.516 4.516 0 0 0 76.356 6.732 Q 76.356 9.306 80.013 9.324 A 10.494 10.494 0 0 0 80.064 9.324 Q 80.536 9.324 81.107 9.268 Z M 195.299 9.268 A 16.647 16.647 0 0 0 196.02 9.18 Q 196.392 8.063 196.508 7.271 A 4.516 4.516 0 0 0 196.56 6.624 Q 196.56 4.538 194.159 4.131 A 7.855 7.855 0 0 0 192.852 4.032 Q 192.379 4.032 191.809 4.088 A 16.647 16.647 0 0 0 191.088 4.176 Q 190.716 5.293 190.6 6.085 A 4.516 4.516 0 0 0 190.548 6.732 Q 190.548 9.306 194.205 9.324 A 10.494 10.494 0 0 0 194.256 9.324 Q 194.728 9.324 195.299 9.268 Z" vector-effect="non-scaling-stroke" />
                                    </g>
                                </svg></a></li>
                        <i class="fas fa-times"></i>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="diadiem.php">Địa Điểm</a></li>
                        <li><a href="Blog.html">Liên hệ</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <form class="form-inline d-flex" action="diadiemchitiet.php" method="post">
                            <input class="form-control" type="search" name="name" placeholder="Search" aria-label="Search" required>
                            <button class="btn btn-sm btn-search" type="submit">Search</button>
                        </form>
                        <div class="d-flex flex-column auth">
                            <?php
                            if (!isset($_COOKIE['email']));
                            else {
                                echo '<span><i class="fas fa-user"></i> ' . $_COOKIE['email'] . '</span>';
                                echo '<a class="logout" href="../../logout.php">Đăng xuất</a>';
                            }
                            ?>
                        </div>
                    </div>

                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
        <div class="bg-image"></div>
        <div class="header-text">
            <h1>Kinh nghiệm du lịch <?php echo $name_dd ?: $name; ?> tự túc từ A-Z</h1>
            <span style="text-shadow: 10px; color:whitesmoke;">
                <?php echo $name_dd ?: $name; ?> có gì mà khiến bao người một lần đặt chân đến đây đều say đắm, mê mẩn? Cùng tìm hiểu “tất tần tật” những kinh nghiệm du lịch <?php echo $name_dd ?: $name; ?> tự túc qua cẩm nang chi tiết dưới đây để tìm cho mình lời giải đáp nhé!</span>
    </header>
    <!-- -------------------introduce-------------------- -->
    <div class="container">
        <section class="introduce">
            <div class="introduce-content">
                <h1>Những địa điểm du lịch <?php echo $name_dd ?: $name; ?></h1>

                <div>
                    <?php if (!empty($data)) {
                        foreach ($data as $key => $value) { ?>
                            <div class="mx-auto">
                                <h3 class="my-3"><?php echo ($key + 1) . ". " .  $value['title']; ?></h3>
                                <div>
                                    <?php echo $value['description']; ?>
                                </div>
                            </div>
                        <?php }
                    } elseif (!empty($result)) { ?>
                </div>
                <div>
                    <?php
                        foreach ($result as $key => $value) { ?>
                        <div class="mx-auto">
                            <h3><?php echo $value['title']; ?></h3>
                            <div>
                                <?php echo $value['description']; ?>
                            </div>
                        </div>
                <?php }
                    } else {
                        echo '<p class="text-danger text-center">Xin lỗi, những địa điểm đang được cập nhật</p>';
                    } ?>
                </div>
            </div>
        </section>
        <?php if (!empty($comments)) { ?>
            <section class="comments">
                <div class="container">
                    <h4 class="text-warning">(<?php echo count($comments) ?>)Bình luận</h4>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="comment">
                                <?php foreach ($comments as $key => $value) { ?>
                                    <div class="comment-item">
                                        <span class="comment-email">Email : <?php echo getUserById($value['id_userd'])['email'] ?></span>
                                        <div class="comment-auth">
                                            <span class="comment-content"><?php echo $value['content'] ?></span>
                                            <span class="comment-time"><i class="fas fa-clock"></i> <?php echo $value['ts'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php

            if ($roles == 1) {
                echo '<section class="mt-5">
                <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h4 class="text-warning">Hãy để lại ý kiến của bạn</h4>
                        <form action="" method="post">
                            <div class="form-group mb-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" id="content" rows="3"></textarea>
                            </div>
                            <button class="btn btn-create disabled">Bình luận</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>';
            }
            ?>
    </div>
    <!-- ----------------------------------------------------- -->
    <!-- --------------------- facilities----------------------- -->
    <!-- ----------------------footer---------------------- -->
    <footer>
        <div class="footer">
            <h1>Về Chúng Tôi</h1>
            <p>
                Trung Tâm của chúng tôi cung cấp những thông tin du lịch tại Việt Nam <br />Đầy bổ ích mà không cần bạn phải đến tận nơi mới có thể biết
            </p>
            <ul>
                <li>
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </li>
                <li>
                    <a href=""><i class="fas fa-fax"></i></a>
                </li>
                <p>Made with by Tam and Nhu</p>
            </ul>
        </div>
    </footer>
    <span class="croll-top"><i class="fas fa-arrow-alt-circle-up"></i></span>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
        if (isset($_COOKIE['alert'])) {
        ?>
            new swal({
                icon: '<?php echo $_COOKIE['status'] ?>',
                title: '<?php echo $_COOKIE['status'] == "success" ? "Chúc mừng" : "Xin lỗi" ?>',
                text: '<?php echo $_COOKIE['alert'] ?>!'
            })
        <?php
        } ?>
    </script>
    <script type="text/javascript" src="../../public/javascript/main.js"></script>
    <?php if ($roles == 1) { ?>
        <script>
            const btnPostComment = $('.btn-create');
            const contentComents = $('textarea[name="content"]');

            function handleSumit(value) {
                if (value !== '') {
                    btnPostComment.removeClass("disabled");
                } else {
                    btnPostComment.addClass("disabled");
                }
            }
            contentComents.keyup(function(e) {
                handleSumit(e.target.value);
            })
        </script>
    <?php } ?>



</body>

</html>