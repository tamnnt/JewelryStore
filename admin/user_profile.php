<?php 

    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>
   
<?php 

    if (isset($_GET['user_profile'])) {
        
        $edit_user = $_GET['user_profile'];
        
        $get_user = "select * from admins where admin_id='$edit_user'";
        
        $run_user = mysqli_query($conn, $get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $user_id = $row_user['admin_id'];
        
        $user_name = $row_user['admin_name'];
        
        $user_pass = $row_user['admin_password'];
        
        $user_email = $row_user['admin_email'];
        
        $user_image_origin = $row_user['admin_image'];
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Chỉnh sửa người dùng
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Chỉnh sửa người dùng
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Tên </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_email; ?>"  name="admin_email" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Mật khẩu </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_pass; ?>" name="admin_pass" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Hình ảnh </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_image" type="file" class="form-control">
                          
                          <img src="admin_images/<?php echo $user_image_origin; ?>" alt="<?php echo $admin_name; ?>" width="15%">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Cập Nhật" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if (isset($_POST['update'])) {
    
    $user_name = $_POST['admin_name'];
    $user_email = $_POST['admin_email'];
    $user_pass = $_POST['admin_pass'];
    $user_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];

    if ($user_image=='') {

        $update_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_password='$user_pass' where admin_id='$user_id'";
    
        $run_user = mysqli_query($conn, $update_user);
        
        if ($run_user) {
            
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('login.php','_self')</script>";
            
            session_destroy();

        }

    } else {

        unlink("admin_images/$user_image_origin");

        move_uploaded_file($temp_admin_image,"admin_images/$user_image");

        $update_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_password='$user_pass',admin_image='$user_image' where admin_id='$user_id'";
    
        $run_user = mysqli_query($conn, $update_user);
        
        if ($run_user) {
            
            echo "<script>alert('Cập Nhật Thành Công')</script>";
    
            echo "<script>window.open('login.php','_self')</script>";
            
            session_destroy();
            
        }

    }
    
}

?>


<?php } ?>