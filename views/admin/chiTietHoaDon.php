<?php $mahd = $_GET['MaHoaDon']; ?>
<div class="card-body">
    <h5 class="card-title">Thông tin chi tiết của hóa đơn số <?php echo $mahd ?></h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../../models/ketnoi.php';
                $sql = "SELECT * FROM thongtinchitiethoadonban where MaHoaDon =" . $mahd . "";
                $query = mysqli_query($conn, $sql);
                $tinhtien = 0;
                while ($rows = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $rows['TenSP'] ?></th>
                        <td>
                            <?PHP echo $rows['SoLuong'] ?>
                        </td>
                        <td>
                            <?PHP $tinhtien += $rows['TongTienHD'];
                            echo $rows['TongTienHD'] ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <th>Tổng tiền hóa đơn :<?php echo $tinhtien  ?></th>
                    <td>Giảm giá :
                        <?php $giam = mysqli_fetch_array(mysqli_query($conn, "SELECT giamgia.GiamGia from hoadonban INNER JOIN giamgia on giamgia.MaGiamGia = hoadonban.GiamGia WHERE hoadonban.MaHoaDon = " . $mahd));
                        echo $giam['GiamGia'] ?>
                        %
                    </td>
                    <td>Số tiền thu:
                        <?php $thanhtien = $tinhtien - $tinhtien * $giam['GiamGia'] / 100;
                        echo $thanhtien ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>