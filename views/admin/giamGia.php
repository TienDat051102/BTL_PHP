<!--Start topbar header-->
<?php include '../admin/header.php'
?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mã giảm giá</h5><button class="btn" style="background-color: aliceblue;margin-bottom:10px;" type="button">Thêm</button>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Mã giảm giá</th>
                                    <th scope="col">Sửa/Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once '../../models/ketnoi.php';
                                $sql = "SELECT * FROM giamgia Order by GiamGia ASC";
                                $query = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($query);
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                      echo 
                                        "<tr>
                                        <th scope=".'row'.">".$row["GiamGia"]."</th>
                                        <td>".$row["MaGiamGia"]."</td>
                                        </tr>";
                                    }
                                  }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../admin/footer.php' ?>