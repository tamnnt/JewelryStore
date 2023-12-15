
    <!--form-->
    <form action="" method="post" enctype="multipart/form-data">

        <h3 class="section-title" style="margin-bottom: 20px;"><b>Chỉnh Sửa</b><span>Tài Khoản</span></h3>

        <div class="input-wrapper">
            <label for="name">Tên</label>
            <input id="name" type="text" value="<?php echo $customer_name; ?>" name="customer_name">
        </div>
                            
        <div class="input-wrapper">
            <label for="email">E-mail</label>
            <input id="email" type="text" value="<?php echo $customer_email; ?>" name="customer_email" require>
        </div>
                            
        <div class="input-wrapper">
            <label for="phone">Di Động</label>
            <input id="phone" type="text" value="<?php echo $customer_phone; ?>" name="customer_phone" require>
        </div>
                            
        <div class="input-wrapper">
            <label for="address">Địa Chỉ</label>
            <input id="address" type="text" value="<?php echo $customer_address; ?>" name="customer_address" require>
        </div>

        <p class="titleProfile">Ảnh Đại Diện</p>
        <div class="input-wrappermob">
        
            <input type="file" id="inputFile" class="inputFile" name="customer_image">
            <label tabindex="0" for="inputFile" class="uploadIcon"></label>
            <label tabindex="0" for="inputFile" class="fileReturn"></label>
        </div>

        <button type="submit" name="update" class="btn">Cập Nhật</button>

    </form>

    <?php

        if (isset($_POST['update'])) {

            $customer_name = $_POST['customer_name'];

            $customer_email = $_POST['customer_email'];

            $customer_phone = $_POST['customer_phone'];

            $customer_address = $_POST['customer_address'];

            $customer_image = $_FILES['customer_image']['name'];

            $customer_image_tmp = $_FILES['customer_image']['tmp_name'];

            /* $get_customer = "select * from customers where customer_email='$customer_email'";

            $run_customer = mysqli_query($conn, $get_customer);

            $count_customer = mysqli_num_rows($run_customer);

            if ($count_customer==1) {

                echo "<script>alert('Email Đã Có Người Dùng')</script>";

                exit();

            } */

            if ($customer_image=='') {

                $update_customer = "update customers set customer_name='$customer_name', customer_email='$customer_email', customer_phone='$customer_phone', customer_address='$customer_address' where customer_id='$customer_id'";

                $run_update = mysqli_query($conn, $update_customer);

                if ($run_update) {

                    echo "<script>alert('Cập Nhật Thành Công, Vui Lòng Đăng Nhập Lại')</script>";
                    
                    echo "<script>window.open('logout.php','_self')</script>";
                }

            } else {

                move_uploaded_file($customer_image_tmp,"customer_images/$customer_image");

                unlink("customer_images/$customer_image_origin");
                
                $update_customer = "update customers set customer_name='$customer_name', customer_email='$customer_email', customer_phone='$customer_phone', customer_address='$customer_address', customer_image='$customer_image' where customer_id='$customer_id'";

                $run_update = mysqli_query($conn, $update_customer);

                if ($run_update) {

                    echo "<script>alert('Cập Nhật Thành Công, Vui Lòng Đăng Nhập Lại')</script>";

                    echo "<script>window.open('logout.php','_self')</script>";
                }
                
            }

        }
    
    ?>