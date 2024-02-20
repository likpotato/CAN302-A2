<?php
include('../include/connect.php');
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        .table_1{
          /*  position: relative;
            right : 530px;
            top: 0px;*/
            width: 100%;
        }
    </style>
</head>
<div class="container">
    <h2 class="my-4">User management</h2>
    <div class="table_1">
    <div style="display: flex;justify-content: flex-end;">
    <a class="btn btn-success btn-add" href="users_insert.php">Add</a>
    </div>
    
    <table id="user_table" class="table" style="width: 1000px;">
        <thead>
        <tr>
            <th>No.</th>
            <!-- <th>ID</th> -->
            <th>Username</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
            <th>Payment Method</th>
            <th>Shipping Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $number=0;?>
        <?php foreach ($users as $user):$number++; ?>
            <tr>
            <td><?php echo $number; ?></td>
                <!-- <td><?php echo $user['id_inUser']; ?></td> -->
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <!-- <td><?php echo $user['password']; ?></td> -->
                <td><?php echo $user['payment_method']; ?></td>
                <td><?php echo $user['shipping_address']; ?></td>
                <td>
                    <a href="users_order.php?id=<?php echo $user['id_inUser']; ?>" class="btn btn-primary">Order history</a>
                    <a href="users_update.php?id=<?php echo $user['id_inUser']; ?>" class="btn btn-primary">Edit</a>
                    <a href="users_delete.php?id=<?php echo $user['id_inUser']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
   <script>
         $(document).ready(function () {
        $('#user_table').DataTable();
    });
    </script>
 
</body>
</html>
