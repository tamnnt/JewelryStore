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
    <title> Thêm sản phẩm </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Thêm sản phẩm
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Thêm Sản Phẩm
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tiêu đề </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Danh mục</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_category" class="form-control"><!-- form-control Begin -->
                              
                              <option disabled selected> Danh mục sản phẩm</option>
                              
                              <?php 
                              
                              $get_product_categories = "select * from product_categories";

                              $run_product_categories = mysqli_query($conn, $get_product_categories);
                              
                              while ($row_product_categories = mysqli_fetch_array($run_product_categories)) {
                                  
                                  $product_category_id = $row_product_categories['product_category_id'];

                                  $product_category_title = $row_product_categories['product_category_title'];
                                  
                                  echo "
                                  
                                  <option value='$product_category_id'> $product_category_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Thể loại </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="category" class="form-control"><!-- form-control Begin -->
                              
                              <option disabled selected>Thể loại</option>
                              
                              <?php 
                              
                              $get_categories = "select * from categories";

                              $run_categories = mysqli_query($conn, $get_categories);
                              
                              while ($row_categories = mysqli_fetch_array($run_categories)) {
                                  
                                  $category_id = $row_categories['category_id'];

                                  $category_title = $row_categories['category_title'];
                                  
                                  echo "
                                  
                                  <option value='$category_id'> $category_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_image_1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_image_2" type="file" class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_image_3" type="file" class="form-control form-height-custom">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Nhãn Sản Phẩm</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_label" class="form-control"><!-- form-control Begin -->
                              
                            <option disabled selected>Nhãn Sản Phẩm</option>
                            <option value='new'>Mới</option>
                            <option value='sale'>Giảm Giá</option>

                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giá </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Giá giảm </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_sale" type="text" value="0" class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Từ khóa </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Mô tả </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_description" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tổng số lượng </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_total" type="number" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Thêm Sản Phẩm" type="submit" class="btn btn-primary form-control">
                          
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

    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $category = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_description = $_POST['product_description'];
    $product_label = $_POST['product_label'];
    $product_sale = $_POST['product_sale'];
    $product_total = $_POST['product_total'];

    $image_path = "product_images/";
    $product_image_1 = $image_path . basename($_FILES['product_image_1']['name']);
    $product_image_2 = $image_path . basename($_FILES['product_image_2']['name']);
    $product_image_3 = $image_path . basename($_FILES['product_image_3']['name']);

    $temp_name1 = $_FILES['product_image_1']['tmp_name'];
    $temp_name2 = $_FILES['product_image_2']['tmp_name'];
    $temp_name3 = $_FILES['product_image_3']['tmp_name'];

    move_uploaded_file($temp_name1, "$product_image_1");
    move_uploaded_file($temp_name2, "$product_image_2");
    move_uploaded_file($temp_name3, "$product_image_3");

    $insert_product = "insert into products (product_category_id, category_id, date, product_title, product_image_1, product_image_2, product_image_3, product_price, product_keywords, product_description, product_label, product_sale, product_total)
                                     values ('$product_category', '$category', NOW(), '$product_title', '$product_image_1', '$product_image_2', '$product_image_2', '$product_price', '$product_keywords', '$product_description', '$product_label', '$product_sale', '$product_total')";
    
    $run_product = mysqli_query($conn, $insert_product);

    if($run_product) {

        echo "<script>alert('Sản Phẩm Đã Được Thêm')</script>";
        
        echo "<script>window.open('index.php?view_products', '_self')</script>";
    }
}

?>

<?php } ?>