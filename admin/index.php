<?php

    session_start();

    include("includes/db.php");

    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($conn,$get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

            $admin_id = $row_admin['admin_id'];

            $admin_name = $row_admin['admin_name'];

            $admin_email = $row_admin['admin_email'];

            $admin_image = $row_admin['admin_image'];


        $get_products = "select * from products";

        $run_products = mysqli_query($conn,$get_products);

        $count_products = mysqli_num_rows($run_products);


        $get_customers = "select * from customers";

        $run_customers = mysqli_query($conn, $get_customers);

        $count_customers = mysqli_num_rows($run_customers);


        $get_product_category = "select * from product_categories";

        $run_product_category = mysqli_query($conn, $get_product_category);

        $count_product_category = mysqli_num_rows($run_product_category);
        

        $get_customer_orders = "select * from customer_orders";

        $run_customer_orders = mysqli_query($conn, $get_customer_orders);

        $count_customer_orders = mysqli_num_rows($run_customer_orders);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
            <?php 

                //dashboard

                if(isset($_GET['dashboard'])){

                    include("dashboard.php");

                }
                
                //products

                if(isset($_GET['insert_products'])){

                    include("insert_product.php");

                }
                
                if(isset($_GET['view_products'])){

                    include("view_products.php");

                }
                
                if(isset($_GET['delete_product'])){

                    include("delete_product.php");

                }
                
                if(isset($_GET['edit_product'])){

                    include("edit_product.php");

                }
                
                // product_categories
                
                if(isset($_GET['view_p_categories'])){

                    include("view_p_categories.php");

                }
                
                if(isset($_GET['insert_p_category'])){

                    include("insert_p_category.php");

                }
                
                if(isset($_GET['delete_p_cat'])){

                    include("delete_p_cat.php");

                }
                
                if(isset($_GET['edit_p_cat'])){

                    include("edit_p_cat.php");

                }
                
                // categories

                if(isset($_GET['view_cats'])){

                    include("view_cats.php");

                }
                
                if(isset($_GET['insert_cat'])){

                    include("insert_cat.php");

                }
                
                if(isset($_GET['edit_cat'])){

                    include("edit_cat.php");

                }
                
                if(isset($_GET['delete_cat'])){

                    include("delete_cat.php");

                }
                
                // slides
                
                if(isset($_GET['insert_slide'])){

                    include("insert_slide.php");

                }
                
                if(isset($_GET['view_slides'])){

                    include("view_slides.php");

                }
                
                if(isset($_GET['delete_slide'])){

                    include("delete_slide.php");

                }
                
                if(isset($_GET['edit_slide'])){

                    include("edit_slide.php");

                }
                
                // coupons
                
                if(isset($_GET['insert_coupon'])){

                    include("insert_coupon.php");

                }
                
                if(isset($_GET['view_coupons'])){

                    include("view_coupons.php");

                }
                
                if(isset($_GET['delete_coupon'])){

                    include("delete_coupon.php");

                }
                
                if(isset($_GET['edit_coupon'])){

                    include("edit_coupon.php");

                }

                // customers

                if(isset($_GET['view_customers'])){

                    include("view_customers.php");

                }
                
                if(isset($_GET['delete_customer'])){

                    include("delete_customer.php");

                }

                // order
                
                if(isset($_GET['view_orders'])){

                    include("view_orders.php");

                }

                if(isset($_GET['view_order_detail'])){

                    include("view_order_detail.php");

                }
                
                if(isset($_GET['delete_order'])){

                    include("delete_order.php");

                }
                
                if(isset($_GET['confirm_delivering'])){

                    include("confirm_delivering.php");

                }
                
                if(isset($_GET['confirm_delivered'])){

                    include("confirm_delivered.php");

                }
                
                if(isset($_GET['confirm_yes'])){

                    include("confirm_yes.php");

                }
                
                if(isset($_GET['confirm_no'])){

                    include("confirm_no.php");

                }

                // user admin
                
                if(isset($_GET['view_users'])){

                    include("view_users.php");

                }
                
                if(isset($_GET['delete_user'])){

                    include("delete_user.php");

                }
                
                if(isset($_GET['user_profile'])){

                    include("user_profile.php");

                }
                
                if(isset($_GET['insert_user'])){

                    include("insert_user.php");

                }

                // CSS Editor

                if(isset($_GET['edit_css'])){

                    include("edit_css.php");

                }


            ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>

<?php } ?>