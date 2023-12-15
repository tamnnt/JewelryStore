<?php 
    
    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";
        
    } else {

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem khách hàng
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i> Xem khách hàng
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="width: 10px"> STT </th>
                                <th style="width: 80px"> Hình Ảnh </th>
                                <th style="width: 120px"> Tên </th>
                                <th style="width: 60px"> E-Mail </th>
                                <th style="width: 30px"> Phone </th>
                                <th style="width: 160px"> Địa Chỉ </th>
                                <th> Xoá </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customers";
                                
                                $run_c = mysqli_query($conn, $get_c);
          
                                while ($row_c = mysqli_fetch_array($run_c)) {
                                    
                                    $c_id = $row_c['customer_id'];
                                    
                                    $c_name = $row_c['customer_name'];

                                    $c_email = $row_c['customer_email'];

                                    $c_phone = $row_c['customer_phone'];

                                    $c_address = $row_c['customer_address'];
                                    
                                    $c_img = $row_c['customer_image'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td><?php echo $i; ?></td>
                                <td class="table_img"> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60px"></td>
                                <td><?php echo $c_name; ?></td>
                                <td><?php echo $c_email; ?></td>
                                <td><?php echo $c_phone; ?></td>
                                <td> <?php echo $c_address ?></td>
                                
                                <td style="width: 40px"> 
                                    <span class="wrapperDelete">
                                        <a class="tableDelete" href="index.php?delete_customer=<?php echo $c_id; ?>">
                                
                                            <i class="fa fa-trash-o"></i>

                                            <div class="tooltip">Không thể khôi phục khi nhấn</div>
                                        </a>

                                    </span>
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>