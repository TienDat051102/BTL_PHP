<?php
$conn = mysqli_connect("localhost", "root","","btl");
// Kiểm tra xem tham số MaNCC có được thiết lập trong URL hay không
if(isset($_GET['MaNCC'])) {
    $MaNCC = $_GET['MaNCC'];

    // Truy vấn để lấy bản ghi cần cập nhật
    $sqlSelect = "SELECT * FROM `nhacungcap` WHERE MaNCC=$MaNCC";
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $shop_suppliersRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

    // Kiểm tra xem bản ghi với ID đã cho có tồn tại hay không
    if(empty($shop_suppliersRow)) {
        echo "ID: $MaNCC không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }

    // Cập nhật bản ghi nếu biểu mẫu được gửi đi
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu nhập từ người dùng từ biểu mẫu
        $MaNCC = $_POST['MaNCC'];
        $TenNCC = $_POST['TenNCC'];
        $DiaChi = $_POST['DiaChi'];
        $GhiChu = $_POST['GhiChu'];


        // Câu lệnh SQL để cập nhật bản ghi
        $sqlUpdate = "UPDATE nhacungcap SET MaNCC='$MaNCC', TenNCC='$TenNCC', DiaChi='$DiaChi', GhiChu='$GhiChu' WHERE MaNCC = $MaNCC";

        // Thực thi câu lệnh cập nhật
        if (mysqli_query($conn, $sqlUpdate)) {
            // Chuyển hướng đến trang danh sách sau khi cập nhật
            header('location: quanlinhacungcap.php');
        } else {
            $error = "Lỗi cập nhật bản ghi: ".mysqli_connect_error($conn);
        }
    }
}


include '../admin/header.php';
?>

<!-- Nội dung chính -->
<div class="content-wrapper">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật Nhà cung cấp</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <!-- Biểu mẫu để cập nhật nhà cung cấp -->
                            <form name="frmEdit" id="frmEdit" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mã nhà cung cấp</label>
                                    <input type="number" class="form-control" name="MaNCC" value="<?php echo isset($shop_suppliersRow['MaNCC']) ? $shop_suppliersRow['MaNCC'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên nhà cung cấp</label>
                                    <input type="text" class= "form-control" name="TenNCC" value="<?php echo isset($shop_suppliersRow['TenNCC']) ? $shop_suppliersRow['TenNCC'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for= "exampleFormControlInput1">Địa chỉ</label>
                                    <input type="text" class="form-control" name="DiaChi" value="<?php echo isset($shop_suppliersRow['DiaChi']) ? $shop_suppliersRow['DiaChi'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Ghi chú</label>
                                    <input type="text" class="form-control" name="GhiChu" value="<?php echo isset($shop_suppliersRow['GhiChu']) ? $shop_suppliersRow['GhiChu'] : ''; ?>">
                                </div>
                                <button class="btn btn-primary" name="btnSave" type="submit">Cập nhật</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../admin/footer.php';
?>
