<!--Start topbar header-->
<?php include '../admin/header.php' ?>
<?php

$sql1 = "SELECT * FROM user ";

$query = mysqli_query($conn, $sql1);

?>
<div class="content-wrapper">

    <div class="row mt-3">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quản lý tài khoản</h5>



                    <button type="submit" class="btn btn-light btn-round px-5"><a href="index.php?page_layout=them">
                            Thêm</a> </button>






                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">UserName</th>
                                    <th scope="col">PassWord</th>
                                    <th scope="col">LoaiUser</th>
                                    <th scope="col">Họ Và Tên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Ngay Sinh</th>
                                    <th scope="col">Sửa | Xóa</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../../models/ketnoi.php';

                                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
                                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $item_per_page;
                                $sql = "SELECT * FROM user ORDER BY `LoaiUser` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                                $totalRecords = mysqli_query($conn, "SELECT * FROM user");
                                $totalRecords = $totalRecords->num_rows;
                                $totalPages = ceil($totalRecords / $item_per_page);

                                $query = mysqli_query($conn, $sql);


                                while ($rows = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $rows['UserName']; ?></th>
                                        <td><?php echo $rows['PassWord']; ?></td>
                                        <td><?php echo $rows['LoaiUser']; ?></td>
                                        <td><?php echo $rows['Ho'] . ' ' . $rows['Ten']; ?></td>
                                        <td><?php echo $rows['SDT']; ?></td>
                                        <td><?php echo $rows['DiaChi']; ?></td>
                                        <td><?php echo $rows['NgaySinh']; ?></td>

                                        <td> <a href="SuaUser.php?UserName=<?php echo $rows['UserName']; ?>"> Sửa </a> |
                                            <a onclick="return Del('<?php echo $rows['UserName']; ?>')" href="XoaUser.php?UserName=<?php echo $rows['UserName']; ?>"> Xóa </a>
                                        </td>
                                    </tr>
                                <?php

                                } ?>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>



        <a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>" class="btn" style="color:white;background-color:grey"><?= $num ?></a>


    <?php } ?>




</div>


<script>
    function Del(UserName) {
        return confirm("Bạn có muốn xóa tài khoản " + UserName + " Không ?")
    }
</script>
<!--Start footer-->
<?php include '../admin/footer.php' ?>
<!--End footer-->