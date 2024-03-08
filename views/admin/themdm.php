<?php include '../admin/header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
$sql_congthucmon = "SELECT * FROM congthucmon";
$query_congthucmon = mysqli_query($conn, $sql_congthucmon);
$loi = '';
if (isset($_POST["submit"]) && $_FILES['fileanh']['name'] != '') {
    $MaSP = $_POST["MaSP"];
    $MaLoai = $_POST["MaLoai"];
    $TenSP = $_POST["TenSP"];
    $GiaBan = $_POST["GiaBan"];
    $GioiThieuSP = $_POST["GioiThieuSP"];
    $file = $_FILES['fileanh']['name'];
    $sql = "INSERT INTO danhmucsp (MaSP, MaLoai, TenSP, GiaBan, GioiThieuSP,Anh) 
        VALUES ('$MaSP', '$MaLoai', '$TenSP', '$GiaBan', '$GioiThieuSP','$file')";
    $query_insertmon = mysqli_query($conn, $sql);
    header('location: danhmucmonan.php');
} else {
}
?>
<div class="content-wrapper">

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="MaSP">Mã Sản Phẩm</label>
                            <input type="text" name="MaSP" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="MaSP">Loại Sản Phẩm</label>
                            <select name="MaLoai" id="cars" class="form-control">
                                <?php $sqlloaisp = "SELECT * FROM `loaisp` ";
                                $queryncc = mysqli_query($conn, $sqlloaisp);
                                while ($rowsncc = mysqli_fetch_assoc($queryncc)) { ?>
                                    <option value="<?php echo  $rowsncc['LoaiSP'] ?>">
                                        <?php echo  $rowsncc['TenLoai'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="TenSP">Tên Món</label>
                            <input type="text" name="TenSP" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="GiaBan">Giá Bán</label>
                            <input type="number" name="GiaBan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="GioiThieuSP">Giới Thiệu Sản Phẩm</label>
                            <input type="text" name="GioiThieuSP" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="GioiThieuSP">File Ảnh</label>
                            <input type="file" name="fileanh" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>