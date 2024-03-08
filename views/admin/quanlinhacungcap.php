<!--Start topbar header-->
<?php include '../admin/header.php' ?>
<style>
    .btn-create{
        margin-bottom: 10px;
    }
</style>

<div class="content-wrapper">
<?php
                                include_once '../../models/ketnoi.php';
                                $sql = "SELECT * FROM nhacungcap";
                                $query = mysqli_query($conn, $sql);
                                $data = [];
                                $rowNum = 1;
                                while ($rows = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $data[] = array(
                                        'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                        'MaNCC' => $rows['MaNCC'],
                                        'TenNCC' => $rows['TenNCC'],
                                        'DiaChi' => $rows['DiaChi'],
                                        'GhiChu' => $rows['GhiChu'],
                                    );
                                    $rowNum++;
                                } ?>
    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn-create btn btn-success" href="./product_create.php">Thêm sản phẩm</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            
                            <thead>
                                <tr>
                                    <th class="col">STT</th>
                                    <th scope="col">Mã nhà cung cấp</th>
                                    <th scope="col">Tên nhà cung cấp</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $rows) : ?>
                                <tr>
                                    <td><?php echo $rows['rowNum']; ?></td>
                                    <td><?php echo $rows['MaNCC']; ?></td>
                                    <td><?php echo $rows['TenNCC']; ?></td>
                                    <td><?php echo $rows['DiaChi']; ?></td>
                                    <td><?php echo $rows['GhiChu']; ?></td>
                                    <td>
                                        <!-- Button Sửa -->
                                        <a href="edit.php?MaNCC=<?php echo $rows['MaNCC']; ?>" id="btnUpdate" class="btn btn-primary">Sửa
                                        </a>

                                        <!-- Button Xóa -->
                                        <a href="delete_product.php?MaNCC=<?php echo $rows['MaNCC']; ?>" id="btnDelete" class="btn btn-danger">Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
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