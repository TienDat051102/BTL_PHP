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
                                $sql = "SELECT * FROM loaisp";
                                $query = mysqli_query($conn, $sql);
                                $datas = [];
                                $rowNum = 1;
                                while ($rows = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $datas[] = array(
                                        'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                        'LoaiSP' => $rows['LoaiSP'],
                                        'TenLoai' => $rows['TenLoai'],
                                    );
                                    $rowNum++;
                                } ?>

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn-create btn btn-success" href="./create_sp.php">Thêm sản phẩm</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col">STT</th>
                                    <th scope="col">Loại Sản Phẩm</th>
                                    <th scope="col">Tên loại</th>
                                    <th class="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datas as $rows) : ?>
                                <tr>
                                    <td><?php echo $rows['rowNum']; ?></td>
                                    <td><?php echo $rows['LoaiSP']; ?></td>
                                    <td><?php echo $rows['TenLoai']; ?></td>
                                    <td>
                                        <!-- Button Sửa -->
                                        <a href="edit_sp.php?LoaiSP=<?php echo $rows['LoaiSP']; ?>" id="btnUpdate" class="btn btn-primary">Sửa
                                        </a>

                                        <!-- Button Xóa -->
                                        <a href="delete_sp.php?LoaiSP=<?php echo $rows['LoaiSP']; ?>" id="btnDelete" class="btn btn-danger">Xóa
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