<?php

    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Thêm mã giảm giá </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Thêm mã giảm giá
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Thêm Mã Giảm Giá
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tiêu đề </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giá </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giới hạn </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_limit" type="number" class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Chọn Sản Phẩm </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                        <select name="product_id" class="form-control" required>

                            <option selected disabled>Chọn Sản Phẩm</option>

                            <?php

                                $get_products = "select * from products";

                                $run_products = mysqli_query($conn, $get_products);

                                while ($row_products = mysqli_fetch_array($run_products)) {

                                    $product_id = $row_products['product_id'];

                                    $product_title = $row_products['product_title'];

                                    echo "<option value='$product_id'>$product_title</option>";
                                }
                            
                            ?>

                        </select>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Mã Giảm Giá</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_code" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Thêm Mã Giảm Giá" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php

    if (isset($_POST['submit'])) {

        $coupon_title = $_POST['coupon_title'];

        $coupon_price = $_POST['coupon_price'];

        $coupon_product_id = $_POST['product_id'];

        $coupon_code = $_POST['coupon_code'];

        $coupon_limit = $_POST['coupon_limit'];

        $coupon_used = 0;

        $get_coupons = "select * from coupons where product_id='$coupon_product_id' or coupon_code='$coupon_code'";

        $run_coupons = mysqli_query($conn, $get_coupons);

        $check_coupons = mysqli_num_rows($run_coupons);

        if ($check_coupons == 1) {

            echo "<script>alert('Mã giảm giá hoặc sản phẩm là được sử dụng, vui lòng chọn mã giảm giá hoặc sản phẩm khác')</script>";

        } else {

            $insert_coupon = "insert into coupons (product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
                                value ('$coupon_product_id', '$coupon_title', '$coupon_price', '$coupon_code', '$coupon_limit', '$coupon_used')";

            
            $run_coupon = mysqli_query($conn, $insert_coupon);

            if ($run_coupon) {

                echo "<script>alert('Đã Thêm Thành Công')</script>";

                echo "<script>window.open('index.php?view_coupons')</script>";

            }

        }

    }

?>

<?php } ?>