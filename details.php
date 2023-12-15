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
    <title>Chi tiết</title>
    <!--fonts-->
    <link rel="stylesheet" href="fonts/rougescript.css">
    <!--script swiper-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!--css-->
    <link rel="stylesheet" href="css/details.css">
    <link href="reviews.css" rel="stylesheet" type="text/css">

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
                <a href="cart.php" class="menuLink active">Giỏ hàng</a>
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
                        $customer_id = $row_customer['customer_id'];

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
    <div class="wrapper">
        
        <div class="content">

            <section class="left">
                <div class="swiper-container galleryMain">
                    <!-- php get product your chose -->
                    <?php

                        if (isset($_GET['product_id'])) {

                            $product_id = $_GET['product_id'];

                            $get_product = "select * from products where product_id = '$product_id'";

                            $run_product = mysqli_query($conn, $get_product);

                            $row_product = mysqli_fetch_array($run_product);

                                $product_title = $row_product['product_title'];

                                $product_price = number_format((float)$row_product['product_price']);

                                $product_image_1 = $row_product['product_image_1'];

                                $product_image_2 = $row_product['product_image_2'];

                                $product_image_3 = $row_product['product_image_3'];

                                $product_description = $row_product['product_description'];

                                $product_label = $row_product['product_label'];

                                $product_sale = number_format((float)$row_product['product_sale']);

                                $product_total = $row_product['product_total'];

                        }
                    ?>
                    <!-- end php get product your chose -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="scene"> 
                                <img src="admin/<?php echo $product_image_1; ?>" alt="đang tải...">
                                <img src="admin/<?php echo $product_image_1; ?>" class="shadow">
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="scene"> 
                                <img src="admin/<?php echo $product_image_2; ?>" alt="đang tải...">
                                <img src="admin/<?php echo $product_image_2; ?>" class="shadow">
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="scene"> 
                                <img src="admin/<?php echo $product_image_3; ?>" alt="đang tải...">
                                <img src="admin/<?php echo $product_image_3; ?>" class="shadow">
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <!--Add Arrows-->
                <div class="sliderNavigation">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>

            <section class="right">
                <div class="rightContent">
                    <?php
                        $get_coupon = "select * from coupons where product_id='$product_id'";
                        $run_coupon = mysqli_query($conn, $get_coupon);
                        $row_coupon = mysqli_fetch_array($run_coupon);
                        if ($row_coupon > 0) {
                            $coupon_code = $row_coupon['coupon_code'];
                            $coupon_price = number_format((float)$row_coupon['coupon_price']);
                            $show_coupon_price = "Ưu đãi giá chỉ còn $coupon_price khi nhập mã $coupon_code";
                        }
                    ?>
                    <div class="model">
                        <p class="modelTitle"><?php echo $product_title; ?></p>
                        <p class="modelDesc">
                            <p><?php echo $product_description; ?></p>
                            <span style="color: blue; font-weight: bold"><?php echo $show_coupon_price?></span>
                        </p>
                        
                        <div class="modal__detailTotal">
                            <div class="modal__total">Kho hàng: <?php echo $product_total; ?></div>
                            <span>/</span>
                            <div class="modal__sold">Đã bán:
                                <?php 
                                        
                                    $get_sold = "SELECT * FROM customer_orders WHERE product_id='$product_id'";

                                    $run_sold = mysqli_query($conn, $get_sold);

                                    $count = mysqli_num_rows($run_sold);
                                    
                                    $total_quantity = 0;

                                    while ($row_sold = mysqli_fetch_array($run_sold)) {

                                        $product_quantity = $row_sold['product_quantity'];

                                        $total_quantity = $total_quantity + $product_quantity;

                                    }
                                    
                                    echo $total_quantity;
                                    
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="price">
                        <?php
                        
                            if ($product_label == "sale") {

                                echo "
                                    <p class='priceFinal'>$product_sale ₫</p>
                                    <p class='priceOriginal'>$product_price ₫</p>
                                ";
                            } else {

                                echo "<p class='priceFinal'>$product_price ₫</p>";

                            }
                        
                        ?>
                    </div>

                    <div class="specs">
                        <div class="size">
                            <h3 class="subtitle">Kích Thước</h3>
                            <!--Form-->
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post">
                            <div class="product__size">
                                <select name="product_size" required>
                                    <option disabled>Chọn Kích Thước</option>
                                    <option selected>Nhỏ</option>
                                    <option>Trung Bình</option>
                                    <option>Lớn</option>
                                </select>
                            </div>
                        </div>

                        <div class="quantity">
                            <h3 class="subtitle">Số Lượng</h3>
                            <div class="product__quantity">
                                <select name="product_quantity">
                                    <?php 
                                     for($i = 1; $i <= $product_total; $i++) {
                                        echo "<option>$i</option>";
                                     }
                                    ?> 
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <?php 
                    if ($product_total < 1) {
                        echo "<button class='btn disabled' type='submit'>
                                <img src='assets/shopping-cart-w.svg' alt=''>
                                <span>Sản phẩm đã hết</span>
                            </button>";
                    } else {
                        echo "<button class='btn' type='submit'>
                                <img src='assets/shopping-cart-w.svg' alt=''>
                                <span>thêm vào giỏ</span>
                            </button>";
                    }
                    ?>
                </form>
                <!--end Form-->
                </div>
                <!-- Reviews -->
                <?php 
                    $get_customer_orders = "SELECT * FROM customer_orders WHERE product_id='$product_id' AND customer_id='$customer_id'";

                    $run_customer_orders = mysqli_query($conn, $get_customer_orders);

                    $count_customer_orders = mysqli_num_rows($run_customer_orders);
                    while ($row_customer_orders = mysqli_fetch_array($run_customer_orders)) {

                    ?>
                    
                    <div class="contentReviews home">
                            <h2>Đánh giá</h2>
                            <p>Kiểm tra các đánh giá dưới đây cho sản phẩm này của chúng tôi.</p>
                            <div class="reviews"></div>
                            <script>
                                const reviews_page_id = <?php echo $_GET['product_id'] ?>;
                                fetch("reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
                                    document.querySelector(".reviews").innerHTML = data;
                                    document.querySelector(".reviews .write_review_btn").onclick = event => {
                                    event.preventDefault();
                                    document.querySelector(".reviews .write_review").style.display = 'block';
                                    document.querySelector(".reviews .write_review input[name='name']").focus();
                                    };
                                    document.querySelector(".reviews .write_review form").onsubmit = event => {
                                    event.preventDefault();
                                    fetch("reviews.php?page_id=" + reviews_page_id, {
                                        method: 'POST',
                                        body: new FormData(document.querySelector(".reviews .write_review form"))
                                    }).then(response => response.text()).then(data => {
                                        document.querySelector(".reviews .write_review").innerHTML = data;
                                    });
                                    };
                                });
                            </script>
                    </div>

                    <?php } ?>
            </section>


        </div>
        <!--end Content-->
    </div>

    <!--script swiper-->
    <script src="js/swiper.min.js"></script>
    <!--script-->
    <script src="js/main.js"></script>
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