<?php

    session_set_cookie_params('86400');
    session_start();
    include("includes/db.php");
    include("functions/functions.php");

?>

<?php error_reporting(0);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang sức</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--css swiper-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!--css-->
    <link rel="stylesheet" href="css/main.css">

    <!-- icon and title -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <meta name="description"
        content="shop trang suc" />

    <meta name="keywords"
        content="designer,graphic design,ui design,web design,wine labels,packaging design,label design,ui designer" />

    <meta property="og:title" content=" / portfolio" />
    <meta property="og:description"
        content="shop trang suc" />
    <meta property="og:image" content="/images/fb_thumb.png" />
    
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
        <a href="index.php" class="mainLogo"> <img src="assets/logo.png" alt="logo"></a>
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

    <!--Swiper-->
    <div class="swiper-container">
        <!--Additional required wrapper-->
        <div class="swiper-wrapper">
            <!--Slider-->
            <!-- php get slides -->
            <?php

                $get_slides = "select * from slides";

                $run_slides = mysqli_query($conn, $get_slides);

                while ($row_slides = mysqli_fetch_array($run_slides)) {

                    $slide_title = $row_slides['slide_title'];

                    $slide_description = $row_slides['slide_description'];

                    $slide_image = $row_slides['slide_image'];

                    $slide_url = $row_slides['slide_url'];
                
            
            ?>
            
            <div class="swiper-slide" style="background-image: url('admin/<?php echo $slide_image; ?>')">
                <div class="slide-text">
                    <h1><?php echo $slide_title; ?></h1>
                    <p><?php echo $slide_description; ?></p>
                    <?php

                        if ($slide_title=='') {

                            echo "";

                        } else {

                            echo "
                                <a href='shop.php' class='btn'>Xem Thêm</a>
                            ";
                        }
                    ?>
                    
                </div>
            </div>

            <?php } ?>
            <!-- end php get slides -->
            <!--end Slider-->

        </div>
        <!--if we need pagination-->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"><span></span></div>
        <div class="swiper-button-next"><span></span></div>

    </div>
    <!--end Swiper-->
    
    <section class="contentMedia">
        <div class="contentMedia__wrapper">
            <h2 class="contentMedia__titleMobile">THIẾT KẾ ĐỘC QUYỀN TỪ HÀN QUỐC</h2>
            <article class="contentMedia__media">
                <img loading="lazy" src="assets/images/product-1.png" alt="" />
            </article>
            <article class="contentMedia__text">
                <h3 class="section__title2"><b>Giới thiệu</b></h3>
                <p class="contentMedia__description">Lấy tầm nhìn trở thành “Nhà bán lẻ trang sức dẫn đầu xu hướng", trang sức Jewelry Store mang phong cách trẻ trung, hiện đại, liên tục cập nhật những xu hướng mới từ Hàn Quốc. Ba dòng sản phẩm chủ lực của Jewelry Store gồm có: Nhẫn cưới, Trang sức cưới và Trang sức hiện đại cho nữ giới. Khách hàng sở hữu trang sức vàng từ Jewelry Store Jewelry đồng thời sở hữu xu hướng mới nhất đến từ thế giới, được thể hiện bằng sản phẩm mang tính sáng tạo, đột phá trong thiết kế và công nghệ chế tác.</p>
                <div class="ctaContainer">
                    <a href="intro.php" class="button noMargin">Xem thêm</a>
                </div>
            </article>
        </div>
    </section>
    <!--Card-->
    <div class="products">
        <div class="wrapperCard">
            <h3 class="section__title"><b>Sản Phẩm</b><span>Chúng Tôi</span></h3>
            <div class="cards">
                <!--card-->
                <!-- php get product -->
                <?php 

                    $get_products = "select * from products order by 1 DESC LIMIT 0,8";

                    $run_products = mysqli_query($conn, $get_products);

                    while ($row_products = mysqli_fetch_array($run_products)) {

                        $product_id = $row_products['product_id'];

                        $product_title = $row_products['product_title'];

                        $product_price = number_format((float)$row_products['product_price']);

                        $product_image_1 = $row_products['product_image_1'];

                        $product_label = $row_products['product_label'];

                        $product_sale = number_format((float)$row_products['product_sale']);

                
                ?>
                <a href="details.php?product_id=<?php echo $product_id; ?>" rel="noopenner" class="card">
                    <?php
                        
                        if ($product_label == "new") {

                            echo "<div class='new'>mới!</div>";

                        } else {

                            echo "<div class='sale'>giảm giá!</div>";

                        }

                    ?>
                    <div class="card__image">
                        <img src="admin/<?php echo $product_image_1; ?>" alt="">
                    </div>

                    <div class="card__content">
                        <article class="card__text">
                            <h2 class="card__title"><?php echo $product_title; ?></h2>
                            <div class="card__price">
                                <?php
                                
                                    if ($product_label == "sale") {

                                        echo "
                                            <p class='card__priceFinal'>$product_sale ₫</p>
                                            <p class='card__priceOriginal'>$product_price  ₫</p>
                                        ";
                                    } else {

                                        echo "<p class='card__priceFinal'>$product_price  ₫</p>";

                                    }

                                ?>
                            </div>
                        </article>

                        <div class="card__icon">
                            <p class="card__detail">Chi tiết<span>+</span></p>
                            <button class="btn"><span>Xem chi tiết</span></button>
                        </div>
                    </div>
                </a>
                <?php } ?>
                <!-- end php get product -->
                <!--end Card-->
            </div>

            <a href="shop.php">
                <button class="button">Xem Thêm</button>
            </a>
            
        </div>
    </div>
    
    
    <section class="contentMedia right">
        <div class="contentMedia__wrapper">
            <h2 class="contentMedia__titleMobile">DỊCH VỤ HẬU MÃI TẬN TÂM</h2>
            <article class="contentMedia__media">
                <img loading="lazy" src="assets/images/product-3.png" alt="" />
            </article>
            <article class="contentMedia__text">
                <h3 class="section__title2"><span>DỊCH VỤ</span></h3>
                <p class="contentMedia__description">Mỗi sản phẩm, giao dịch tại Jewelry Store đều cam kết minh bạch, đầy đủ hoá đơn cho toàn bộ giao dịch. Jewelry Store mang đến dịch vụ chăm sóc và hậu mãi trọn đời với những đặc quyền hấp dẫn để khách hàng có thể có trải nghiệm mua sắm trọn vẹn nhất.</p>
                <div class="ctaContainer">
                    <a href="intro.php" class="button noMargin">Xem thêm</a>
                </div>
            </article>
        </div>
    </section>

    <!--Footer-->
    <footer class="footer">
        <div class="footer__top">
            <div class="footer__links">
                <h4 class="footer__title">Phòng trưng bày</h4>
                <a class="footer__link" href="shop.php">Sản phẩm</a>
                <a class="footer__link" href="intro.php">Giới thiệu</a>
                <a class="footer__link" href="customer/my_account.php?my_orders">Tài khoản</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Dịch vụ</h4>
                <a class="footer__link" href="cart.php">Giỏ hàng</a>
                <a class="footer__link" href="shop.php">Bán chạy nhất</a>
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
                <a href="register.php"><button class="btn">Đăng ký</button></a>
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
    <script  src="js/main.js"></script>
    <script  src="js/mobile_menu.js"></script>
    <script>
        // swiper   
        var mySwiper = new Swiper('.swiper-container', {
            effect: '',
            loop: false,
            speed: 1000,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: 'true'
            },

    

        });

    </script>

</body>
</html>