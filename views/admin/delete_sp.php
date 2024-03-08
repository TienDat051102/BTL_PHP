<?php

$conn = mysqli_connect("localhost", "root", "", "btl");

if(isset($_GET['LoaiSP'])) {
    $LoaiSP = $_GET['LoaiSP'];

    // Câu lệnh SQL để xóa bản ghi
    $sql = "DELETE FROM loaisp WHERE LoaiSP = $LoaiSP";

    if (mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách
        header('location: loaisanpham.php');
    } 
    else {
        echo "Lỗi xóa bản ghi: " . mysqli_error($conn);
    }

    // Đóng kết nối sau khi thực hiện xong
    mysqli_close($conn);
}
