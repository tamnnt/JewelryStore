<?php

    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
?>

<?php

    if (isset($_GET['edit_product'])){

        $edit_id = $_GET['edit_product'];

        $get_p = "select * from products where product_id='$edit_id'";

        $run_edit =mysqli_query($conn, $get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];

        $p_title = $row_edit['product_title'];

        $p_cat = $row_edit['product_category_id'];
        
        $cat = $row_edit['category_id'];

        $p_image1 = $row_edit['product_image_1'];

        $p_image2 = $row_edit['product_image_2'];

        $p_image3 = $row_edit['product_image_3'];

        $p_price = $row_edit['product_price'];

        $p_keywords = $row_edit['product_keywords'];

        $p_desc = $row_edit['product_description'];

        $p_label = $row_edit['product_label'];

        $p_sale = $row_edit['product_sale'];

        $p_total = $row_edit['product_total'];

    }

        $get_p_cat = "select * from product_categories where product_category_id='$p_cat'";

        $run_p_cat = mysqli_query($conn, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['product_category_title'];

        $p_cat_desc = $row_p_cat['product_category_desc'];


        $get_cat = "select *from categories where category_id='$cat'";

        $run_cat = mysqli_query($conn, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $cat_title = $row_cat['category_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Chỉnh sửa sản phẩm
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Chỉnh sửa sản phẩm
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tiêu đề </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Danh mục sản phẩm </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value ="<?php echo $p_cat;?>"> <?php echo $p_cat_title;?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";

                              $run_p_cats = mysqli_query($conn, $get_p_cats);
                              
                              while ($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['product_category_id'];

                                  $p_cat_title = $row_p_cats['product_category_title'];
                                  
                                  echo "
                                  
                                    <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Thể loại </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                        <select name="cat" class="form-control" require><!-- form-control Begin -->
                              
                            <option value ="<?php echo $cat;?>"> <?php echo $cat_title;?> </option>
                              
                            <?php 
                              
                            $get_cat = "select * from categories";

                            $run_cat = mysqli_query($conn, $get_cat);
                              
                             while ($row_cat = mysqli_fetch_array($run_cat)) {
                                  
                                $cat_id = $row_cat['category_id'];

                                $cat_title = $row_cat['category_title'];
                                  
                                echo "
                                  
                                    <option value='$cat_id'> $cat_title </option>
                                  
                                ";
                                  
                              }
                              
                            ?>
                              
                        </select><!-- form-control Finish -->
                          
                    </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control">
                          <br>

                          <img src="<?php echo $p_image1; ?>" width="15%" alt="<?php echo $p_image1;?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          <br>

                          <img src="<?php echo $p_image2; ?>" width="15%" alt="<?php echo $p_image2;?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          <br>

                          <img src="<?php echo $p_image3; ?>" width="15%" alt="<?php echo $p_image3;?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Nhãn Sản Phẩm</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                        <select name="product_label" class="form-control" require><!-- form-control Begin -->
                              
                            <option value ="<?php echo $p_label;?>">
                            <?php
                            
                              if ($p_label == "new") {
                                  
                                echo "Mới";

                              } else {

                                echo "Giảm Giá";

                              }
                            
                            ?>
                            </option>
                            <option value='new'>Mới</option>
                            <option value='sale'>Giảm Giá</option>
                                  
                        </select><!-- form-control Finish -->
                          
                    </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Giá</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" value ="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Giá giảm</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_sale" type="text" class="form-control" value ="<?php echo $p_sale; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Từ khóa Sản phẩm </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value ="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Mô tả Sản phẩm</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                          
                            <?php echo $p_desc; ?>
                          
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tổng số lượng </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_total" type="number" value ="<?php echo $p_total; ?>" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Cập nhật sản phẩm" type="submit" class="btn btn-primary form-control">
                          
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

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_label = $_POST['product_label'];
    $product_sale = $_POST['product_sale'];
    $product_total = $_POST['product_total'];

    $image_path = "product_images/";
    $product_img1 = $image_path . basename($_FILES['product_img1']['name']);
    $product_img2 = $image_path . basename($_FILES['product_img2']['name']);
    $product_img3 = $image_path . basename($_FILES['product_img3']['name']);

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    if ($temp_name1=='' AND $temp_name2=='' AND $temp_name3=='') {

        $update_product = "update products set product_category_id='$product_cat', category_id='$cat', date=NOW(), product_title='$product_title',
        product_keywords='$product_keywords',product_description='$product_desc',product_price='$product_price', product_label='$product_label', product_sale='$product_sale', product_total='$product_total' where product_id='$p_id'";
    
        $run_product = mysqli_query($conn, $update_product);
    
        if ($run_product) {
    
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('index.php?view_products','_self')</script>";
    
        }

        exit();

    }

    if ($temp_name1!=='' AND $temp_name2!=='' AND $temp_name3!=='') {

        move_uploaded_file($temp_name1, "$product_img1");
        move_uploaded_file($temp_name2, "$product_img2");
        move_uploaded_file($temp_name3, "$product_img3");

        unlink($p_image1);
        unlink($p_image2);
        unlink($p_image3);

        $update_product = "update products set product_category_id='$product_cat', category_id='$cat', date=NOW(), product_title='$product_title', product_image_1='$product_img1', product_image_2='$product_img2', product_image_3='$product_img3',
        product_keywords='$product_keywords',product_description='$product_desc',product_price='$product_price', product_label='$product_label', product_sale='$product_sale' where product_id='$p_id'";
    
        $run_product = mysqli_query($conn, $update_product);
    
        if ($run_product) {
    
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('index.php?view_products','_self')</script>";
    
        }

        exit();

    }


    if ($temp_name1=='' AND $temp_name2=='') {

        move_uploaded_file($temp_name3, "$product_img3");

        unlink($p_image3);

        $update_product = "update products set product_category_id='$product_cat', category_id='$cat', date=NOW(), product_title='$product_title', product_image_3='$product_img3',
        product_keywords='$product_keywords',product_description='$product_desc',product_price='$product_price', product_label='$product_label', product_sale='$product_sale' where product_id='$p_id'";
    
        $run_product = mysqli_query($conn, $update_product);
    
        if ($run_product) {
    
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('index.php?view_products','_self')</script>";
    
        }

        exit();

    }

    if ($temp_name1=='' AND $temp_name3=='') {

        move_uploaded_file($temp_name2, "$product_img2");

        unlink($p_image2);

        $update_product = "update products set product_category_id='$product_cat', category_id='$cat', date=NOW(), product_title='$product_title', product_image_2='$product_img2',
        product_keywords='$product_keywords',product_description='$product_desc',product_price='$product_price', product_label='$product_label', product_sale='$product_sale' where product_id='$p_id'";
    
        $run_product = mysqli_query($conn, $update_product);
    
        if ($run_product) {
    
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('index.php?view_products','_self')</script>";
    
        }

        exit();

    }

    if ($temp_name2=='' AND $temp_name3=='') {

        move_uploaded_file($temp_name1, "$product_img1");unlink($p_image1);

        unlink($p_image1);

        $update_product = "update products set product_category_id='$product_cat', category_id='$cat', date=NOW(), product_title='$product_title', product_image_1='$product_img1',
        product_keywords='$product_keywords',product_description='$product_desc',product_price='$product_price', product_label='$product_label', product_sale='$product_sale' where product_id='$p_id'";
    
        $run_product = mysqli_query($conn, $update_product);
    
        if ($run_product) {
    
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('index.php?view_products','_self')</script>";
    
        }

        exit();

    }

}

?>

<?php } ?>