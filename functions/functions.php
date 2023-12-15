<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bantrangsuc";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // getRealIpUser()

    function getRealIpUser() {

        switch (true) {
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_REAL_IP'];
            case(!empty($_SERVER['HTTP_X_ROWARDED'])) : return $_SERVER['HTTP_X_RORWARDED_FOR'];

            default : return $_SERVER['REMOTE_ADDR'];

        }

    }

    // add cart

    function add_cart() {

        global $conn;

        if (isset($_GET['add_cart'])) {

            $ip_add = getRealIpUser();

            $product_id = $_GET['add_cart'];

            $product_size = $_POST['product_size'];

            $product_quantity = $_POST['product_quantity'];

            $check_product = "select * from cart where ip_add='$ip_add' and product_id='$product_id'";
            
            $run_check = mysqli_query($conn, $check_product);

            $count_check = mysqli_num_rows($run_check);

            if ($count_check>0) {

                echo "<script>alert('Sản phẩm này đã được thêm vào giỏ hàng')</script>";
                echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";
                
                exit();
            } 

            if ($product_size=='') {
                echo "<script>alert('Vui Lòng Chọn Một Kích Thước!')</script>";
                echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";
            }
            
            else {

                $get_price = "select * from products where product_id='$product_id'";

                $run_price = mysqli_query($conn, $get_price);

                $row_price = mysqli_fetch_array($run_price);

                    $product_label = $row_price['product_label'];

                    $product_sale = $row_price['product_sale'];

                    $product_price = $row_price['product_price'];

                    if ($product_label == "sale") {

                        $product_price = $product_sale;

                    } else {

                        $product_price = $product_price;

                    }


                $query = "insert into cart (product_id, ip_add, p_size, p_price, p_quantity) values ('$product_id', '$ip_add', '$product_size', '$product_price', '$product_quantity')";

                $run_query = mysqli_query($conn, $query);

                echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";
            }
        }
    }

    // get items

    function items() {

        global $conn;

            $ip_add = getRealIpUser();

            $get_items = "select * from cart where ip_add='$ip_add'";

            $run_items = mysqli_query($conn, $get_items);

            $count_items = mysqli_num_rows($run_items);

            echo $count_items;
    }

    // get p_category
        function get_p_category() {

            global $conn;
            
                if (isset($_GET['product_category'])) {

                    $product_category_id = $_GET['product_category'];

                    $get_products = "select * from products where product_category_id='$product_category_id'";

                    $run_products = mysqli_query($conn, $get_products);

                    $count_product = mysqli_num_rows($run_products);

                    if ($count_product==0) {

                        echo "<script>alert('Sản phẩm đã hết!')</script>";

                    } else {

                        while ($row_products = mysqli_fetch_array($run_products)) {

                            $product_id = $row_products['product_id'];

                            $product_title = $row_products['product_title'];

                            $product_price = number_format($row_products['product_price']);

                            $product_image_1 = $row_products['product_image_1'];

                            $product_label = $row_products['product_label'];

                            $product_sale = $row_products['product_sale'];
                            
                            if ($product_label == 'new') {

                                $label = "<div class='new'>mới!</div>";

                            } else {

                                $label = "<div class='sale'>giảm giá!</div>";

                            }

                            if ($product_label == 'sale') {

                                $price = " 
                                    <p class='card__priceFinal'>$product_sale ₫</p>
                                    <p class='card__priceOriginal'>$product_price ₫</p>
                                ";

                            } else {

                                $price = "<p class='card__priceFinal'>$product_price ₫</p>";

                            } 
                        
                        echo "
                
                        <a href='details.php?product_id=$product_id' rel='noopenner' class='card'>

                        $label

                        <div class='card__image'>
                            <img src='admin/$product_image_1' alt=''>
                        </div>

                        <div class='card__content'>
                            <article class='card__text'>
                                <h2 class='card__title'>$product_title</h2>
                                <div class='card__price'>
                                    $price
                                </div>
                            </article>

                            <div class='card__icon'>
                                <p class='card__detail'>Chi tiết<span>+</span></p>
                                <button class='btn'><span>Xem</span></button>
                            </div>
                        </div>
                    </a>
                ";
                }
            }
        }
    }

    // get category
        function get_category() {

            global $conn;
            
                if (isset($_GET['category'])) {

                    $category_id = $_GET['category'];

                    $get_products = "select * from products where category_id='$category_id'";

                    $run_products = mysqli_query($conn, $get_products);

                    $count_product = mysqli_num_rows($run_products);

                    if ($count_product==0) {

                        echo "
                        <div class='popup'>
                            <div class='popup__content'>
                                <div class='popup__image'>
                                    <img src='assets/icon-location.svg' alt='>
                                </div>

                                <div class='popup__text'>
                                    <h4 class='popup__title'>Tạm thời hết hàng</h4>
                                    <p class='popup__desc'>Vui lòng chọn sản phẩm khác</p>
                                </div>
                                
                                <a href='shop.php' class='popup__btn'>Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        ";

                    } else {

                        while ($row_products = mysqli_fetch_array($run_products)) {

                            $product_id = $row_products['product_id'];

                            $product_title = $row_products['product_title'];

                            $product_price = $row_products['product_price'];

                            $product_image_1 = $row_products['product_image_1'];

                            $product_label = $row_products['product_label'];

                            $product_sale = $row_products['product_sale'];
                            
                            if ($product_label == 'new') {

                                $label = "<div class='new'>mới!</div>";

                            } else {

                                $label = "<div class='sale'>giảm giá!</div>";

                            }

                            if ($product_label == 'sale') {

                                $price = " 
                                    <p class='card__priceFinal'>$product_sale ₫</p>
                                    <p class='card__priceOriginal'>$product_price ₫</p>
                                ";

                            } else {

                                $price = "<p class='card__priceFinal'>$product_price ₫</p>";

                            } 
                        
                        echo "
                
                        <a href='details.php?product_id=$product_id' rel='noopenner' class='card'>

                        $label

                        <div class='card__image'>
                            <img src='admin/$product_image_1' alt=''>
                        </div>

                        <div class='card__content'>
                            <article class='card__text'>
                                <h2 class='card__title'>$product_title</h2>
                                <div class='card__price'>
                                    $price
                                </div>
                            </article>

                            <div class='card__icon'>
                                <p class='card__detail'>Chi tiết<span>+</span></p>
                                <button class='btn'><span>Xem</span></button>
                            </div>
                        </div>
                    </a>
                ";
                }
            }
        }
    }
            
?>