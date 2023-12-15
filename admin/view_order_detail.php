<?php 
    
    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

        
?>

<div class="row">

    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem đơn hàng
                
            </li>
        </ol>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="color: #d53d3d; font-size: 16px">
                    <?php 
                      if (isset($_GET['view_order_detail'])) {
                          $invoice_no = $_GET['view_order_detail'];
                          echo "<i class='fa fa-tags'></i> Chi tiết đơn hàng: <span style='color: black'>$invoice_no</span>";
                        } 
                      
                      ?>
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <!--table-->
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th> Địa Chỉ Email </th>
                                <!-- <th> Số Hoá Đơn </th> -->
                                <th> Tên Sản phẩm </th>
                                <th style="width: 20px"> Số Lượng </th>
                                <th> Kích Cở </th>
                                <th> Ngày </th>
                                <th> Tổng </th>
                                <th> Xoá </th>
                                <th> Trạng Thái </th>
                                <th>Xác nhận trang thái đơn</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 

                                if (isset($_GET['view_order_detail'])) {
                                  $view_order_detail = $_GET['view_order_detail'];

                                  $i=0;
                                  $total_amount = 0;
                              
                                  $get_orders = "SELECT * from customer_orders WHERE invoice_no = '$view_order_detail'";
                                  
                                  $run_orders = mysqli_query($conn, $get_orders);
            
                                  while ($row_order=mysqli_fetch_array($run_orders)){
                                      
                                      $order_id = $row_order['order_id'];
                                      
                                      $customer_id = $row_order['customer_id'];
                                      
                                      $order_amount = number_format((float)$row_order['due_amount']);
                                      
                                      $total_amount += $row_order['due_amount'];
                                      
                                      $invoice_no = $row_order['invoice_no'];
                                      
                                      $product_id = $row_order['product_id'];
                                      
                                      $product_size = $row_order['product_size'];
                                      
                                      $product_quantity = $row_order['product_quantity'];
                                      
                                      $order_date = $row_order['order_date'];
                                      
                                      $order_status = $row_order['order_status'];
                                      
                                      $get_products = "select * from products where product_id='$product_id'";
                                      
                                      $run_products = mysqli_query($conn, $get_products);
                                      
                                      $row_products = mysqli_fetch_array($run_products);
                                      
                                          $product_title = $row_products['product_title'];
                                      
                                      $get_customer = "select * from customers where customer_id='$customer_id'";
                                      
                                      $run_customer = mysqli_query($conn, $get_customer);
                                      
                                      $row_customer = mysqli_fetch_array($run_customer);
                                      
                                          $customer_email = $row_customer['customer_email'];
                                      
                                      $i++;
          
                            
                            ?>
                            
                            <tr>

                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $product_quantity; ?></td>
                                <td> <?php echo $product_size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?>₫</td>
                                <td>
                                    
                                    <span class="wrapperDelete">
                                        <a class="tableDelete" href="index.php?delete_order=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>">
                                
                                            <i class="fa fa-trash-o"></i>

                                            <div class="tooltip">Không thể khôi phục khi nhấn</div>
                                        </a>

                                    </span>
                                     
                                </td>
                                <td style="color: blue;">
                                    
                                    <?php 
                                    
                                        if($order_status == 'Pending') {
                                            
                                            echo $order_status = "<span style='color:#000000; font-size: 18px'>Chờ xác nhận</span>";
                                            
                                        } else if ($order_status == 'Delivering') {
                                          echo $order_status =  "<span style='color:#cb456d; font-size: 18px'>Đang giao</span>";
                                        }
                                        else if ($order_status == 'Delivered') {
                                          echo $order_status = "<span style='color:#00cc07; font-size: 18px'>Đã giao</span>";
                                        } else {
                                            
                                            echo $order_status = "<span style='color:#0088cc; font-size: 18px'>Đã xác nhận</span>";
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td>
                                  <a href="index.php?confirm_yes=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>" class="btn btn-primary btn-sm btn-confim"> Xác nhận</a>
                                  <a href="index.php?confirm_no=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>" class="btn btn-primary btn-sm"> Huỷ xác nhận </a>
                                  <a href="index.php?confirm_delivering=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>" style="background: #cb456d; " class="btn btn-primary btn-sm btn-confim"> Đang giao</a>
                                  <a href="index.php?confirm_delivered=<?php echo $order_id; ?>&invoice_no=<?php echo $invoice_no; ?>" style="background: #00cc07" class="btn btn-primary btn-sm btn-confim"> Đã giao</a>
                                </td>

                            </tr>
                            
                            <?php } } ?>
                            
                        </tbody>
                        
                    </table>
                    <!--end table-->
                    <?php 
                    $total_amount = number_format((float)$total_amount);
                    echo "<h4 style='color: #48be50'>Tổng tiền đơn hàng là: $total_amount VNĐ</h4>"
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>