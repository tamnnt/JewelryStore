<?php

    session_start();
    include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <form class="box" action="" method="post">
    <h1>Đăng nhập</h1>
    <input type="text" name="admin_email" placeholder="Tài khoản" required>
    <input type="password" name="admin_pass" placeholder="Mật khẩu" required>
    <input type="submit" name="admin_login" value="Đăng nhập">
    </form>

    <script src="js/main.js"></script>
</body>
</html>

<?php

    if (isset($_POST['admin_login'])) {

        $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);

        $admin_pass = mysqli_real_escape_string($conn, $_POST['admin_pass']);

        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_password='$admin_pass'";

        $run_admin = mysqli_query($conn, $get_admin);

        $count = mysqli_num_rows($run_admin);

        if ($count==1) {

            $_SESSION['admin_email']=$admin_email;

            echo "<script>window.open('index.php?dashboard','_self')</script>";

        } else {

            echo "<script>alert('Email hoặc Mật Khẩu Chưa Đúng')</script>";

        }

    }

?>