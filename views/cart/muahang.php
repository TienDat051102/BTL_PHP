<?php
session_start();
include_once("../../models/ketnoi.php");
if (isset($_SESSION['cart'])) {
    $arrID = array();
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $arrID[] = $id;
    }
    $stringID = implode(',', $arrID);
    $sql = "SELECT * FROM danhmucsp WHERE MaSP IN($stringID) ORDER BY MaSP DESC";
    $result = $conn->query($sql);
}
?>





<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

    <style>
        #bankInfo {
            display: none;
        }

        #banking:checked+#bankInfo {
            display: block;
        }

        #banking:checked+#bankInfo {
            display: block;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../img/checkout.png" alt="" width="72" height="72">
            <h2>Thanh toán</h2>
            <p class="lead">Vui lòng nhập đầy đủ thông tin để chúng tôi có thể thanh toán tiền cho bạn</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $totalPriceAll = 0;
                    while ($row = $result->fetch_assoc()) {
                        $totalPrice = $row["GiaBan"] * $_SESSION["cart"][$row["MaSP"]];
                    ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $row["TenSP"]; ?></h6>
                                <small class="text-muted">Số lượng <?php echo $_SESSION["cart"][$row["MaSP"]]; ?></small>
                            </div>
                            <span class="text-muted"><?php echo $totalPrice; ?></span>
                        </li>


                    <?php
                        $totalPriceAll += $totalPrice;
                    }
                    ?>
                </ul>

                <form class="card p-2" method="post">
                    <?php
                    if (isset($_GET['discount'])) {
                        $magiamgia = $_GET['discount'];
                        $sql1 = "SELECT * FROM giamgia WHERE MaGiamGia=$magiamgia";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                            $totalPriceAll -= $totalPriceAll * $row1["GiamGia"] / 100;
                        }
                    }

                    ?>
                    <div class="input-group">
                        <input id="dis2" type="text" class="form-control" placeholder="Mã giảm giá" name="discount">
                        <!-- <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div> -->
                    </div>
                </form>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền </span>
                        <strong><?php echo $totalPriceAll; ?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form method="post" class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Họ</label>
                            <input name="ho" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Vui lòng nhập họ của bạn.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Tên</label>
                            <input name="ten" type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Vui lòng nhập tên của bạn.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Vui lòng nhập Username.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Cầu Dao" required="">
                        <div class="invalid-feedback">
                            Vui lòng nhập địa chỉ.
                        </div>
                    </div>




                    <!--<hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>-->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Lưu địa chỉ cho lần sau</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Phương thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="COD" name="paymentMethod" type="radio" class="custom-control-input" required="" value="1">
                            <label class="custom-control-label" for="COD">Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="banking" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="0">
                            <label class="custom-control-label" for="banking">Chuyển khoản ngân hàng nội địa</label>
                            <div class="row" id="bankInfo">
                                <p>STK: 1016175601 Vietcombank PHAM THIEN VU</p>
                                <p>Khách hàng lưu ý sau khi chuyển khoản chụp bill gửi cho sốp check</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="address">Ghi chú</label>
                            <input name="ghichu" type="text" class="form-control" id="text" placeholder="...">
                        </div>
                    </div>
                    <div class="input-group">
                        <input readonly style="display: none;" id="dis1" type="text" class="form-control" placeholder="Mã giảm giá" name="discount">
                    </div>
                    <!--<div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>-->
                    <hr class="mb-4">
                    <button formaction="xong.php" class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Thanh toán</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        const sourceInput = document.getElementById("dis2");
        const targetInput = document.getElementById("dis1");

        sourceInput.addEventListener("input", function() {
            targetInput.value = sourceInput.value;
        });

        const radioButton = document.getElementById("banking");
        const myDiv = document.getElementById("bankInfo");

        radioButton.addEventListener("click", function() {
            if (radioButton.checked) {
                myDiv.style.display = "block";
            } else {
                myDiv.style.display = "none";
            }
        });
        document.getElementById("banking").addEventListener("click", function() {
            var myDiv = document.getElementById("bankInfo");
            if (this.checked) {
                myDiv.style.display = "block";
            } else {
                myDiv.style.display = "none";
            }
        });
    </script>


</body>

</html>