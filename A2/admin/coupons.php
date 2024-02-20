<?php
include('../include/connect.php');
$sql = "SELECT * FROM coupons";
$result = mysqli_query($con, $sql);
$coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MainPage</title>
    <!-- bootstrap css-link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <style>

        .btn-add{
            position:absolute;
            left:1000px
           
        }
    </style>
</head>
<div class="container">
<h2 class="my-4">Coupon</h2>
    <div style="display: flex;justify-content: flex-end;">
    <a class="btn btn-success btn-add" href="coupons_insert.php">Add</a>
    </div>
    <table id ="coupon_table" class="table" style="width: 1000px;">
        <thead>
        <tr>
            <th>No.</th>
            <!-- <th>ID</th> -->
            <th>Code</th>
            <th>Discount</th>
            <th>Type</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $number=0;?>
        <?php foreach ($coupons as $coupon):$number++; ?>
            <tr>
                <td><?php echo $number; ?></td>
                <!-- <td><?php echo $coupon['id']; ?></td> -->
                <td><?php echo $coupon['code']; ?></td>
                <td><?php echo $coupon['discount']; ?></td>
                <td><?php echo $coupon['type']; ?></td>
                <td><?php echo $coupon['start_time']; ?></td>
                <td><?php echo $coupon['end_time']; ?></td>
                <td><?php echo $coupon['c_status']; ?></td>
                <td>
                    <a href="coupons_update.php?id=<?php echo $coupon['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="coupons_delete.php?id=<?php echo $coupon['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
 <script>
         $(document).ready(function () {
        $('#coupon_table').DataTable();
    });
    </script>
    </body>
</html>

