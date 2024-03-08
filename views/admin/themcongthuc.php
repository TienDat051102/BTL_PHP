<?php include '../admin/header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
if (isset($_POST["submit"])) {
    $sql = "INSERT INTO `congthucmon`(`MaSP`, `MaNL`, `SoLuongCanDung`) VALUES ('" . $_POST['MaSP'] . "','" . $_POST['MaNL'] . "','" . $_POST['MaSP'] . "" . $_POST['SoLuong'] . "')";
    $query_insertmon = mysqli_query($conn, $sql);
    header('location: themcongthuc.php');
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
                            <label for="MaSP">Sản Phẩm</label>
                            <select name="MaSP" id="cars" class="form-control">
                                <?php $sqlloaisp = "SELECT `MaSP`,`TenSP` FROM `danhmucsp` ";
                                $queryncc = mysqli_query($conn, $sqlloaisp);
                                while ($rowsncc = mysqli_fetch_assoc($queryncc)) { ?>
                                    <option value="<?php echo  $rowsncc['MaSP'] ?>">
                                        <?php echo  $rowsncc['TenSP'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="MaSP">Nguyên Liệu</label>
                            <select name="MaNL" id="cars" class="form-control">
                                <?php $sqlloaisp = "SELECT `MaNL`, `TenNL` FROM `nguyenlieu` ";
                                $queryncc = mysqli_query($conn, $sqlloaisp);
                                while ($rowsncc = mysqli_fetch_assoc($queryncc)) { ?>
                                    <option value="<?php echo  $rowsncc['MaNL'] ?>">
                                        <?php echo  $rowsncc['TenNL'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="SoLuong">Số lượng cần dùng</label>
                            <input type="text" name="GiaBan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                        </div>
                    </form>
                    <a href="congThucMon.php" class="btn btn-light btn-round px-5" type="button">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>