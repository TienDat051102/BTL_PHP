<?php
include_once '../models/ketnoi.php';
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case 'manhinhorder':
            include_once './manhinhoder.php';
            break;
        case 'giohang':
            header("location: ./giohang.php");
            break;
        default:
            include_once './man.php';
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt hàng</title>
    <!-- Đối với Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* CSS để giảm chiều rộng của thanh option */
        #sortSelect {
            width: 120px;
        }

        /* Tùy chỉnh màu cho các nút và loại bỏ viền */
        .custom-button {
            background-color: #bee3db;
            /* Màu xanh nhạt */
            color: #000;
            /* Màu chữ */
            border: none;
            /* Loại bỏ viền */
        }

        .custom-button:hover {
            background-color: #8db7af;
            /* Màu xanh nhạt khi hover */
        }
    </style>
    <link href="../views/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="../views/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="../views/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="../views/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="../views/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Đặt hàng</h1>
            <a href="manhinhoder.php?page_layout=giohang">
                <i style="margin-right: 10px" class="fas">&#xf07a;</i>
            </a>
            <!-- Biểu tượng giỏ hàng -->
        </div>


    </div>
    <div class="row mt-3">
        <!--SẮP XẾP THEO:-->
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
            <div class="row mt-3">
                <div class="col-md-12">

                    <?php if (isset($_GET['MaSP'])) {
                        $sql = "SELECT * FROM danhmucsp where MaSP = " . $_GET['MaSP'] . "";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($query);

                    ?>
                        <form action="manhinhoder.php" method="POST">
                            <label for="productName">Tên sản phẩm:</label>
                            <input type="text" class="col-md-1" name="timkiemtheoten" placeholder="search" />
                        </form>
                        <form class="form-inline" method='post' action="./themhang.php?idsp=<?php echo $row['MaSP'] ?>">


                            <label for="productName">Tên sản phẩm:</label>
                            <input type="text" class="col-md-2" id="TenSP" name="TenSP" placeholder="<?php echo $row['TenSP'] ?>" value="<?php echo $row['TenSP'] ?> " readonly />

                            <label for="total">Giá Bán:</label>
                            <input type="text" class="col-md-2" id="GiaBan" name="GiaBan" placeholder="<?php echo $row['GiaBan'] ?>" value="<?php echo $row['GiaBan'] ?>" readonly />
                            <label for="quantity">Số lượng:</label>
                            <input type="number" name="SoLuong" class="col-md-1" id="quantity" />
                            <input type="submit" class="btn custom-button" style="background-color: #000; color: white; margin-left: 10px">
                        <?php } else {
                        echo '           <form action="manhinhoder.php" method="POST">
                 <label for="productName">Tên sản phẩm:</label>
                        <input type="text" class="col-md-1" name="timkiemtheoten" placeholder="search" />
                    </form>
        
                    <label for="productName">Tên sản phẩm:</label>
                    <input type="text" class="col-md-2" id="productName" placeholder="" />
                    <label for="total">Giá Bán:</label>
                    <input type="text" class="col-md-2" id="total" placeholder="" />
                    <label for="quantity">Số lượng:</label>
                    <input type="text" class="col-md-1" id="quantity" placeholder="" />

                    

                    <button class="btn custom-button" style="
                    background-color: #000;
                    color: white;
                    margin-left: 10px;
                  " id="addItem">
                        Thêm
                    </button>                  ';
                    } ?>
                        </form>

                </div>
            </div>
            <!--PHẦN ẢNH-->
            <div class="row mt-3">
                <div class="row">
                    <?php
                    if (isset($_POST['timkiemtheoten'])) {
                        $timkiem =  $_POST['timkiemtheoten'];
                    } else {
                        $timkiem = '';
                    }
                    $sql1 = "SELECT * FROM `danhmucsp` WHERE danhmucsp.TenSP LIKE '%" . $timkiem . "%' Order by MaSP ASC";
                    $query1 = mysqli_query($conn, $sql1);
                    while ($row1 = mysqli_fetch_array($query1)) {
                    ?>

                        <div class="col-md-3" style="text-align: center; margin-top: 20px">
                            <div>
                                <a href="manhinhoder.php?page_layout=manhinhorder&MaSP=<?php echo $row1['MaSP'] ?>">
                                    <img src="../views/img/<?php echo $row1['Anh']; ?>" alt="Image 1" width="320" height="200" />
                                </a>
                            </div>
                            <label for=""><?php echo $row1['TenSP'] ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Đối với Bootstrap JS và Popper.js (để có dropdown và các chức năng khác) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>