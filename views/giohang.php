<?php session_start();
if (isset($_POST['soluong']) && (isset($_GET['id']))) {
    foreach ($_SESSION['giohang'] as $key => $value) {
        if ($_GET['id'] == $value[0] && ($_POST['soluong'] != $value[2])) {
            $_SESSION['giohang'][$key][2] = $_POST['soluong'];
            if ((int)$_POST['soluong'] <= 0) {
                unset($_SESSION['giohang'][$key]);
            }
        }
    }
}
if (isset($_GET["page_giohang"])) {
    switch ($_GET["page_giohang"]) {
        case 'xoatoanbogiohang':
            unset($_SESSION['giohang']);
            header('location: manhinhoder.php');
            break;
        case 'quaylai':
            header('location: manhinhoder.php');
            break;
        case 'thanhtoan':
            header('location: thanhtoan.php');
        default:
            header('loacation: ./gioahang.php');
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart</title>
    <!-- Bao gồm thư viện Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <h2 class="text-center">Giỏ Hàng</h2>
        <?php
        if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
            $tongtien = 0;
        ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm: </th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach ($_SESSION['giohang'] as $key => $value) {
                                    $tt = $value[2] * $value[3];
                                    $tongtien += $tt; ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $value[1] ?></td>
                                            <td><?php echo $value[3] ?></td>
                                            <td>
                                                <form action="giohang.php?id=<?php echo $value[0] ?>" method="post"><input type="number" name="soluong" class="form-control" placeholder="<?php echo $value[2] ?>" /></form>
                                            </td>
                                            <td><?php echo $tt ?></td>
                                            <td><a href="xoahang.php?masp=<?php echo $value[0] ?>" class="btn btn-danger">Xóa</a></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                                <thead>
                                    <tr>
                                        <th>Tổng tiền: </th>
                                        <th></th>
                                        <th><?php echo $tongtien ?></th>
                                        <th><a href=" giohang.php?page_giohang=xoatoanbogiohang" class="btn btn-danger">Xóa
                                                toàn bộ</a>
                                        </th>
                                        <th><a href=" giohang.php?page_giohang=quaylai" class="btn btn-danger">Quay
                                                lại màn hình order</a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>


                    </div>
                </div>
            <?php } else {
            echo '       <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td> Hiện giỏ hàng đang trống</td> 
                      <td> </td> 
                      <td> </td> 
                      <td><a href="giohang.php?page_giohang=quaylai" class="btn btn-danger">Quay
                                                lại màn hình order</a></td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>';
        } ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="hoadon.php" method="post">
                            <label for="cars">Lựa chọn giảm giá:</label>
                            <select id="cars" name="giamgia">
                                <?php include_once '../models/ketnoi.php';
                                $sql = "SELECT * FROM `giamgia`";
                                $query = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_array($query)) {  ?>
                                    <option value="<?php echo $rows['MaGiamGia'] ?>"><?php echo $rows['GiamGia'] . ' %' ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <br>
                            <label for="cars">Chọn Bàn:</label>
                            <select id="cars" name="maban">
                                <?php
                                $sql1 = "SELECT * FROM `ban`";
                                $query1 = mysqli_query($conn, $sql1);
                                while ($rows = mysqli_fetch_array($query1)) {  ?>
                                    <option value="<?php echo $rows['MaBan'] ?>"><?php echo 'Bàn số ' . $rows['MaBan']  ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <br>
                            <label for="cars">Phương thức thanh toán:</label>
                            <select id="cars" name="pttt">
                                <option value="00">Tiền Mặt</option>
                                <option value="01">Chuyển Khoản</option>
                            </select>
                            <hr>
                            <input type="submit" value="In hóa đơn" class="btn btn-primary" class="btn">
                        </form>
                    </div>
                </div>
            </div>
            </div>


    </div>

    <!-- Bao gồm thư viện Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>