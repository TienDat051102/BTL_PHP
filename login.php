<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <!-- Add the Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h2>Login</h2>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required />
              </div>

              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required />
              </div>
              <div> <?php
                    session_start();
                    include_once 'models/ketnoi.php';
                    if (isset($_POST["submit"])) {
                      $username = $_POST["username"];
                      $password = $_POST["password"];
                      if (isset($username) && isset($password)) {
                        $sql = "SELECT * FROM user WHERE UserName = '$username' AND PassWord = '$password'";
                        $query = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($query);
                        if ($rows > 0) {
                          $_SESSION["username"] = $username;
                          $rows = $query->fetch_array();
                          if ($rows['LoaiUser'] == 0) {
                            header('location: views/admin');
                          } else if ($rows['LoaiUser'] == 2) {
                            header('location: controller/index.php');
                          } else if ($rows['LoaiUser'] == 1) {
                            header('location: views/manhinhoder.php');
                          }
                        } else {
                          // header('location: login.php');
                          echo '<p>Đăng nhập thất bại!</p>';
                        }
                      }
                    }
                    ?></div>
              <!-- Use the "w-100" class to make the buttons span the full width -->
              <button name="submit" type="submit" class="btn btn-primary w-100">
                Login
              </button>

              <!-- Add the "Sign Up" button next to the "Login" button -->
              <a href="signup.php" class="btn btn-secondary w-100 mt-2">Sign Up</a>
            </form>
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