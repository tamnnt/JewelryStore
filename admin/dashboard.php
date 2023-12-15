<?php

    if (!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";

    } else {

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Bảng điều khiển </h1>
        
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Bảng điều khiển
            
            </li>
        </ol>
        
    </div>
</div>
<!--row-->
<div class="row">
    <!--cac san pham-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="row">

                    <div class="col-xs-3"><i class="fa fa-tasks fa-5x"></i></div>
                    
                    <div class="col-xs-9 text-right">

                        <div class="huge"><?php echo $count_products; ?></div>
                           
                        <div>Quản lý sản phẩm</div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_products">
                <div class="panel-footer">
                   
                    <span class="pull-left">Xem chi tiết</span>
                    
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    <!--end cac san pham-->

    <!--Khách hàng-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
                    
                    <div class="col-xs-9 text-right">

                        <div class="huge"> <?php echo $count_customers; ?> </div>
                           
                        <div>Quản lý Khách hàng</div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_customers">
                <div class="panel-footer">
                   
                    <span class="pull-left">Xem chi tiết</span>
                    
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    <!--end Khách hàng-->
   
    <!--Danh mục sản phẩm-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="fa fa-tags fa-5x"></i></div>
                    
                    <div class="col-xs-9 text-right">

                        <div class="huge"> <?php echo $count_product_category; ?> </div>
                           
                        <div>Quản lý Danh mục sản phẩm</div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_p_categories">
                <div class="panel-footer">
                   
                    <span class="pull-left">Xem chi tiết</span>
                    
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    <!--end Danh mục sản phẩm-->

    <!--Đơn đặt hàng-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="fa fa-shopping-cart fa-5x"></i></div>
                    
                    <div class="col-xs-9 text-right">

                        <div class="huge"> <?php echo $count_customer_orders; ?> </div>
                           
                        <div>Quản lý Đơn đặt hàng</div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?view_orders">
                <div class="panel-footer">
                   
                    <span class="pull-left">Xem chi tiết</span>
                    
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    <!--end Đơn đặt hàng-->
    <?php  
        $total = 0;         
        $get_orders = "select * from customer_orders WHERE order_status = 'Complete'";

        $run_orders = mysqli_query($conn, $get_orders);

        while ($row_order=mysqli_fetch_array($run_orders)){
            $order_amount = $row_order['due_amount'];
            $total+=$order_amount;
        }
    
    ?>
    <!Tổng Danh thu-->
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-orange">
            
            <div class="panel-heading" style="display: flex; justify-content: center">
                <div class="row">
                    <div class="col-xs-9 text-center">

                        <div style="font-size: 24px">Tổng danh thu</div>
                        <div class="huge"> <?php echo number_format($total) ?> VNĐ </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!--end Tổng Danh thu-->
    
</div>
<!--end row-->

<!--row 2-->
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Đơn hàng mới </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <!--table-->
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                          
                            <tr>
                                <th>STT</th>
                                <th>ID Đặt Hàng</th>
                                <th>Địa Chỉ Email</th>
                                <th>Số Hoá Đơn</th>
                                <th>ID Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Kích thước</th>
                                <th>Trạng Thái</th>
                            </tr>
                            
                        </thead>
                        
                        <tbody>

                            <?php
                            
                                $i=0;

                                $get_orderSingle = "SELECT DISTINCT invoice_no FROM customer_orders  ORDER BY invoice_no ASC LIMIT 0,5";

                                $run_orderSingle = mysqli_query($conn, $get_orderSingle);

                                while ($row_orderSingle = mysqli_fetch_array($run_orderSingle)){
                                    
                                    $invoice_no  = $row_orderSingle['invoice_no'];
                                    $get_order = "SELECT * FROM customer_orders WHERE invoice_no = '$invoice_no' ORDER BY invoice_no ASC LIMIT 0,5";
                                    $run_order = mysqli_query($conn, $get_order);

                                    while ($row_order = mysqli_fetch_array($run_order)) {

                                        $order_id = $row_order['order_id'];
    
                                        $customer_id = $row_order['customer_id'];
    
                                        $product_id  = $row_order['product_id'];
    
                                        $product_quantity = $row_order['product_quantity'];
    
                                        $product_size = $row_order['product_size'];
    
                                        $order_status = $row_order['order_status'];
                                    }
                                    
                                    $i++;
                                    ?>
                           
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $order_id; ?></td>
                                <td> 
                                
                                    <?php
                                    
                                        $get_customer = "select * from customers where customer_id='$customer_id'";

                                        $run_customer = mysqli_query($conn, $get_customer);

                                        $row_customer = mysqli_fetch_array($run_customer);

                                        $customer_email = $row_customer['customer_email'];

                                        echo $customer_email;
                                    
                                    ?>
                                
                                </td>
                                <td><a href="index.php?view_order_detail=<?php echo $invoice_no; ?>"><?php echo $invoice_no; ?></a></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $product_quantity; ?></td>
                                <td><?php echo $product_size; ?></td>
                                <td> 
                                    <?php 

                                        if ($order_status=='Pending'){

                                            echo $order_status='Đang Chờ Xử Lý';

                                        } else {

                                            echo $order_status='Đã Thanh Toán';

                                        }

                                    ?> 
                                </td>
                                
                            </tr>
                                    
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                    <!--end table-->
                </div>
                
                <div class="text-right">
                    
                    <a href="index.php?view_orders"> Xem tất cả các đơn đặt hàng <i class="fa fa-arrow-circle-right"></i></a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    <!--user admin info-->
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">

                    <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">
                    
                    <div class="thumb-info-title">
                       
                        <span class="thumb-info-inner"> <?php echo $admin_name; ?></span>
                        
                    </div>

                </div>

                <br>
                <!--
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Quốc Gia: </span> <?php echo $admin_country; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Liên Lạc: </span> <?php echo $admin_contact; ?> <br/>
                    </div>
                    
                    <hr class="dotted short">
                    
                    <h5 class="text-muted">Về tôi</h5>
                    
                    <p><?php echo $admin_about; ?></p>
                    
                </div>
                
            </div>
        </div>
    </div>-->
    <!--end user admin info-->
</div>
<!--end row 2-->

<?php } ?>