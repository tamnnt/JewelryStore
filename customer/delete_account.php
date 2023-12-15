
    <div class="question">
    <h3 class="section-title" style="margin-bottom: 20px;"><b>Xoá</b><span>Tài Khoản</span></h3>
        <p class="text">Bạn có thật sự muốn xoá tài khoản?</p>
        <div class="buttons">
            
            <form action="" method="post">
                <div class="answerButtons">
                    <button type="submit" name="agree"><span>Đồng Ý</span></button>
                    <button type="submit" name="dont_agree"><span>Không Đồng Ý</span></button>
                </div>
            </form>
        </div>
    </div>

    <?php
    
        if (isset($_POST['agree'])) {

            unlink("customer_images/$customer_image_origin");
            $delete_account = "delete from customers where customer_id='$customer_id'";

            $run_delete = mysqli_query($conn, $delete_account);

            if ($run_delete) {

                session_destroy();

                echo "<script>alert('Tài khoản của bạn đã xoá thành công!')</script>";

                echo "<script>window.open('../index.php','_self')</script>";

            }

        }

        if (isset($_POST['dont_agree'])) {

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        }


    ?>