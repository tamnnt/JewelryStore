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
    <title>Tin tức</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--script swiper-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!--css-->
    <link rel="stylesheet" href="css/news.css">

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
                <a href="news.php" class="menuLink active"">Tin tức</a>
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
                <img src="assets/images/simple-heading2.jpg" alt="">
            </figure>
        </div>
        
        <section class="contentMedia"><div class="contentMedia__left">
                <h2 class="contentMedia__listTitle">Tin tức</h2>
                <div class="contentMedia__listWrapper">
                    <div class="contentMedia__list">
                        <figure class="contentMedia__listImage"><a href="newsdetails.php"><img src="assets/images/news5.webp" alt=""></a></figure>
                        <div class="contentMedia__listText">
                            <h4 class="contentMedia__listSubTitle"><a href="newsdetails.php">RƯỚC MÈO ĐẠI CÁT - NĂM MỚI ĐẠI PHÁT</a></h4>
                            <div class="contentMedia__listUser"><img src="assets/calendar.svg" alt=""> 30/5/2023 &nbsp; <img src="assets/user.svg" alt=""> saomai &nbsp; <img src="assets/eye.svg" alt=""> 87</div>
                            <p class="contentMedia__listDesc">Nhân dịp chào đón Tết Quý Mão 2023, JEWELRY STORE ra mắt bộ trang sức độc quyền mới mang tên Mèo Đại Cát. Theo Hán Văn: “Đại” nghĩa là lớn, “cát” nghĩa là may mắn. Thiết kế Mèo Đại Cát mang ý nghĩa đem đến những điều may mắn, tốt lành cho người</p>
                        </div>
                    </div>
                    <div class="contentMedia__list">
                        <figure class="contentMedia__listImage"><a href="newsdetails.php"><img src="assets/images/news1.webp" alt=""></a></figure>
                        <div class="contentMedia__listText">
                            <h4 class="contentMedia__listSubTitle"><a href="newsdetails.php">KIM CƯƠNG LAB-GROWN LÀ GÌ? CÓ NÊN MUA KIM CƯƠNG LAB-GROWN KHÔNG?</a></h4>
                            <div class="contentMedia__listUser"><img src="assets/calendar.svg" alt=""> 30/5/2023 &nbsp; <img src="assets/user.svg" alt=""> saomai &nbsp; <img src="assets/eye.svg" alt=""> 87</div>
                            <p class="contentMedia__listDesc">Được đánh giá sẽ là xu hướng đá quý chiếm lĩnh thị trường trang sức thế giới trong tương lai, tuy nhiên kim cương Lab-grown lại quá mới mẻ tại Việt Nam. Sánh ngang với kim cương thiên nhiên về chất lượng nhưng kim cương nuôi cấy lại có mức giá tốt...</p>
                        </div>
                    </div>
                    <div class="contentMedia__list">
                        <figure class="contentMedia__listImage"><a href="newsdetails.php"><img src="assets/images/news2.webp" alt=""></a></figure>
                        <div class="contentMedia__listText">
                            <h4 class="contentMedia__listSubTitle"><a href="newsdetails.php">GỢI Ý QUÀ TẶNG 8/3 KHÔNG CHỈ GIÁ TRỊ MÀ CÒN TINH TẾ</a></h4>
                            <div class="contentMedia__listUser"><img src="assets/calendar.svg" alt=""> 30/5/2023 &nbsp; <img src="assets/user.svg" alt=""> saomai &nbsp; <img src="assets/eye.svg" alt=""> 87</div>
                            <p class="contentMedia__listDesc">Đến hẹn lại lên, 8/3 luôn là thời điểm khiến cánh mày râu loay hoay suy nghĩ, tìm kiếm sự trợ giúp tư vấn tặng quà mẹ, vợ hay bạn gái. Với phụ nữ, họ làm những điều đôi khi không ai thấy, chỉ cần sự luôn hiện diện của bạn ở bên là đủ. Một món quà </p>
                        </div>
                    </div>
                    <div class="contentMedia__list">
                        <figure class="contentMedia__listImage"><a href="newsdetails.php"><img src="assets/images/news3.webp" alt=""></a></figure>
                        <div class="contentMedia__listText">
                            <h4 class="contentMedia__listSubTitle"><a href="newsdetails.php">BÓC HÀNG LOẠT TRANG SỨC CỦA QUỲNH LƯƠNG TRONG PHIM ĐỪNG LÀM MẸ CÁU</a></h4>
                            <div class="contentMedia__listUser"><img src="assets/calendar.svg" alt=""> 30/10/2020 &nbsp; <img src="assets/user.svg" alt=""> saomai &nbsp; <img src="assets/eye.svg" alt=""> 87</div>
                            <p class="contentMedia__listDesc">Không chỉ để lại dấu ấn với khán giả nhờ lối diễn tự nhiên, Quỳnh Lương còn hút mắt người xem bởi phong cách thời trang “sang - xịn - mịn”. Được biết, diễn viên Quỳnh Lương cùng Stylist Khúc Mạnh Quân đã chuẩn bị trên dưới 60 bộ trang phục kết hợp...</p>
                        </div>
                    </div>
                    <div class="contentMedia__list">
                        <figure class="contentMedia__listImage"><a href="newsdetails.php"><img src="assets/images/news4.webp" alt=""></a></figure>
                        <div class="contentMedia__listText">
                            <h4 class="contentMedia__listSubTitle"><a href="newsdetails.php">ĐẶT MỚI NHẪN CƯỚI JEWELRY STORE MẤT BAO LÂU?</a></h4>
                            <div class="contentMedia__listUser"><img src="assets/calendar.svg" alt=""> 30/10/2020 &nbsp; <img src="assets/user.svg" alt=""> saomai &nbsp; <img src="assets/eye.svg" alt=""> 87</div>
                            <p class="contentMedia__listDesc">ùa cưới 2022, JEWELRY STORE mang đến đặc quyền đặt mới nhẫn cưới nhanh nhất chỉ từ 7 đến 12 ngày, hỗ trợ tốt nhất cho cô dâu chú rể bước vào hành trình hôn nhân trọn vẹn.  TẠI SAO NÊN ĐẶT MỚI NHẪN CƯỚI?Nhẫn cưới là tín vật biểu tượng của hô...</p>
                        </div>
                    </div>
                </div>

                <div class="contentMedia__pagination">
                    <a href="" class="contentMedia__paginationLink active">1</a>
                    <a href="" class="contentMedia__paginationLink">2</a>
                    <a href="" class="contentMedia__paginationLink">3</a>
                    <a href="" class="contentMedia__paginationLink"><img src="assets/next.svg" alt=""></a>
                </div>
            </div>

            <div class="contentMedia__right">
                <div class="contentMedia__recent">
                    <h2 class="contentMedia__searchTitle">Bài đăng gần đây</h2>
                    <div class="contentMedia__recentLinks">
                        <a href="newsdetails.php" class="contentMedia__recentLink">KIM CƯƠNG LAB-GROWN LÀ GÌ? CÓ NÊN MUA KIM CƯƠNG LAB-GROWN KHÔNG?</a>
                        <a href="newsdetails.php" class="contentMedia__recentLink">L-DIAMOND COLLECTION - WE MAKE YOUR DIAMOND DREAMS COME TRUE</a>
                        <a href="newsdetails.php" class="contentMedia__recentLink">SOI TỦ TRANG SỨC CỦA CÁC MC ĐÌNH ĐÁM CỦA VTV</a>
                        <a href="newsdetails.php" class="contentMedia__recentLink">GỢI Ý QUÀ TẶNG 8/3 KHÔNG CHỈ GIÁ TRỊ MÀ CÒN TINH TẾ</a>
                        <a href="newsdetails.php" class="contentMedia__recentLink">DIỆN TRANG SỨC CHUẨN NHƯ DIỄN VIÊN VTV CÙNG JEWELRY STORE</a>
                    </div>
                </div>
            </div>
        </section>
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
                <a class="footer__link active" href="shop.php">Bán chạy nhất</a>
                <a class="footer__link" href="shop.php">Mới nhất</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Tạp chí</h4>
                <a class="footer__link" href="">Kỹ năng nghệ thuật</a>
                <a class="footer__link" href="">Sự nghiệp</a>
                <a class="footer__link" href="">Cảm hứng</a>
                <a class="footer__link" href="">Tin tức</a>
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
                <a class="footer__hiperLink" href="newsdetails.php">Chính sách bảo mật</a>
                <span>・</span>
                <a class="footer__hiperLink" href="newsdetails.php">Các điều khoản và điều kiện</a>
            </div>
            <div class="footer__hiperLinks">
                <a class="footer__hiperLink" href="newsdetails.php">Dribbble</a>
                <span>・</span>
                <a class="footer__hiperLink" href="newsdetails.php">Behance</a>
                <span>・</span>
                <a class="footer__hiperLink" href="newsdetails.php">Instagram</a>
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