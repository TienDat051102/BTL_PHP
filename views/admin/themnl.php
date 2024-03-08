<?php include '../admin/header.php' ?>
<?php 
    include_once '../../models/ketnoi.php';
?>
<?php 
$sql_congthucmon = "SELECT * FROM congthucmon";
$query_congthucmon = mysqli_query($conn, $sql_congthucmon);

if(isset($_POST["submit"])){
    $MaNL= $_POST["MaNL"];
    $TenNL= $_POST["TenNL"];
    $DonGiaNhap= $_POST["DonGiaNhap"];
    $SoLuongCon= $_POST["SoLuongCon"];
    $sql = "INSERT INTO nguyenlieu (MaNL, TenNL, DonGiaNhap, SoLuongCon) 
        VALUES ('$MaNL', '$TenNL', '$DonGiaNhap', '$SoLuongCon')";
    $query= mysqli_query($conn, $sql);
    header('location: quanLyNguyenLieu.php');
    }

?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="MaNL">Mã Nguyên Liệu</label>
                            <input type="text" name="MaNL" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="TenNL">Tên Nguyên Liệu</label>
                            <input type="text" name="TenNL" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="DonGiaNhap">Đơn giá nhập</label>
                            <input type="text" name="DonGiaNhap" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="SoLuongCon">Số lượng còn</label>
                            <input type="text" name="SoLuongCon" class="form-control">
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