<?php 
    
    if (!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem danh mục sản phẩm
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Xem danh mục sản phẩm
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="width: 20px">ID</th>
                                <th style="width: 150px">Tiêu đề</th>
                                <th>Mô tả</th>
                                <th style="width: 40px">Sửa</th>
                                <th style="width: 40px">Xóa</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                            
                                $i=0;
          
                                $get_p_categories = "select * from product_categories order by 1 DESC";
          
                                $run_p_categories = mysqli_query($conn, $get_p_categories);
          
                                while ($row_categories = mysqli_fetch_array($run_p_categories)) {
                                    
                                    $product_category_id = $row_categories['product_category_id'];
                                    
                                    $product_category_title = $row_categories['product_category_title'];
                                    
                                    $product_category_desc = $row_categories['product_category_desc'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td><?php echo $i; ?></td>
                                <td><?php echo $product_category_title; ?></td>
                                <td width="300"><?php echo $product_category_desc; ?></td>
                                <td> 
                                    <a href="index.php?edit_p_cat=<?php echo $product_category_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <span class="wrapperDelete">
                                        <a class="tableDelete" href="index.php?delete_p_cat=<?php echo $product_category_id; ?>">
                                
                                            <i class="fa fa-trash-o"></i>

                                            <div class="tooltip">Không thể khôi phục khi nhấn</div>
                                        </a>

                                    </span>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                        
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>