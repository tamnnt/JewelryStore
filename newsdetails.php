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
                <a href="news.php" class="menuLink active">Tin tức</a>
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
        <section class="contentMedia">
            <div class="contentMedia__left">
                <h2 class="contentMedia__title">GỢI Ý QUÀ TẶNG 8/3 KHÔNG CHỈ GIÁ TRỊ MÀ CÒN TINH TẾ</h2>
                <div class="contentMedia__info">
                    <div class="contentMedia__name">Bởi:<strong>admin</strong> <img src="assets/calendar.svg" alt="">4/5/2023</div>
                    <div class="contentMedia__views"><img src="assets/eye.svg" alt="">12</div>
                </div>

                <div class="contentMedia__text">
                    <h4 class="contentMedia__subTitle">Đến hẹn lại lên</h4>
                    <p class="contentMedia__desc">8/3 luôn là thời điểm khiến cánh mày râu loay hoay suy nghĩ, tìm kiếm sự trợ giúp tư vấn tặng quà mẹ, vợ hay bạn gái. Với phụ nữ, họ làm những điều đôi khi không ai thấy, chỉ cần sự luôn hiện diện của bạn ở bên là đủ. Một món quà thay bạn luôn đồng hành bên người phụ nữ yêu thương sẽ là món quà ý nghĩa và tinh tế nhất.
                        Món quà trang sức với chất liệu 14K sẽ luôn sáng đẹp bền lâu, cùng bạn đồng hành bên người phụ nữ thương yêu mỗi ngày!<br><br>
                       
                    </p>
                    <figure class="contentMedia__image"><img src="assets/images/news3.webp" alt=""></figure>
                    <p class="contentMedia__imageName">Trang sức ngọc trai tặng mẹ - Thay lời cảm ơn tới tình yêu lớn như biển cả của mẹ.P</p>
                    <p class="contentMedia__desc">Là bởi vì có mẹ, người phụ nữ luôn âm thầm phía sau chăm sóc và lo lắng chúng ta, ngay cả khi ta trưởng thành. Vì những yêu thương thầm lặng đó, đừng ngại nói lời cảm ơn và chuẩn bị một món quà đầy tâm ý dành tới người phụ nữ đặc biệt ấy.
                      <br>
                      JEWELRY STORE gợi ý tới bạn những thiết kế trang sức đá màu và ngọc trai phù hợp dành tặng mẹ. Được chế tác từ vàng 14K, đây sẽ là món quà vừa giá trị vừa ý nghĩa, thay bạn bên mẹ mỗi ngày. 
                    </p>
                </div>

                <div class="contentMedia__text">
                    <h4 class="contentMedia__subTitle">Bông tai ngọc trai đính 1 viên đá phù hợp đeo mỗi ngày</h4>
                    <p class="contentMedia__desc">8/3 luôn là thời điểm khiến cánh mày râu loay hoay suy nghĩ, tìm kiếm sự trợ giúp tư vấn tặng quà mẹ, vợ hay bạn gái. Với phụ nữ, họ làm những điều đôi khi không ai thấy, chỉ cần sự luôn hiện diện của bạn ở bên là đủ. Một món quà thay bạn luôn đồng hành bên người phụ nữ yêu thương sẽ là món quà ý nghĩa và tinh tế nhất.
                        Món quà trang sức với chất liệu 14K sẽ luôn sáng đẹp bền lâu, cùng bạn đồng hành bên người phụ nữ thương yêu mỗi ngày!<br><br>
                      
                    </p>
                    <figure class="contentMedia__image"><img src="assets/images/news1.webp" alt=""></figure>
                    <p class="contentMedia__imageName">Trang sức ngọc trai tặng mẹ - Thay lời cảm ơn tới tình yêu lớn như biển cả của mẹ.P</p>
                    <p class="contentMedia__desc">Là bởi vì có mẹ, người phụ nữ luôn âm thầm phía sau chăm sóc và lo lắng chúng ta, ngay cả khi ta trưởng thành. Vì những yêu thương thầm lặng đó, đừng ngại nói lời cảm ơn và chuẩn bị một món quà đầy tâm ý dành tới người phụ nữ đặc biệt ấy.
                      <br>
                      JEWELRY STORE gợi ý tới bạn những thiết kế trang sức đá màu và ngọc trai phù hợp dành tặng mẹ. Được chế tác từ vàng 14K, đây sẽ là món quà vừa giá trị vừa ý nghĩa, thay bạn bên mẹ mỗi ngày. 
                    </p>
                </div>

                <div class="contentMedia__subDesc">>> dành tặng món quà tuyệt nhất đến người phụ nữ quý giá nhất. Đây sẽ là món quà thay lời cảm ơn của các anh dành tặng cho người thương của mình.</div>
                <div class="contentMedia__byName">Tran Thanh</div>
                
                <div class="contentMedia__share"> <b>Chia sẻ: </b>
                    <a href="" class="contentMedia__fb"><img src="assets/like.svg" alt=""> thích 0</a>
                    <a href="" class="contentMedia__tw"><img src="assets/tw.svg" alt=""> Twitter</a>
                </div>

                <div class="contentMedia__form">
                    <div class="contentMedia__formTitle">Hãy là người đầu tiên bình luận cho bài này</div>
                    <form action="">
                        <textarea name="" id="" cols="30" rows="6" placeholder="Nhập nội dung bình luận"></textarea>
                        <input type="text" placeholder="Họ và tên">
                        <input type="text" placeholder="email">
                        <input type="text" placeholder="Số điện thoại">
                        <button>Gửi</button>
                    </form>
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
                <a class="footer__link" href="newsdetails.php">Công đồng</a>
                <a class="footer__link" href="newsdetails.php">Xu hướng</a>
                <a class="footer__link" href="newsdetails.php">Chọn</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Thương trường</h4>
                <a class="footer__link" href="newsdetails.php">Xu hướng</a>
                <a class="footer__link active" href="newsdetails.php">Bán chạy nhất</a>
                <a class="footer__link" href="newsdetails.php">Mới nhất</a>
            </div>
            <div class="footer__links">
                <h4 class="footer__title">Tạp chí</h4>
                <a class="footer__link" href="newsdetails.php">Kỹ năng nghệ thuật</a>
                <a class="footer__link" href="newsdetails.php">Sự nghiệp</a>
                <a class="footer__link" href="newsdetails.php">Cảm hứng</a>
                <a class="footer__link" href="newsdetails.php">Tin tức</a>
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
</body>
</html>