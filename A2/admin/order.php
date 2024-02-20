<?php

//open database by mysqli
$con = mysqli_connect("localhost", "root", "", "ecommerce");
if (mysqli_connect_errno($con)) { 
    die("Connect to MySQL failed: " . mysqli_connect_error()); 
}

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_inOrder'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status= $order_status WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('successfully');window.location.href='account.php?coupons'</script>";
    }

}       

//receive query parameters.
$id = mypost('id_inOrder');
$user = mypost('user');
$order_date = mypost('order_date');
$order_status = mypost('order_status');
$product= mypost('product');
$coupon = mypost('coupon');


//query the data from database

$sql = "SELECT * from (Select * from (select * from users join (select * from (select * from orders as o join order_coupon as oc on o.id_inOrder =oc.order_id_inC) as newTable join coupons as cou on newTable.coupon_id = cou.id) as n on users.id_inUser = n.user_id) as p JOIN order_product on order_product.order_id=p.id_inOrder) as p JOIN products on p.product_id =products.product_id";
$query = mysqli_query($con,$sql);    
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap css-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <style>
        .container{
            position: absolute;
          /*  right : 300px;
            top: 120px;*/
            width: 110%;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h2 class="my-4">Order information</h2>
        <table id ="order_table" class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <!-- <th>ID</th> -->
                    <th>User</th>
                    <th>Product name</th>
                    <th>Quantities</th>
                    <th>Coupon code</th>
                    <th>Order date</th>
                    <th>Order status</th>
                    <th>Operation</th>
                </tr>
            </thead>

        <tbody>
        <?php $number=0;?>
        <?php foreach ($results as $result): $number++;?>
            <tr>
            <td><?php echo $number; ?></td>
                <!-- <td><?php echo $result['id_inOrder']; ?></td> -->
                <td><?php echo $result['username']; ?></td>
                <td><?php echo $result['product_name']; ?></td>
                <td><?php echo $result['quantities']; ?></td>
                <td><?php echo $result['code']; ?></td>
                <td><?php echo $result['order_date']; ?></td>
                <td><?php echo $result['order_status']; ?></td>
                <td>
                     <a href="orders_update.php?id=<?php echo $result['id_inOrder']; ?>" class="btn btn-primary">Update</a>
                    <a href="order_delete.php?id=<?php echo $result['id_inOrder']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                </td>
            </tr>
           
        <?php endforeach; ?>
        </tbody>

        </table>
    </div>
    <br>

    <script>
         $(document).ready(function () {
        $('#order_table').DataTable();
    });
    </script>
 
</body>
</html>



