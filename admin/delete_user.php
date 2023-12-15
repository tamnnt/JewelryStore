<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_admin = $_GET['delete_user'];;

        $get_admin = "select * from admins where admin_id='$delete_admin'";

        $run_admin = mysqli_query($conn, $get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

            $admin_image = $row_admin['admin_image'];

        unlink("admin_images/$admin_image");
        
        $delete_admin = "delete from admins where admin_id='$delete_admin'";
        
        $run_delete = mysqli_query($conn, $delete_admin);
        
        if($run_delete) {
            
            // echo "<script>alert('Xoá thành công')</script>";
    
            echo "<script>window.open('login.php','_self')</script>";
            
            session_destroy();
            
        }
        
    }

?>

<?php } ?>