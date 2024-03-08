<?php
// include_once '../../models/ketnoi.php'
$conn = mysqli_connect("localhost", "root", "", "btl");
if (isset($_POST["btnsubmit"])) {
    //Lấy giá trị từ form
    $code = $_POST["MaNCC"];
    $name = $_POST["TenNCC"];
    $address = $_POST["DiaChi"];
    $note = $_POST["GhiChu"];

    $sql = "INSERT INTO nhacungcap VALUES ('$code','$name','$address','$note')";

    if (mysqli_query($conn, $sql)) {
        header('location: quanlinhacungcap.php');
    } else {
        $result = "ERROR Create" . mysqli_connect_error($conn);
    }
}
?>
<?php ?>
<!--Start topbar header-->
<?php include '../admin/header.php' ?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thêm mới sản phẩm</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <!-- Form Thêm sản phẩm -->

                            <form method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mã nhà cung cấp</label>
                                    <input type="number" class="form-control" name="MaNCC">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" name="TenNCC">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Địa Chỉ</label>
                                    <input type="text" class="form-control" name="DiaChi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Ghi chú</label>
                                    <input type="text" class="form-control" name="GhiChu">
                                </div>
                                <button class="btn btn-primary" name="btnsubmit" type="submit">Thêm</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Start footer-->
<?php include '../admin/footer.php' ?>
<!--End footer-->


<!-- Footer -->