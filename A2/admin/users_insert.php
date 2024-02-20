<?php
include('../include/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $payment_method = $_POST["payment_method"];
    $shipping_address = $_POST["shipping_address"];

    $sql = "INSERT INTO users (username, email, password, payment_method, shipping_address) VALUES ('$username', '$email', '$password', '$payment_method', '$shipping_address')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('successfully');window.location.href='account.php?user'</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MainPage</title>
    <!-- bootstrap css-link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }

    .body {
        position: relative;
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    .user-image {
        width: 80px;
        border-radius: 100%;
        border: 1px solid #eee;
    }

    .sidebar {
        position: relative;
        height: 150vh;
        width: 250px;
        background-color: #96a3b0;
        background-size: cover
        padding: .4rem .8rem;
        transition: all 0.5s ease;
    }

    .sidebar .top .logo {
        color: #fff;
        display: flex;
        align-items: center;

    }

    .top .logo i {
        font-size: 28px;
        margin-right: 5px;

    }

    .sidebar #btn {
        color: #fff;
        position: absolute;
        left: 90%;
        top: 0px;
        font-size: 20px;
        height: 50px;
        width: 50px;
        text-align: center;
        line-height: 50px;
        transform: translateX(-50%);
    }

    .sidebar ul {
        margin-top: 20px;
    }

    .sidebar ul li {
        position: relative;
        height: 50px;
        width: 100%;
        margin: 0 5px;
        list-style: none;
        line-height: 50px;

    }

    .sidebar ul li a {
        color: black;
        display: flex;
        align-items: center;
        text-decoration: none;
        font-size: 18px;

    }

    .sidebar ul li a:hover {
        color: #11101d;
        background: #fff;

    }

    .sidebar ul li a i {
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        line-height: 50px;
        font-size: larger;

    }

    .sidebar.active ~ .main-content {
        left: 250px;
        width: calc(100% - 250px);

    }

    .sidebar.active {
        width: 250px;

    }

    .pos {
        position: absolute;
        left: 500px;
        top: 120px;
        width: 100%;
    }

    .posi {
        position: absolute;
        right: 330px;
        top: 10px;
        width: 100%;
    }

    .cou_posi {
        position: absolute;
        right: 300px;
        top: 120px;
        width: 100%;
    }

    .order_posi {
        position: absolute;
        right: 530px;
        top: 0px;
        width: 80%;
    }
    .coupon_posi{
            position: absolute;
            left: 530px;
            top: 100px;
            width: 80%;
        }
    .user_posi{
        position: absolute;
            left: 530px;
            top: 100px;
            width: 80%;
    }
</style>
</head>
<!--first child-->

<nav class="navbar navbar-expand-lg" style="background-color: #cd9bf3;">
    <div class="container-fluid">

        <img src="../images/logo1.png" alt="" width="100px" height="100px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
            </ul>
            <form class="d-flex" action="search_products.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                       name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
            </form>
        </div>
    </div>

</nav>
<div style="display: flex;">
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>Lovin Eye strore</span>
            </div>
        </div>
        <div class="user">
            <img src="../images/userimage.jpg" alt="me" class="user-image">
            <div>
                <p class="bold" style="position:absolute; ">Admin name</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="account.php?view_products">
                    <i class='bx bxs-shopping-bags'></i>
                    <span class="nav-item">View Products</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-category'></i>
                    <span class="nav-item">View Categories</span>
                </a>
            </li>
            <li>
                <a href="account.php?insert_products">
                    <i class='bx bx-folder-plus'></i>
                    <span class="nav-item">Insert Products</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-message-alt-add'></i>
                    <span class="nav-item">Insert Categories</span>
                </a>
            </li>
            <li>
                <a href="account.php?order">
                    <i class='bx bxs-cart'></i>
                    <span class="nav-item">Order</span>
                </a>
            </li>
            <li>
                <a href="account.php?coupons">
                    <i class='bx bxs-discount'></i>
                    <span class="nav-item">Coupons</span>
                </a>
            </li>
            <li>
                <a href="account.php?user">
                    <i class='bx bx-user'></i>
                    <span class="nav-item">User</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-notepad'></i>
                    <span class="nav-item">Admin Info</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>


    </div>
<div class="container user_posi">
    <div class="row">
        <div class="col-md-6">
            <h2 class="my-4">Add User</h2>
            <form method="post" action="users_insert.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email"  required>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method:</label>
                    <input type="text" class="form-control" id="payment_method" name="payment_method"  required>
                </div>
                <div class="mb-3">
                    <label for="shipping_address" class="form-label">Shipping Address:</label>
                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>
</div>

