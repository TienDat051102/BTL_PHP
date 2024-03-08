<?php 
// include_once '../../models/ketnoi.php'
 $conn = mysqli_connect("localhost", "root","","btl");
if(isset($_POST["btnsubmit"])){
    //Lấy giá trị từ form
    $code = $_POST["LoaiSP"];
    $name = $_POST["TenLoai"];

    $sql = "INSERT INTO loaisp VALUES ('$code','$name')";

    if(mysqli_query($conn, $sql))
    {
        header('location: loaisanpham.php');
    }
    else{
        $result = "ERROR Create".mysqli_connect_error($conn);
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
                                <label for="exampleFormControlInput1">Loại sản phẩm</label>
                                <input type="number" class="form-control" name="LoaiSP">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên Loại</label>
                                <input type="text" class="form-control" name="TenLoai">
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
