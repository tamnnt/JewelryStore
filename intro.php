<?php

    session_set_cookie_params('86400');
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
    <title>Liên hệ</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--script swiper-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!--css-->
    <link rel="stylesheet" href="css/contact.css">

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
                <a href="intro.php" class="menuLink active">Giới thiệu</a>
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
                            <a href='customer/my_account.php?my_orders'>
                                <div class='profile'>
                                    <img src='customer/customer_images/customer_default_2.png' title='Xem Hồ Sơ' alt=''>
                                </div>
                            </a>
                        ";

                    } else {

                        echo "
                            <a href='customer/my_account.php?my_orders'>
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

    <div id="wrapper">
        <div class="simpleHeading">
            <figure class="simpleHeading__bgImage animeImg">
                <img src="assets/images/simple-heading.jpg" alt="">
            </figure>
        </div>
        <!-- contentMedia -->
        <section class="fullContent spacingM noSpacingBottom">
            <div class="fullContent__wrapper noPadding">
                <div class="fullContent__container">
                    <section class="wot m-02alt center spacingM">
                        <div class="wot__wrapper">
                            <h3 class="section__title"><b>Giới Thiệu</b><span>Chúng Tôi</span></h3>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <section class="doubleUp">
            <div class="doubleUp__wrapper noPadding">
                <div class="doubleUp__container" style="background-color: #685bdb;">
                    <div class="doubleUp__frameImageBlock">
                        <figure class="doubleUp__frameImage">
                            <img class="doubleUp__frameImageDesktop" src="assets/images/product-1.png" alt="">
                            <img class="doubleUp__frameImgMobile" src="assets/images/product-1.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="doubleUp__container">    
                    <section class="quickInfo m-02 m-02--light-03">
                        <div class="quickInfo__wrapper">
                            <div class="quickInfo__heading">
                                <h2 class="quickInfo__title">THIẾT KẾ ĐỘC QUYỀN TỪ HÀN QUỐC</h2>
                            </div>
                            <div class="quickInfo__content">
                                <p class="quickInfo__description">Lấy tầm nhìn trở thành “Nhà bán lẻ trang sức dẫn đầu xu hướng", trang sức Jewelry Store mang phong cách trẻ trung, hiện đại, liên tục cập nhật những xu hướng mới từ Hàn Quốc. Ba dòng sản phẩm chủ lực của Jewelry Store gồm có: Nhẫn cưới, Trang sức cưới và Trang sức hiện đại cho nữ giới. Khách hàng sở hữu trang sức vàng từ Jewelry Store đồng thời sở hữu xu hướng mới nhất đến từ thế giới, được thể hiện bằng sản phẩm mang tính sáng tạo, đột phá trong thiết kế và công nghệ chế tác.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- end contentMedia -->

        <!-- contentMedia Right -->

        <section class="doubleUp right">
            <div class="doubleUp__wrapper noPadding">
                <div class="doubleUp__container" style="background-color: #419c59;">
                    <div class="doubleUp__frameImageBlock">
                        <figure class="doubleUp__frameImage">
                            <img class="doubleUp__frameImageDesktop" src="assets/images/product-2.png" alt="">
                            <img class="doubleUp__frameImgMobile" src="assets/images/product-2.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="doubleUp__container">
                    <section class="quickInfo m-01 m-01--light-02">
                        <div class="quickInfo__wrapper">
                            <div class="quickInfo__heading">
                                <h2 class="quickInfo__title">NHỮNG CÂU CHUYỆN HẠNH PHÚC</h2>
                            </div>
                            <div class="quickInfo__content">
                                <p class="quickInfo__description">Mang trong mình sứ mệnh sẽ trở thành bạn đồng hành luôn thấu hiểu và trân trọng từng khoảnh khắc trong cuộc sống của khách hàng, slogan của Jewelry Store là “Tales of Happines” (Câu chuyện của hạnh phúc). Hạnh phúc, tình yêu, kỉ niệm,… được hình hóa thành trang sức vàng – nguyên liệu quý có giá trị không bao giờ mai một để trang sức không chỉ bền đẹp, mà luôn gợi nhắc mỗi người từng dấu mốc đáng nhớ đã trải qua.

                                Chiếc lắc tay cô gái tự thưởng cho mình nhân dịp thăng chức sau thời gian nỗ lực trong công việc.

                                Sợi dây chuyền bạn trai đích thân chọn mua tặng người yêu nhân kỉ niệm của hai người.

                                Đôi bông tai con gái nhận tháng lương đầu tiên liền mua tặng mẹ. Cặp nhẫn cưới hai người yêu nhau cùng chọn cho một chương mới gắn kết vợ chồng.

                                Chiếc nhẫn lưu từ bà, từ mẹ rồi được chuyển tặng cho con, cho cháu; để câu chuyện hạnh phúc được lưu giữ mãi với thời gian.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- end contentMedia Right -->

        <!-- contentMedia-->

        <section class="doubleUp">
            <div class="doubleUp__wrapper noPadding">
                <div class="doubleUp__container" style="background-color: #e3714b;">
                    <div class="doubleUp__frameImageBlock">
                        <figure class="doubleUp__frameImage">
                            <img class="doubleUp__frameImageDesktop" src="assets/images/product-3.png" alt="">
                            <img class="doubleUp__frameImgMobile" src="assets/images/product-3.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="doubleUp__container">
                    <section class="quickInfo m-03 m-03--light-02">
                        <div class="quickInfo__wrapper">
                            <div class="quickInfo__heading">
                                <h2 class="quickInfo__title">DỊCH VỤ HẬU MÃI TẬN TÂM</h2>
                            </div>
                            <div class="quickInfo__content">
                                <p class="quickInfo__description">Mỗi sản phẩm, giao dịch tại Jewelry Store đều cam kết minh bạch, đầy đủ hoá đơn cho toàn bộ giao dịch. Jewelry Store mang đến dịch vụ chăm sóc và hậu mãi trọn đời với những đặc quyền hấp dẫn để khách hàng có thể có trải nghiệm mua sắm trọn vẹn nhất.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- end contentMedia -->

        <!-- gridBrands -->
        <section class="gridBrands m-01--light-02 spacingXL">
            <div class="gridBrands__wrapper">
                <div class="gridBrands__heading">
                    <h2 class="gridBrands__title">Giải thưởng</h2>
                    <p class="gridBrands__description">Jewelry Store lần thứ 2 liên tiếp được vinh danh là Thương hiệu xuất sắc , Siêu thương hiệu. Năm thứ 5 liên tiếp xứng đáng đạt giải 5 Sao và đồng giải thưởng Hiệu quả.</p>
                </div>
                <ul>
                    <li>
                        <figure class="gridBrands__brandItem">
                            <img src="assets/icons-base/logo-brand-cinco.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="gridBrands__brandItem">
                            <img src="assets/icons-base/logo-brand-bronze.png" alt="">
                        </figure>
                    </li>
                    <li>
                        <figure class="gridBrands__brandItem">
                            <img src="assets/icons-base/logo-brand-superbrands.png" alt="">
                        </figure>
                    </li>
                </ul>
            </div>
        </section>
        <!-- end gridBrands -->
    </div>
    

    <!--Footer-->
    <footer class="footer">
        <div class="footer__top">
            <div class="footer__links">
                <h4 class="footer__title">Phòng trưng bày</h4>
                <a class="footer__link" href="">Công đồng</a>
                <a class="footer__link" href="">Xu hướng</a>
                <a class="footer__link" href="">Chọn</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Thương trường</h4>
                <a class="footer__link" href="">Xu hướng</a>
                <a class="footer__link active" href="">Bán chạy nhất</a>
                <a class="footer__link" href="">Mới nhất</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Tạp chí</h4>
                <a class="footer__link" href="">Kỹ năng nghệ thuật</a>
                <a class="footer__link" href="">Sự nghiệp</a>
                <a class="footer__link" href="">Cảm hứng</a>
                <a class="footer__link" href="news.php">Tin tức</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Bản tin</h4>
                <p class="footer__description">Đăng ký nhận bản tin của chúng tôi để nhận tin tức, cập nhật, mẹo và ưu đãi đặc biệt hàng tuần của bạn.</p>
                <div class="footer__input">
                    <img src="assets/email.svg" alt="">
                    <input type="text" placeholder="Nhập địa chỉ email của bạn">
                </div>
                <button class="btn">Đăng ký</button>
            </div>
        </div>

        <hr class="line">
        <div class="footer__bottom">
            <div class="footer__hiperLinks">
                <a class="footer__hiperLink" href="">Chính sách bảo mật</a>
                <span>・</span>
                <a class="footer__hiperLink" href="">Các điều khoản và điều kiện</a>
            </div>
            <div class="footer__hiperLinks">
                <a class="footer__hiperLink" href="">Dribbble</a>
                <span>・</span>
                <a class="footer__hiperLink" href="">Behance</a>
                <span>・</span>
                <a class="footer__hiperLink" href="">Instagram</a>
            </div>
        </div>
    </footer>
    <!--end Footer-->

    <!--script swiper-->
    <script src="js/swiper.min.js"></script>
    <!--script-->
    <script src="js/main.js"></script>
    <script  src="js/mobile_menu.js"></script>

    <script src="js/jquery-331.min.js"></script>

    <script>

    $(document).ready(function(data) {

        $(document).on('keyup','.quantity',function() {

                var id = $(this).data("product_id");
                var quantity = $(this).val();

                if(quantity !='') {

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function() {
                            $("body").load("cart_body.php");
                        }

                    });

                }

        });

    });

    </script>
</body>
</html>