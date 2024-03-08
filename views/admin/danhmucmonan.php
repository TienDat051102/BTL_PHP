<!-- Start topbar header -->
<?php include '../admin/header.php'; ?>

<?php
// Định nghĩa số mục hiển thị trên mỗi trang
$per_page = 10;

// Lấy trang hiện tại từ tham số truy vấn
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Tính chỉ số bắt đầu của bản ghi cho trang hiện tại
$start = ($page - 1) * $per_page;

// Truy vấn CSDL với LIMIT để lấy bản ghi cho trang hiện tại
$sql = "SELECT * FROM danhmucsp ORDER BY MaSP ASC LIMIT $start, $per_page";
$query = mysqli_query($conn, $sql);

// Tạo biến để theo dõi số thứ tự
$index = ($page - 1) * $per_page + 1;
?>

<div class="content-wrapper">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class "card-title">Danh sách món ăn</h5>
                    <a href="themdm.php" class="btn" style="background-color: aliceblue; margin-bottom: 10px;" type="button">Thêm</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Món Ăn</th>
                                    <th scope="col">Mã Loại</th>
                                    <th scope="col">Tên Món</th>
                                    <th scope="col">Giá Bán</th>
                                    <th scope="col">Giới Thiệu Sản Phẩm</th>
                                    <th scope="col">Sửa/Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <th scope="col"><?php echo $index++; ?></th>
                                        <th scope="col"><?php echo $row['MaLoai']; ?></th>
                                        <th scope="col"><?php echo $row['TenSP']; ?></th>
                                        <th scope="col"><?php echo $row['GiaBan']; ?></th>
                                        <th scope="col"><?php echo $row['GioiThieuSP']; ?></th>
                                        <th scope="col">
                                            <a href="suadm.php?MaSP=<?php echo $row['MaSP']; ?>" type="button">Sửa</a>
                                            <a href="xoadm.php?MaSP=<?php echo $row['MaSP']; ?>"> / Xóa</a>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Tạo các liên kết phân trang -->
                    <?php
                    $total_records_query = "SELECT COUNT(*) AS total FROM danhmucsp";
                    $total_records_result = mysqli_query($conn, $total_records_query);
                    $total_records = mysqli_fetch_assoc($total_records_result)['total'];
                    $total_pages = ceil($total_records / $per_page);
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='?page=$i' class='btn' style='color:white;'>$i</a> ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../admin/footer.php'; ?>