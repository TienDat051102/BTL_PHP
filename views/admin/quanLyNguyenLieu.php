<!-- Start topbar header -->
<?php include '../admin/header.php'; ?>

<?php
$dem = 0;
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
$sql = "SELECT * FROM nguyenlieu ORDER BY MaNL ASC LIMIT $start, $per_page";
$query = mysqli_query($conn, $sql);

// Tạo biến để theo dõi số thứ tự
$index = ($page - 1) * $per_page + 1;
?>

<div class="content-wrapper">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nguyên liệu</h5>
                    <a href="themnl.php" class="btn btn-light btn-round px-5" type="submit">Thêm</a>
                    <a href="nhapnhieunguyenlieu.php" class="btn btn-light btn-round px-5" name="btnsubmit"
                        type="submit">Nhập
                        nguyên
                        liệu(<?php if (isset($_SESSION['nl'])) {
                                    echo count($_SESSION['nl']);
                                } else {
                                    echo '0';
                                } ?>)</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Nguyên Liệu</th>
                                    <th scope="col">Tên Nguyên Liệu</th>
                                    <th scope="col">Đơn giá nhập</th>
                                    <th scope="col">Số lượng còn</th>
                                    <th scope="col">Sửa/Xóa</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="nhapnhieunguyenlieu.php" method="">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <th scope="col"><?php echo $index++; ?></th>
                                        <th scope="col"><?php echo $row['TenNL']; ?></th>
                                        <th scope="col"><?php echo $row['DonGiaNhap']; ?></th>
                                        <th scope="col"><?php echo $row['SoLuongCon']; ?></th>
                                        <th scope="col">
                                            <a href="suanl.php?MaNL=<?php echo $row['MaNL']; ?>" type="button">Sửa</a>
                                            <a href="xoanl.php?MaNL=<?php echo $row['MaNL']; ?>"> / Xóa</a>
                                            <?php if ($row['SoLuongCon'] < 10) {
                                                    echo '<a style="color: red;" href = "nhapnguyenlieu.php?id=' .  $row['MaNL'] . '"> / Nhập thêm</a>';
                                                } ?>
                                        </th>
                                        <th scope="col"><a href="themnguyenlieu.php?MaNL=<?php echo $row['MaNL']; ?>"
                                                type="submit" value="">Nhập</a>
                                        </th>

                                    </tr>
                                    <?php } ?>

                                </form>
                            </tbody>
                        </table>
                    </div>
                    <!-- Tạo các liên kết phân trang -->
                    <?php
                    $total_records_query = "SELECT COUNT(*) AS total FROM nguyenlieu";
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