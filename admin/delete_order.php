<?php 
    
    if (!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<?php 
    if (isset($_GET['invoice_no'])) {
        $invoice_no = $_GET['invoice_no'];
    }

    if(isset($_GET['delete_order'])){
        
        $delete_id = $_GET['delete_order'];
        
        $delete_order = "delete from customer_orders where order_id='$delete_id'";
        
        $run_delete = mysqli_query($conn, $delete_order);
        
        if ($run_delete) {
            
            // echo "<script>alert('Đơn Hàng Này Đã Xoá Thành Công')</script>";
            
            echo "<script>window.open('index.php?view_order_detail=$invoice_no','_self')</script>";
            
        }
        
    }

?>

<?php } ?>