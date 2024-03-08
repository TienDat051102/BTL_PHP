<?php
include("../BTLWEB/models/ketnoi.php");
$thongbao = '';
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["retypepassword"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $retypepassword = $_POST["retypepassword"];
    if ($password == $retypepassword) {
        $sql = "SELECT * FROM `user` WHERE UserName = '" . $username . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $thongbao = 'Đã có tài khoản sử dụng username này !';
        }
        $sqlinset = "INSERT INTO `user`(`UserName`, `PassWord`, `LoaiUser`) VALUES ('" . $username . "','" . $password . "',b'10')";
        $query = mysqli_query($conn, $sqlinset);
        $thongbao = "Đăng ký thành công vui lòng đăng nhập";
    } else {
        $thongbao = '2 Password không giống nhau vui lòng nhập lại!';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign UP</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Sign Up</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required />
                            </div>
                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Retype Password:</label>
                                <input type="password" class="form-control" id="password" name="retypepassword" required />
                            </div>
                            <div>
                                <p style="color: red;"><?php echo $thongbao ?></p>
                            </div>
                            <!-- Use the "w-100" class to make the buttons span the full width -->
                            <button name="submit" type="submit" class="btn btn-primary w-100">
                                SignUp
                            </button>

                            <!-- Add the "Sign Up" button next to the "Login" button -->
                        </form>
                        <a href="login.php" class="btn btn-secondary w-100 mt-2">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add the Bootstrap JavaScript and jQuery (optional but required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php ?>