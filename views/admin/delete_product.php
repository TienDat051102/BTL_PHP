<?php

$conn = mysqli_connect("localhost", "root", "", "btl");

if(isset($_GET['MaNCC'])) {
    $MaNCC = $_GET['MaNCC'];

    // Câu lệnh SQL để xóa bản ghi
    $sql = "DELETE FROM nhacungcap WHERE MaNCC = $MaNCC";

    if (mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách
        header('location: quanlinhacungcap.php');
    } 
    else {
        echo "Lỗi xóa bản ghi: " . mysqli_error($conn);
    }

    // Đóng kết nối sau khi thực hiện xong
    mysqli_close($conn);
}
