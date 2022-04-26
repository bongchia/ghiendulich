function handleDelete() {
  var href;
  var btnDelete = $(".btn-delete");
  [...btnDelete].forEach(function (el) {
    el.addEventListener("click", function (e) {
      href = e.target.href;
      e.target.href = "#";
      new swal({
        title: "Bạn chắc chắn chứ?",
        text: "Bài viết sẽ không thể khôi phục!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Quay lại",
        confirmButtonText: "Đúng vậy, tui muốn xóa nó!",
      }).then((result) => {
        if (result.isConfirmed) {
          e.target.href = href;
          window.location.href = href;
        }
      });
    });
  });
}
