<?php 
    
    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<?php

    $file = "../css/main.css";

    if (file_exists($file)) {

        $data = file_get_contents($file);

    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Chỉnh sửa css
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh Sửa CSS
                </h3>
            </div>
            
            <div class="panel-body">
            
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <textarea name="newdata" id="" rows="15" class="form-control"><?php echo $data; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"></label>

                        <div class="col-md-6">
                            <input type="submit" name="update" value="Cập Nhật CSS" class="form-control btn btn-primary">
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<?php

    if (isset($_POST['update'])) {

        $newdata = $_POST['newdata'];

        $handle = fopen($file, "w");

        fwrite($handle, $newdata);

        echo "<script>alert('Cập Nhật Thành Công')</script>";
        echo "<script>window.open('index.php?edit_css','_self')</script>";

    }
?>

<?php } ?>