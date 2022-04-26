<!DOCTYPE html>
<?php
require('../config/auth.php');
require('../../bootstrap.php');
require('../config/connect.php');
require('../config/excute.php');
$_SERVER['admin'] = 'http://localhost/review-travel/app/admin/index.php';
if (!empty($_GET['id'])) {
    if (deletePostById($_GET['id'])) {
        setcookie("alert", "Xóa bài viết thành công", time() + 1, "/");
        setcookie("status", "success", time() + 1, "/");
        header('Location: ' . $_SERVER['admin']);
    }
}
if (!empty($_GET['idComment'])) {
    if (deleteCommentById($_GET['idComment'])) {
        setcookie("alert", "Xóa bình luận thành công", time() + 1, "/");
        setcookie("status", "success", time() + 1, "/");
        header('Location: ' . $_SERVER['admin']);
    }
}

$dataComments = getAllComment();
$dataPost = getAllPost();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../public/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">

</head>
<style>

</style>

<body>
    <div class="container-fuild ">
        <?php require '../patials/navBar.php' ?>
        <div class="d-flex main-bg">
            <div class="nav flex-column nav-pills w-25 pt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <ul class="navbar-nav mr-3">
                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle convert-size" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> <?php echo $email; ?>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../admin/createPost.php">Thêm bài viết mới</a>
                            <div class="dropdown-divider"></div>
                            <?php
                            if (!isset($_COOKIE['email']));
                            else {
                                echo '<a class="dropdown-item" href="../../logout.php">Đăng xuất</a>';
                            }
                            ?>

                        </div>
                    </li>
                </ul>
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-book-open"></i> Quản lí bài viết</a>
                <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa-solid fa-users"></i> Quản lí bình luận</a>
            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="text-center">Danh sách các bài viết</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Địa điểm</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataPost)) {
                                foreach ($dataPost as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"> <?php echo $value['id'] ?></th>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo getPlaceById($value['id_place'])['name'] ?></td>
                                        <td colspan="2"><a class="btn btn-warning" href="edit.php?id=<?php echo $value['id'] ?>">Sửa</a>
                                            <a class="btn btn-danger btn-delete" href="?id=<?php echo $value['id'] ?>">Xóa</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                        </tbody>
                    <?php echo '<p class="text-danger text-center">Danh sách rỗng, 
                                <a  href="../admin/createPost.php">Thêm bài viết mới</a></p>';
                            } ?>
                    </table>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h2 class="text-center">Danh sách các bình luận</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Content</th>
                                <th scope="col">Email Poster</th>
                                <th scope="col">Timestamp</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dataComments)) {
                                foreach ($dataComments as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"> <?php echo $key ?></th>
                                        <td><?php echo $value['content'] ?></td>
                                        <td><?php echo getUserById($value['id_userd'])['email'] ?></td>
                                        <td><?php echo $value['ts'] ?></td>
                                        <td colspan="2">
                                            <a class="btn btn-danger" href="?idComment=<?php echo $value['id'] ?>">Xóa</a>
                                        </td>

                                    </tr>
                                <?php }
                            } else {
                                ?>

                        </tbody>
                    </table>
                <?php echo '<p class="text-danger text-center">Danh sách rỗng, 
                    <a  href="../admin/createPost.php">Thêm bài viết mới</a></p>';
                            } ?>
                </div>
            </div>
        </div>

    </div>


</body>
<script src="../../public/javascript/main.js"></script>
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


</html>