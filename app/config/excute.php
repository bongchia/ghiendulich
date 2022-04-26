<?php
// Tạo tài khoản
function createUser($email, $password)
{
    require '../config/connect.php';
    $sql = "INSERT INTO `users`(`email`, `password`) VALUES ('$email','$password')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
// Lấy tất cả user
function getAllUser()
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    // close
    mysqli_close($conn);
    return $data;
}
// Lấy một user
function getUserById($id)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT * FROM users Where id = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    // close
    mysqli_close($conn);

    return $data;
}
// Xử lí đăng nhập 0 admin 1 user
function findUser($email, $password)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT `email`,`id_roles` FROM `users` Where `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    mysqli_close($conn);

    return $data;
}
// Get user email
function getUserByEmail($email)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT email FROM `users` Where `email` = '$email'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    mysqli_close($conn);

    return $data;
}
// lấy id user với DK email
function getIdUsser($email)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT id FROM `users` Where `email` = '$email'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    mysqli_close($conn);

    return $data;
}
// xử lí tạo bài viết mới
function createPost($title, $description, $id_place)
{
    require '../config/connect.php';
    $sql = "INSERT INTO `posts`(`title`, `description`, `id_place`) VALUES 
    ('$title','$description','$id_place')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}
//Xử lí lấy danh sách bài viết
function getAllPost($message = "Data is empty")
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);
    if ($data == null || count($data) < 0) {
        return $message;
    }
    return $data;
}
//Xử lí lấy 1 bài viết với id
function getPostById($id)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    mysqli_close($conn);
    return $data;
}
//Xử lí lấy danh sách bài viết với DK (id địa điểm)
function getPostsByIdPlace($id)
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM posts WHERE id_place = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);

    return $data;
}
//Xử lí sửa bài viết
function editPost($id, $title, $description, $id_place)
{
    require '../config/connect.php';
    $sql = "UPDATE `posts` SET `title`='$title',`description`='$description',`id_place`='$id_place' WHERE id = $id;";
    $conn->query($sql);
    mysqli_close($conn);
}
//Xử lí xóa bài viết
function deletePostById($id)
{
    require '../config/connect.php';
    $sql = "DELETE FROM `posts` WHERE id = $id";
    $result = $conn->query($sql);
    mysqli_close($conn);
    return $result;
}
// Xử lí với table place
function getPlaceById($id)
{
    require '../config/connect.php';
    $data;
    $sql = "SELECT * FROM place WHERE id = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    mysqli_close($conn);
    return $data;
}
// lấy tất cả bản ghi place
function getAllPlace()
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM place";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);

    return $data;
}
// Tìm địa điểm
function findPostsByName($name)
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM posts po WHERE po.id_place = (SELECT id FROM place WHERE name like '%$name%')";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);
    return $data;
}
// xử lí post comments
function createComment($id_userd, $id_posted, $content)
{
    require '../config/connect.php';
    $sql = "INSERT INTO `comments`(`content`, `id_userd`, `id_posted`) 
    VALUES (' $content','$id_userd','$id_posted')";
    $conn->query($sql);

    mysqli_close($conn);
}
// Lấy tất các comments
function getAllCommentBy($id)
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM comments where `id_posted` = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);

    return $data;
}
function getAllComment()
{
    require '../config/connect.php';
    $data = array();
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
        $data[] = $row;
    mysqli_close($conn);

    return $data;
}
//
function deleteCommentById($id)
{
    require '../config/connect.php';
    $sql = "DELETE FROM `comments` WHERE id = $id";
    $result = $conn->query($sql);
    mysqli_close($conn);
    return $result;
}
//
function randomText($arrText = [
    'Tháng 1 nên đi du lịch ở đâu? Bắt đầu một năm mới thật nhiều dự định. Sẽ thật phí hoài nếu chưa bắt đầu chuyến hành 
    trình du lịch Việt Nam. Điểm đến được gợi ý trong thời điểm này chính là thành phố Đà Lạt mộng mơ. Tại sao tháng 1 
    nên ghé thăm Đà Lạt? Đó là bởi đây chính là thời điểm duy nhất trong năm để ngắm mai anh đào nhuộm hồng thành phố mờ sương.',
    'Mộc Châu chính là một trong những lựa chọn hoàn hảo nhất khi du lịch Việt Nam vào tháng 2, đặc biệt là cuối tháng 2 – đầu tháng 3, khi Mường Mọk bạt ngàn hoa mơ, hoa mận, tam giác mạch,… bung nở, nhuộm trắng những cung đường dốc sườn dốc núi quanh co.',
    'Bước sang tháng 3 – tháng cuối cùng của mùa xuân, bạn có đang tự hỏi: “Tháng 3 nên đi du lịch ở đâu?”. Điểm đến tốt nhất  theo gợi ý của chúng tôi chính là vùng đất Ninh Bình. Hãy cùng thưởng ngoạn non xanh nước biếc nơi cảnh sắc thiên nhiên quyện hoà với kỳ quan kiến trúc của con người.',
    'Tháng 4 nên đi du lịch ở đâu? Khi xuân đã nhẹ tàn còn hạ chưa kịp đến, đây là thời khắc đặc biệt để bạn đặt chân khám phá cố đô Huế. Nhắc đến Huế là nhắc đến những nét đẹp cổ xưa, dịu dàng, đằm thắm mà cũng không kém phần duyên dáng, e lệ. Thành phố bên bờ sông Hương níu giữ người ta sống chậm để khám phá vẻ đẹp của những di tích, lăng tẩm mang đậm trên mình dấu mốc thời gian',
    'Vào tháng 6, Cô Tô, Đà Nẵng, Ninh Bình, Bắc Giang, Mù Cang Chải hay Thái Nguyên… là gợi ý lý tưởng cho băn khoăn: “Tháng 6 nên đi du lịch ở đâu?”. Để giải đáp cho thắc mắc này, Pacific Cross Việt Nam sẽ giới thiệu đến bạn một địa điểm tuy quen thuộc nhưng không hề nhàm chán.',
])
{
    return $arrText[rand(0, count($arrText) - 1)];
}
