<?php include '../admin/header.php' ?>
<?php 
    include_once '../../models/ketnoi.php';
?>
<?php 
$sql_congthucmon = "SELECT * FROM congthucmon";
$query_congthucmon = mysqli_query($conn, $sql_congthucmon);

//$sql_loaisp = "SELECT * FROM loaisp";
//$query_loaisp = mysqli_query($conn,$sql_loaisp);

$MaNL = $_GET['MaNL'];

$sql_up = "SELECT * FROM nguyenlieu where MaNL=$MaNL";
$query_up = mysqli_query($conn,$sql_up);
$row_up = mysqli_fetch_assoc($query_up);


if(isset($_POST['submit'])){
    $MaNL= $_POST['MaNL'];
    $TenNL= $_POST['TenNL'];
    $DonGiaNhap= $_POST['DonGiaNhap'];
    $SoLuongCon= $_POST['SoLuongCon'];
    $sql = "UPDATE nguyenlieu SET TenNL = '$TenNL', DonGiaNhap = '$DonGiaNhap', SoLuongCon = '$SoLuongCon' WHERE MaNL = $MaNL";
    $query = mysqli_query($conn, $sql);

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
                            <input type="text" name="MaNL" value="<?php echo $row_up['MaNL']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="TenNL">Tên Nguyên Liệu</label>
                            <input type="text" name="TenNL" value="<?php echo $row_up['TenNL']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="DonGiaNhap">Đơn giá nhập</label>
                            <input type="text" name="DonGiaNhap" value="<?php echo $row_up['DonGiaNhap']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="SoLuongCon">Số lượng còn</label>
                            <input type="text" name="SoLuongCon" value="<?php echo $row_up['SoLuongCon']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  