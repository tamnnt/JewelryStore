
<div class="mainTable">
    <h3 class="section-title"><b>Đơn</b><span>Hàng</span></h3>
    <table>
        <!--thead-->
        <thead>
    
            <tr>
                <th colspan="2">Sản Phẩm</th>
                <th>Tiền đến hạn</th>
                <th>Số hóa đơn</th>
                <th>Số lượng</th>
                <th>Kích cở</th>
                <th>Ngày</th>
                <th>Thanh toán</th>
            </tr>
    
        </thead>
        <!--end thead-->
    
        <!--tbody-->
        <tbody>
        <?php

            $session_email = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$session_email'";

            $run_customer = mysqli_query($conn, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['customer_id'];

            $get_orders = "select * from customer_orders where customer_id='$customer_id' order by 1 DESC";

            $run_orders = mysqli_query($conn, $get_orders);

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['order_id'];

                $due_amount = number_format((float)$row_orders['due_amount']);

                $invoice_no = $row_orders['invoice_no'];

                $product_id = $row_orders['product_id'];

                $product_size = $row_orders['product_size'];

                $product_quantity = $row_orders['product_quantity'];

                $order_date = $row_orders['order_date'];

                $order_status = $row_orders['order_status'];

                $get_products = "select * from products where product_id='$product_id'";

                $run_products = mysqli_query($conn, $get_products);
                
                while ($row_products = mysqli_fetch_array($run_products)) {

                    $product_title = $row_products['product_title'];

                    $product_image_1 = $row_products['product_image_1'];

        
        ?>
            <tr>
                <td><img class="table__image" src="../admin/<?php echo $product_image_1; ?>" alt=""></td>
                <td><a class="table__title" href="../details.php?product_id=<?php echo $product_id; ?>" target="_blank"><?php echo $product_title; ?></a></td>
                <td><?php echo $due_amount; ?>₫</td>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $product_quantity; ?></td>
                <td><?php echo $product_size; ?></td>
                <td><?php echo $order_date; ?></td>
                <td>
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
            </tr>

        <?php } } ?>
        </tbody>

    </table>
    
</div>