<?php

    session_set_cookie_params('86400');
    session_start();
    include("../includes/db.php");
    include("../functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--css-->
    <link rel="stylesheet" href="../css/login.css">

    <!-- icon and title -->
    <link rel="shortcut icon" href="images/favicon.ico" />

</head>
<body>
<!--Navigation-->
    
    <div class="menu-mobile">

        <div class="menu-items">
            <a href="../index.php" class="menu-link">Trang chủ</a>
            <a href="../shop.php" class="menu-link">Cửa hàng</a>
            <a href="../register.php" class="menu-link">Tài khoản</a>
            <a href="../cart.php" class="menu-link">Giỏ hàng</a>
            <a href="#3" class="menu-link">Liên hệ</a>
        </div>
        <div class="menu-icon close">
            <span></span>
        </div>

    </div>

    </div>
        
    <nav>

        <a href="../index.php" class="mainLogo"> <img src="assets/logo .png" alt=""></a>
        <div class="menu">
            <div class="menulinks">
                <a href="../index.php" class="menuLink">Trang chủ</a>
                <a href="../shop.php" class="menuLink">Cửa hàng</a>
                <a href="my_account.php?my_orders" class="menuLink">Tài khoản</a>
                <a href="../cart.php" class="menuLink">Giỏ hàng</a>
                <a href="#" class="menuLink">Liên hệ</a>
            </div>
        </div>
        <div class="iconWrapper">

            <!-- Form search -->
            <form method="get" action="../result.php">
                <div class="mainNav__input">
                    <input type="search" name="user_query" placeholder="Tìm kiếm ...">
                    <button class="mainNav__btnSearch" type="submit"> <img src="../assets/icon-search.svg" alt=""></button>
                </div>
            </form>
            <!--end Form search-->
                
            <a href="../cart.php">
                <div class="shoppingCart">
                    <img src="assets/shopping-cart.svg" alt="">
                    <span class="itemNumber"><?php items(); ?></span>
                </div>
            </a>

            <?php
            
                if (!isset($_SESSION['customer_email'])) {

                    echo "
                        <a href='login.php'>
                            <div class='profile'>
                                <img src='customer_images/customer_default.png' title='Đăng Nhập' alt=''>
                            </div>
                        </a>
                    ";

                } else {

                    $session_email = $_SESSION['customer_email'];

                    $get_customer = "select * from customers where customer_email='$session_email'";

                    $run_customer = mysqli_query($conn, $get_customer);

                    $row_customer = mysqli_fetch_array($run_customer);

                        $customer_name = $row_customer['customer_name'];

                        $customer_image = $row_customer['customer_image'];
                        
                    if ($customer_image=='') {

                        echo "
                            <a href='my_account.php?my_orders'>
                                <div class='profile'>
                                    <img src='customer_images/customer_default_2.png' title='Xem Hồ Sơ' alt=''>
                                </div>
                            </a>
                        ";

                    } else {

                        echo "
                            <a href='my_account.php?my_orders'>
                                <div class='profile'>
                                    <img src='customer_images/$customer_image' title='Xem Hồ Sơ' alt=''>
                                </div>
                            </a>
                        ";
                    }
                }
            
            ?>

            <div class="menu-icon open">
                <span></span>
            </div>
        </div>
    </nav>
    <!--end Navigation-->

    <!--Content-->

    <div class="modal">
        <div class="wrapper">
            <div class="content">
                <div class="subtitle">Đăng nhập</div>
                <!--form-->
                <form action="login.php" method="post" enctype="multipart/form-data">
                    
                    <div class="input-wrapper">
                        <label for="email">E-mail</label>
                        <input id="email" type="text" placeholder="Nhập email của bạn" name="customer_email" required>
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="password">Mật Khẩu</label>
                        <input id="password" type="password" placeholder="Mật khẩu" name="customer_password" required>
                    </div>

                    <div class="account">

                        <p>Chưa có tài khoản? <a class="link" href="../register.php">Đăng ký tại đây</a></p>
                    </div>
                
                    <button name="login" class="btn">Đăng Nhập</button>
                </form>
                <!--end form-->
            </div>
        </div>
    </div>

    <!--end Content-->

    <!--script swiper-->
    <script src="../js/swiper.min.js"></script>
    <!--script-->
    <script src="../js/main.js"></script>
    <script  src="../js/mobile_menu.js"></script>
    <script src="../js/input_anime.js"></script>
    <script  src="js/search_open.js"></script>

</body>
</html>

<?php

    if (isset($_POST['login'])) {

        $customer_email = $_POST['customer_email'];

        $customer_password = $_POST['customer_password'];

        $get_customer = "select * from customers where customer_email='$customer_email'";

        $run_customer = mysqli_query($conn, $get_customer);

        $count_customer = mysqli_num_rows($run_customer);

        $row_customer = mysqli_fetch_array($run_customer);

            $customer_password_hash = $row_customer['customer_password'];

        $get_ip = getRealIpUser();

        $get_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($conn, $get_cart);

        $count_cart = mysqli_num_rows($run_cart);

        if ($count_customer==0) {

            echo "<script>alert('Email Không Chính Xác, Vui Lòng Nhập Lại.')</script>";

            exit();

        }

        if (!password_verify($_POST['customer_password'], $customer_password_hash)) {

            echo "<script>alert('Mật Khẩu Không Chính Xác, Vui Lòng Nhập Lại.')</script>";

            exit();
        }

        if ($count_customer==1 AND $count_cart==0) {

            $_SESSION['customer_email'] = $customer_email;

            /*echo "<script>alert('Đăng Nhập Thành Công')</script>";*/

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        } else {

            $_SESSION['customer_email'] = $customer_email;

            $get_customer = "select * from customers where customer_email='$customer_email'";

            $run_customer = mysqli_query($conn, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['customer_id'];

            /* echo "<script>alert('Đăng Nhập Thành Công.')</script>"; */

            // echo "<script>window.open('../order.php?customer_id=$customer_id','_self')</script>";
            echo "<script>window.open('../cart.php','_self')</script>";

        }


    }

?>
