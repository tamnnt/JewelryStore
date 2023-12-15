<?php

    session_set_cookie_params('86400');
    session_start();
    include("../includes/db.php");
    include("../functions/functions.php");

?>

<?php

    if (!isset($_SESSION['customer_email'])) {

        echo "<script>window.open('customer/login.php','self')</script>";
        
    } else {

    
?>

<?php

    if ($_GET['vnp_ResponseCode'] === "00") {

        $session_email = $_SESSION['customer_email'];
    
        $get_customer = "select * from customers where customer_email='$session_email'";
    
        $run_customer = mysqli_query($conn, $get_customer);
    
        $row_customer = mysqli_fetch_array($run_customer);
    
        $customer_id = $row_customer['customer_id'];
    
        $ip_add = getRealIpUser();
    
        $status = "Complete";
    
        $invoice_no = mt_rand();
    
        $get_cart = "select * from cart where ip_add='$ip_add'";
    
        $run_cart = mysqli_query($conn, $get_cart);
    
        while ($row_cart = mysqli_fetch_array($run_cart)) {
    
            $product_id = $row_cart['product_id'];
    
            $product_size = $row_cart['p_size'];
    
            $product_quantity = $row_cart['p_quantity'];
    
            $product_price = $row_cart['p_price'];
    
            $get_products = "select * from products where product_id='$product_id'";
    
            $run_products = mysqli_query($conn, $get_products);
    
            while ($row_products = mysqli_fetch_array($run_products)) {
    
                $sub_total = $product_price*$product_quantity;
    
                $insert_customer_order = "insert into customer_orders (customer_id, due_amount, invoice_no, product_id, product_size, product_quantity, order_date, order_status)
                
                                                                values ('$customer_id','$sub_total', '$invoice_no', '$product_id', '$product_size', '$product_quantity', NOW(), '$status')";
    
                $run_customer_order = mysqli_query($conn, $insert_customer_order);
    
                $delete_cart = "delete from cart where ip_add='$ip_add'";
    
                $run_delete = mysqli_query($conn, $delete_cart);
    
                $update_total = "update products set product_total=product_total-$product_quantity where product_id='$product_id'";
                
                $run_update_total = mysqli_query($conn, $update_total);
            }
    
        }
    } else {
        echo "<script>window.open('http://localhost/bantrangsuc/cart.php','self')</script>";
    }


?>

<?php } ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="http://localhost/bantrangsuc/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="http://localhost/bantrangsuc/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="http://localhost/bantrangsuc/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                    <br>
                    <a style="font-size:24px" href="http://localhost/bantrangsuc/customer/my_account.php?my_orders">Xem Lịch Sử Đơn Hàng Của Bạn</a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>

            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
