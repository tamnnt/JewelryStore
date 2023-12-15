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
                <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i> Xem tất cả đơn hàng
                
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
                                <th> Số Hoá Đơn </th>
                                <th> Tên Sản phẩm </th>
                                <th style="width: 20px"> Số Lượng </th>
                                <th> Kích Cở </th>
                                <th> Ngày </th>
                                <th> Tổng </th>
                                <th> Trạng Thái </th>
                                <th> Xem đơn hàng</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                                $i=0;

                                $get_orderSingle = "SELECT DISTINCT invoice_no FROM customer_orders ORDER BY invoice_no ASC";

                                $run_orderSingle = mysqli_query($conn, $get_orderSingle);

                                while ($row_orderSingle = mysqli_fetch_array($run_orderSingle)){
                                    
                                    $invoice_no  = $row_orderSingle['invoice_no'];
                                    $get_order = "SELECT * FROM customer_orders WHERE invoice_no = '$invoice_no' ORDER BY invoice_no ASC";
                                    $run_order = mysqli_query($conn, $get_order);

                                    while ($row_order = mysqli_fetch_array($run_order)) {
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $customer_id = $row_order['customer_id'];
                                    
                                    $order_amount = number_format((float)$row_order['due_amount']);
                                    
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
                                }
                            
                            ?>
                            
                            <tr>

                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td><a href="index.php?view_order_detail=<?php echo $invoice_no; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $product_quantity; ?></td>
                                <td> <?php echo $product_size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?>₫</td>
                                <td>
                                    
                                    <?php 
                                    
                                    if($order_status == 'Pending') {
                                        
                                        echo $order_status = 'Đang Chờ Xử Lý';
                                        
                                    } else if ($order_status == 'Delivering') {
                                      echo $order_status = 'Đang giao';
                                    } else {
                                        
                                        echo $order_status = 'Đã Thanh Toán';
                                        
                                    }
                                    
                                    ?>
                                    
                                </td>
                                <td><a href="index.php?view_order_detail=<?php echo $invoice_no; ?>" class="btn btn-primary btn-sm btn-confim">Xem đơn hàng</a></td>

                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                    <!--end table-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>