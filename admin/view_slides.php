<?php 
    
    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Xem slide
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_slides = "select * from slides";
        
                    $run_slides = mysqli_query($conn, $get_slides);
        
                    while ($row_slides = mysqli_fetch_array($run_slides)) {
                        
                        $slide_id = $row_slides['slide_id'];
                        
                        $slide_title = $row_slides['slide_title'];

                        $slide_description = $row_slides['slide_description'];
                        
                        $slide_image = $row_slides['slide_image'];

                        $slide_url = $row_slides['slide_url'];
                
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" style="text-align: center"><!-- panel-title begin -->
                            
                                <?php echo $slide_title; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                            <img src="<?php echo $slide_image; ?>" alt="<?php echo $slide_title; ?>" class="img-responsive">
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i>
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                 <i class="fa fa-pencil"></i>
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>