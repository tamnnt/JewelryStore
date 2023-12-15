<?php 
    
    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<?php 

    if (isset($_GET['edit_slide'])) {
        
        $edit_slide_id = $_GET['edit_slide'];
        
        $edit_slide = "select * from slides where slide_id='$edit_slide_id'";
        
        $run_edit_slide = mysqli_query($conn, $edit_slide);
        
        $row_edit_slide = mysqli_fetch_array($run_edit_slide);
        
        $slide_id = $row_edit_slide['slide_id'];
        
        $slide_title = $row_edit_slide['slide_title'];
        
        $slide_url = $row_edit_slide['slide_url'];
        
        $slide_desc = $row_edit_slide['slide_description'];
        
        $slide_image_orgin = $row_edit_slide['slide_image'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Chỉnh sửa slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa slide
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Tên:
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_title" type="text" class="form-control" value="<?php echo $slide_title; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Url:
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_url" type="text" class="form-control" value="<?php echo $slide_url; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Mô tả:
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea type='text' name="slide_desc" id="" cols="30" rows="10" class="form-control"><?php echo $slide_desc;?></textarea>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Hình ảnh:
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="slide_image" class="form-control">
                            
                            <br/>
                            
                            <img src="<?php echo $slide_image_orgin; ?>" class="img-responsive">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Cập Nhật" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if (isset($_POST['update'])) {
        
        $slide_title = $_POST['slide_title'];

        $slide_url = $_POST['slide_url'];

        $slide_description = $_POST['slide_desc'];

        $slide_path = "slides_images/";
        
        $slide_image = $slide_path . basename($_FILES['slide_image']['name']);
        
        $temp_name = $_FILES['slide_image']['tmp_name'];
        
        if ($temp_name=='') {

            $update_slide = "update slides set slide_title='$slide_title', slide_url='$slide_url', slide_description='$slide_description' where slide_id='$slide_id'";
        
            $run_update_slide = mysqli_query($conn, $update_slide);
        
            if($run_update_slide) {
            
                echo "<script>alert('Cập Nhật Thành Công')</script>"; 
            
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            
            }

        } else {
            
            move_uploaded_file($temp_name,"$slide_image");

            unlink($slide_image_orgin);

            $update_slide = "update slides set slide_title='$slide_title', slide_url='$slide_url', slide_description='$slide_description', slide_image='$slide_image' where slide_id='$slide_id'";
        
            $run_update_slide = mysqli_query($conn, $update_slide);
        
            if($run_update_slide) {
            
                echo "<script>alert('Cập Nhật Thành Công')</script>"; 
            
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            
            }

        }
        
    }

?>

<?php } ?>