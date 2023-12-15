<?php

    session_set_cookie_params('86400');
    session_start();
    include("../includes/db.php");
    include("../functions/functions.php");

?>

<?php

    $session_email = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$session_email'";

    $run_customer = mysqli_query($conn, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];

    $customer_name = $row_customer['customer_name'];

    $customer_email = $row_customer['customer_email'];

    $customer_phone = $row_customer['customer_phone'];

    $customer_address = $row_customer['customer_address'];

    $customer_image_origin = $row_customer['customer_image'];
            
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="http://localhost/bantrangsuc/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="http://localhost/bantrangsuc/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="http://localhost/bantrangsuc/vnpay_php/assets/jquery-1.11.3.min.js"></script>
        <style>
            table {
                width: 100%;
                padding-top: 30px;
                border-collapse: collapse;
                border: 2px solid #d3dae0;
            }
            }
        </style>
    </head>

    <body>
        
        <?php require_once("./config.php"); ?>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <div class="mainTable">
            <div class="wrapper_title">
                <h3 class="section-title">Đơn Hàng</h3>
            </div>
            <table>
                <!--thead-->
                <thead>

                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn Giá</th>
                        <th style="text-align: center">Số Lượng</th>
                    </tr>

                </thead>
                <!--end thead-->

                <!--tbody-->
                <tbody>
                    
                    <?php
                    
                        $ip_add = getRealIpUser();

                        $get_cart = "select * from cart where ip_add='$ip_add'";

                        $run_cart = mysqli_query($conn, $get_cart);

                        $total = 0;

                        while ($row_cart = mysqli_fetch_array($run_cart)) {

                            $product_id = $row_cart['product_id'];

                            $product_size = $row_cart['p_size'];

                            $product_price = number_format($row_cart['p_price']);

                            $product_quantity = $row_cart['p_quantity'];

                            $get_products = "select * from products where product_id='$product_id'";

                            $run_products = mysqli_query($conn, $get_products);

                            while ($row_products = mysqli_fetch_array($run_products)) {

                                $product_title = $row_products['product_title'];

                                $product_image_1 = $row_products['product_image_1'];

                                $sub_total = number_format($row_cart['p_price']*$product_quantity);

                                $_SESSION['product_quantity'] = $product_quantity;

                                $total = $total+$row_cart['p_price']*$product_quantity;


                    ?>
                        
                    <tr>
                        <td><img style="width: 100px; height: 100px; margin-top: 8px; padding: 8px" class="table__image" src="../admin/<?php echo $product_image_1; ?>" alt=""></td>
                        <td><a class="table__title" href="details.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></td>
                        <td><span><?php echo $sub_total; ?>₫</span></td>
                        <td><span style="text-align: center; display: flex; justify-content: center"><?php echo $_SESSION['product_quantity']; ?></span></td>
                    </tr>

                </tbody>

                    <?php } } ?>

                <!--end tbody-->

                <!--tfoot-->
                <tfoot>

                    <tr>
                        <th colspan="3"><span style="padding-left: 4px">Tổng thanh toán >>>></span></th>
                        <th colspan="2"><span style="font-size: 28px"><?php echo number_format($total); ?>₫</span></th>
                    </tr>

                </tfoot>
                <!--end tfoot-->
            </table>

        </div>

            <h3>Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="/bantrangsuc/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">       

                    <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <option value="topup">Nạp tiền điện thoại</option>
                            <option value="fashion">Thời trang</option>
                            <option value="other">Khác - Xem thêm tại VNPAY</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" value="<?php echo $total; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Thời hạn thanh toán</label>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="text" value="<?php echo $expire; ?>"/>
                    </div>
                    <div class="form-group">
                        <h3>Thông tin hóa đơn (Billing)</h3>
                    </div>
                    <div class="form-group">
                        <label >Họ tên (*)</label>
                        <input class="form-control" id="txt_billing_fullname"
                               name="txt_billing_fullname" type="text" value="<?php echo $customer_name; ?>"/>             
                    </div>
                    <div class="form-group">
                        <label >Email (*)</label>
                        <input class="form-control" id="txt_billing_email"
                               name="txt_billing_email" type="text" value="<?php echo $customer_email; ?>"/>   
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại (*)</label>
                        <input class="form-control" id="txt_billing_mobile"
                               name="txt_billing_mobile" type="text" value="<?php echo $customer_phone; ?>"/>   
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ (*)</label>
                        <input class="form-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" type="text" value="<?php echo $customer_address; ?>"/>   
                    </div>
                    <div class="hidden" style="opacity: 0; height: 0px">
                        <div class="form-group">
                            <label >Mã bưu điện (*)</label>
                            <input class="form-control" id="txt_postalcode"
                                name="txt_postalcode" type="text" value="100000"/> 
                        </div>
                        <div class="form-group">
                            <label >Tỉnh/TP (*)</label>
                            <input class="form-control" id="txt_bill_city"
                                name="txt_bill_city" type="text" value="Hà Nội"/> 
                        </div>
                        <div class="form-group">
                            <label>Bang (Áp dụng cho US,CA)</label>
                            <input class="form-control" id="txt_bill_state"
                                name="txt_bill_state" type="text" value=""/>
                        </div>
                        <div class="form-group">
                            <label >Quốc gia (*)</label>
                            <input class="form-control" id="txt_bill_country"
                                name="txt_bill_country" type="text" value="VN"/>
                        </div>
                        <div class="form-group">
                            <h3>Thông tin giao hàng (Shipping)</h3>
                        </div>
                        <div class="form-group">
                            <label >Họ tên (*)</label>
                            <input class="form-control" id="txt_ship_fullname"
                                name="txt_ship_fullname" type="text" value="Nguyễn Thế Vinh"/>
                        </div>
                        <div class="form-group">
                            <label >Email (*)</label>
                            <input class="form-control" id="txt_ship_email"
                                name="txt_ship_email" type="text" value="vinhnt@vnpay.vn"/>
                        </div>
                        <div class="form-group">
                            <label >Số điện thoại (*)</label>
                            <input class="form-control" id="txt_ship_mobile"
                                name="txt_ship_mobile" type="text" value="0123456789"/>
                        </div>
                        <div class="form-group">
                            <label >Địa chỉ (*)</label>
                            <input class="form-control" id="txt_ship_addr1"
                                name="txt_ship_addr1" type="text" value="Phòng 315, Công ty VNPAY, Tòa nhà TĐL, 22 Láng Hạ, Đống Đa, Hà Nội"/>
                        </div>
                        <div class="form-group">
                            <label >Mã bưu điện (*)</label>
                            <input class="form-control" id="txt_ship_postalcode"
                                name="txt_ship_postalcode" type="text" value="1000000"/>
                        </div>
                        <div class="form-group">
                            <label >Tỉnh/TP (*)</label>
                            <input class="form-control" id="txt_ship_city"
                                name="txt_ship_city" type="text" value="Hà Nội"/>
                        </div>
                        <div class="form-group">
                            <label>Bang (Áp dụng cho US,CA)</label>
                            <input class="form-control" id="txt_ship_state"
                                name="txt_ship_state" type="text" value=""/>
                        </div>
                        <div class="form-group">
                            <label >Quốc gia (*)</label>
                            <input class="form-control" id="txt_ship_country"
                                name="txt_ship_country" type="text" value="VN"/>
                        </div>
                        <div class="form-group">
                            <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                        </div>
                        <div class="form-group">
                            <label >Tên khách hàng</label>
                            <input class="form-control" id="txt_inv_customer"
                                name="txt_inv_customer" type="text" value="Lê Văn Phổ"/>
                        </div>
                        <div class="form-group">
                            <label >Công ty</label>
                            <input class="form-control" id="txt_inv_company"
                                name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam"/>
                        </div>
                        <div class="form-group">
                            <label >Địa chỉ</label>
                            <input class="form-control" id="txt_inv_addr1"
                                name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội"/>
                        </div>
                        <div class="form-group">
                            <label>Mã số thuế</label>
                            <input class="form-control" id="txt_inv_taxcode"
                                name="txt_inv_taxcode" type="text" value="0102182292"/>
                        </div>
                        <div class="form-group">
                            <label >Loại hóa đơn</label>
                            <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                                <option value="I">Cá Nhân</option>
                                <option value="O">Công ty/Tổ chức</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input class="form-control" id="txt_inv_email"
                                name="txt_inv_email" type="text" value="pholv@vnpay.vn"/>
                        </div>
                        <div class="form-group">
                            <label >Điện thoại</label>
                            <input class="form-control" id="txt_inv_mobile"
                                name="txt_inv_mobile" type="text" value="02437764668"/>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button> -->
                    <button type="submit" name="redirect" id="redirect" class="btn btn-primary">Tiến Hành Thanh toán</button>

                </form>
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
