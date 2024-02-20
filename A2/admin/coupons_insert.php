<?php
include('../include/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $discount = $_POST["discount"];
    $type = $_POST["type"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $c_status = $_POST["c_status"];
    $sql = "INSERT INTO coupons (code, discount, type, start_time, end_time, c_status) VALUES ('$code', '$discount', '$type', '$start_time', '$end_time', '$c_status')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('successfully');window.location.href='account.php?coupons'</script>";
    }

}

?>
<!DOCTYPE html>
<div lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MainPage</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap css-link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
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
    </style>
</head>
<!--first child-->
<body>
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
            <a href="#">
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

<div class="container coupon_posi">
    <div class="row">
        <div class="col-md-6">
            <h2 class="my-4">Add Coupon</h2>
            <form method="post" action="coupons_insert.php">
                <div class="mb-3">
                    <label for="code" class="form-label">Coupon Code:</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount:</label>
                    <input type="number" class="form-control" id="discount" name="discount" step=".01" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type:</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="Percentage-off">Percentage-off</option>
                        <option value="FreeShipping">FreeShipping</option>
                        <option value="First-timecustomer">First-timecustomer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time:</label>
                    <input type="datetime" class="form-control" id="start_time" name="start_time" required>
                </div>
                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time:</label>
                    <input type="datetime" class="form-control" id="end_time" name="end_time" required>
                </div>
                <div class="mb-3">
                    <label for="c_status" class="form-label">Status:</label>
                    <select class="form-select" id="c_status" name="c_status" required>
                        <option value="unused">unused</option>
                        <option value="used">used</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Coupon</button>
            </form>
        </div>
    </div>
</div>
</div>
</body>
<!-- bootstrap js-link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>


