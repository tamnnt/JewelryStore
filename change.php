<?php

    session_set_cookie_params('86400');
    session_start();
    include("includes/db.php");
    include("functions/functions.php");

?>

<?php 

    $ip_add = getRealIpUser();

    if(isset($_POST['id'])) {

        $id = $_POST['id'];

        $quantity = $_POST['quantity'];
        
        $update_quantity = "update cart set p_quantity='$quantity' where product_id='$id' AND ip_add='$ip_add'";

        $run_quantity = mysqli_query($conn, $update_quantity);

    }

?>