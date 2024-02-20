<?php
if(isset($_GET['remove_products'])){
    $remove_id=$_GET['remove_products'];
    $remove_product="DELETE FROM products WHERE product_id=$remove_id";
    $result_product=mysqli_query($con,$remove_product);
    if($result_product){
        echo "<script>alert('Product has been removed successfully')</script>";
        echo "<script>window.open('./account.php','_self')</script>";

    }
    

}
?>