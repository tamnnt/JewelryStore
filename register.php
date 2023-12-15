<?php

	session_start();
    include("includes/db.php");
    include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tạo tài khoản</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--script swiper-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!--css-->
    <link rel="stylesheet" href="css/register.css">

    <!-- icon and title -->
    <link rel="shortcut icon" href="images/favicon.ico" />

</head>
<body>
    <!--Navigation-->
    
    <div class="menu-mobile">

        <div class="menu-items">
            <a href="index.php" class="menu-link">Trang chủ</a>
            <a href="shop.php" class="menu-link">Cửa hàng</a>
            <a href="register.php" class="menu-link">Tài khoản</a>
            <a href="cart.php" class="menu-link">Giỏ hàng</a>
            <a href="intro.php" class="menu-link">Giới thiệu</a>
            <a href="news.php" class="menu-link">Tin tức</a>
        </div>
        <div class="menu-icon close">
            <span></span>
        </div>

    </div>

    </div>
        
    <nav>

        <a href="index.php" class="mainLogo"> <img src="assets/logo.png" alt=""></a>
        <div class="menu">
            <div class="menulinks">
                <a href="index.php" class="menuLink">Trang chủ</a>
                <a href="shop.php" class="menuLink">Cửa hàng</a>
                <a href="customer/my_account.php?my_orders" class="menuLink">Tài khoản</a>
                <a href="cart.php" class="menuLink">Giỏ hàng</a>
                <a href="intro.php" class="menuLink">Giới thiệu</a>
                <a href="news.php" class="menuLink">Tin tức</a>
            </div>
        </div>
        <div class="iconWrapper">

            <!-- Form search -->
            <form method="get" action="result.php">
                <div class="mainNav__input">
                    <input type="search" name="user_query" placeholder="Tìm kiếm ...">
                    <button class="mainNav__btnSearch" type="submit"> <img src="assets/icon-search.svg" alt=""></button>
                </div>
            </form>
            <!--end Form search-->
                
            <a href="cart.php">
                <div class="shoppingCart">
                    <img src="assets/shopping-cart.svg" alt="">
                    <span class="itemNumber"><?php items(); ?></span>
                </div>
            </a>

            <?php
            
                if (!isset($_SESSION['customer_email'])) {

                    echo "
                        <a href='customer/login.php'>
                            <div class='profile'>
                                <img src='customer/customer_images/customer_default.png' title='Đăng Nhập' alt=''>
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
                            <a href='customer/my_account.php?my_orders' target='_blank'>
                                <div class='profile'>
                                    <img src='customer/customer_images/customer_default_2.png' title='Xem Hồ Sơ' alt=''>
                                </div>
                            </a>
                        ";

                    } else {

                        echo "
                            <a href='customer/my_account.php?my_orders' target='_blank'>
                                <div class='profile'>
                                    <img src='customer/customer_images/$customer_image' title='Xem Hồ Sơ' alt=''>
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

    <div class="modal open">
        <div class="wrapper">
            <div class="content">
                <div class="subtitle">Đăng ký</div>
                <!--form-->
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <div class="input-wrapper">
                        <label for="name">Tên</label>
                        <input id="name" type="text" placeholder="Nhập tên của bạn" name="customer_name">
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="email">E-mail</label>
                        <input id="email" type="text" placeholder="Nhập email của bạn" name="customer_email" required>
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="phone">Di Động</label>
                        <input id="phone" type="text" placeholder="Di động" name="customer_phone" required>
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="address">Địa Chỉ</label>
                        <textarea cols="30" rows="10" placeholder="Địa chỉ giao hàng" name="customer_address"></textarea>
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="password">Mật Khẩu</label>
                        <input id="password" type="password" placeholder="Mật khẩu" name="customer_password" required>
                    </div>
                    
                    <div class="input-wrapper">
                        <label for="confirmpassword">Nhập Lại Mật Khẩu</label>
                        <input id="confirmpassword" type="password" placeholder="Nhập lại mật khẩu" name="customer_repassword" required>
                    </div>

                    <div class="input-wrapper">

                        <input style="border:none; padding: 0px; border-radius: 0px; margin-bottom: 0px" type="file" id="inputFile" class="inputFile" name="customer_image" required>
                        <label tabindex="0" for="inputFile" class="uploadIcon"></label>
                        <label tabindex="0" for="inputFile" class="fileReturn"></label>
                    </div>
                
                    <button type="submit" name="register" class="btn">Tạo tài khoản</button>
                </form>
                <!--end form-->
            </div>
        </div>
    </div>
    <!--end Content-->

    <!--script-->
    <script src="js/main.js"></script>
    <script  src="js/mobile_menu.js"></script>
    <script src="js/input_anime.js"></script>
    <script  src="js/search_open.js"></script>
    <script src="js/choose_picture.js"></script>
</body>
</html>
<!-- php register -->
<?php

    if (isset($_POST['register'])) {

        $customer_ip = getRealIpUser();

        $customer_name = $_POST['customer_name'];

        $customer_email = $_POST['customer_email'];

        $customer_phone = $_POST['customer_phone'];

        $customer_address = $_POST['customer_address'];

        $customer_password = password_hash($_POST['customer_password'],PASSWORD_DEFAULT);

        $customer_repassword = $_POST['customer_repassword'];

        $customer_image = $_FILES['customer_image']['name'];

        $customer_image_tmp = $_FILES['customer_image']['tmp_name'];

        move_uploaded_file($customer_image_tmp,"customer/customer_images/$customer_image");

        if (!password_verify($_POST['customer_repassword'],$customer_password)) {

            echo "<script>alert('Mật Khẩu Nhập Lại Chưa Đúng')</script>";

            exit();

        }
    
        $get_customer = "select * from customers where customer_email='$customer_email'";

        $run_customer = mysqli_query($conn, $get_customer);

        $count_customer = mysqli_num_rows($run_customer);

        if ($count_customer==1) {

            echo "<script>alert('Email đã có người dùng')</script>";

            exit();

        } 
        
        $insert_customer = "insert into customers (customer_name, customer_email, customer_phone, customer_address, customer_password, customer_image, customer_ip) values ('$customer_name', '$customer_email', '$customer_phone', '$customer_address', '$customer_password', '$customer_image', '$customer_ip')";

        $run_customer = mysqli_query($conn, $insert_customer);

        $get_cart = "select * from cart where ip_add='$customer_ip'";

        $run_cart = mysqli_query($conn, $get_cart);

        $count_cart = mysqli_num_rows($run_cart);

        if ($count_cart>0) {

            $_SESSION['customer_email']=$customer_email;

            $get_customer = "select * from customers where customer_email='$customer_email'";

            $run_customer = mysqli_query($conn, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['customer_id'];

            echo "<script>alert('Đăng Ký Thành Công')</script>";

            echo "<script>window.open('order.php?customer_id=$customer_id','_self')</script>";

        } else {

            $_SESSION['customer_email']=$customer_email;

            echo "<script>alert('Đăng Ký Thành Công')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }
        
        
    }

?>