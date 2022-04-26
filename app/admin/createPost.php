<?php
require('../config/auth.php');
require "../../bootstrap.php";
require '../config/connect.php';
require "../config/excute.php";
$_SERVER['admin'] = 'http://localhost/review-travel/app/admin/index.php';
if (isset($_POST['title'])) {

    createPost($_POST['title'], $_POST['description'], $_POST['id_place']);
    setcookie("alert", "Tạo bài viết thành công", time() + 1, "/");
    setcookie("status", "success", time() + 1, "/");
    header('Location: ' . $_SERVER['admin']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết mới</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../core/ckeditor/ckeditor.js"></script>
    <script src="../core/ckfinder/ckfinder.js"></script>
</head>

<body>
    <div class="container-fuild">
        <?php require "../../app/patials/navBar.php" ?>
    </div>
    <section class="post main-bg">
        <div class="container">
            <h1> Thêm bài viết mới</h1>
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <textarea name="description" id="editor1"></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Place</label>
                        <select id="id_place" class="form-control" name="id_place">
                            <option selected disabled>Select Place</option>
                            <?php
                            $sql = "SELECT * FROM `place`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc())
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            ?>
                        </select>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="title">Tiêu đề bài viết</label>
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề bài viết">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-create" disabled>Đăng bài</button>
                <a href="../admin/" class="btn btn-danger">Thoát</a>
            </form>
        </div>
    </section>
    <script src="../../public/javascript/main.js"></script>
    <script>
        var editor = CKEDITOR.replace('editor1');
        CKEDITOR.config.height = 500 + 'px';
        CKFinder.setupCKEditor(editor);

        var valueEditor, valueTitle, valuePlace;
        editor.on('key', function() {
            valueEditor = editor.getData();
            // kiem tra 
            handleSumit(valueEditor, valueTitle, valuePlace);

        })
        $('input[name="title"]').keyup(function(e) {
            valueTitle = e.target.value;
            // kiem tra 
            handleSumit(valueEditor, valueTitle, valuePlace);

        })
        $('select[name="id_place"]').change(function(e) {
            valuePlace = e.target.value;
            // kiem tra 
            handleSumit(valueEditor, valueTitle, valuePlace);
        })

        function handleSumit(...rest) {
            const check = rest.every(item => {
                return item != undefined;
            })
            if (check) {
                $('.btn-create').removeAttr("disabled")
            } else {
                $('.btn-create').attr('disabled');
            }
        }
    </script>
</body>

</html>