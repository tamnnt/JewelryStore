<?php

    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
?>
<?php

    if (isset($_GET['edit_coupon'])) {

        $edit_coupon_id = $_GET['edit_coupon'];

        $get_coupons = "select * from coupons where coupon_id='$edit_coupon_id'";

        $run_coupons = mysqli_query($conn, $get_coupons);
    
        $row_coupons = mysqli_fetch_array($run_coupons);
    
            $coupon_id = $row_coupons['coupon_id'];
    
            $coupon_product_id = $row_coupons['product_id'];
    
            $coupon_title = $row_coupons['coupon_title'];
    
            $coupon_price = $row_coupons['coupon_price'];
    
            $coupon_code = $row_coupons['coupon_code'];
    
            $coupon_limit = $row_coupons['coupon_limit'];
    
            $coupon_used = $row_coupons['coupon_used'];

            $get_product = "select * from products where product_id='$coupon_product_id'";

            $run_product = mysqli_query($conn, $get_product);

            $row_product = mysqli_fetch_array($run_product);

                $product_id = $row_product['product_id'];

                $product_title = $row_product['product_title'];


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Chèn mã giảm giá </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Chèn mã giảm giá
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Chèn Mã Giảm Giá
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tiêu đề </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_title" type="text" class="form-control" value="<?php echo $coupon_title; ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giá </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_price" type="text" class="form-control" value="<?php echo $coupon_price; ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giới hạn </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_limit" type="number" class="form-control" value="<?php echo $coupon_limit; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Chọn Sản Phẩm </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                        <select name="product_id" class="form-control" required>

                            <option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>

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
                          
                          <input name="coupon_code" type="text" class="form-control" value="<?php echo $coupon_code; ?>"required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Cập Nhật" type="submit" class="btn btn-primary form-control">
                          
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

    if (isset($_POST['update'])) {

        $coupon_title = $_POST['coupon_title'];

        $coupon_price = $_POST['coupon_price'];

        $coupon_product_id = $_POST['product_id'];

        $coupon_code = $_POST['coupon_code'];

        $coupon_limit = $_POST['coupon_limit'];

        $get_coupons = "select * from coupons where coupon_code='$coupon_code'";

        $run_coupons = mysqli_query($conn, $get_coupons);

        $check_coupons = mysqli_num_rows($run_coupons);

        if ($check_coupons == 1) {

            echo "<script>alert('Mã giảm giá được sử dụng, vui lòng chọn mã giảm giá khác')</script>";

        } else {

            $update_coupon = "update coupons set product_id='$coupon_product_id', coupon_title='$coupon_title', coupon_price='$coupon_price', coupon_code='$coupon_code', coupon_limit='$coupon_limit', coupon_used='$coupon_used' where coupon_id='$edit_coupon_id'";

            
            $run_coupon = mysqli_query($conn, $update_coupon);

            if ($run_coupon) {

                echo "<script>alert('Cập Nhật Thành Công')</script>";

                echo "<script>window.open('index.php?view_coupons')</script>";

            }

        }

    }

?>

<?php } ?>