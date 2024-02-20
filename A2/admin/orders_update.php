<?php
include('../include/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $order_status = $_POST["order_status"];

    $sql = "UPDATE orders SET order_status='$order_status' WHERE id_inOrder=$id";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('successfully');window.location.href='account.php?order'</script>";
    } else {
        echo "string";
    }

}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id_inOrder = $id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Order not found')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap css-link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap css-link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--css link-->
    <link rel="stylesheet" href="../style.css">
    <!--
        <style>
            .module{
                position: relative;
                right : 130px;
                top: 300px;
                width: 100%;
            }

        </style> -->

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
    </style>
</head>
<body>
<!-- navbar -->
<!--navbar-->
<div class="container-fluid p-0 ">
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
    <!-- forth child -->
    <div class=" pos">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }

        ?>

        <div class="cou_posi">
            <?php
            if (isset($_GET['coupons'])) {
                include('coupons.php');
            }
            ?>
        </div>

        <div class=" posi">
            <?php
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['insert_products'])) {
                include('insert_products.php');
            }
            if (isset($_GET['remove_products'])) {
                include('remove_products.php');

            }
            ?>
        </div>

        <div class="order_posi">
            <?php
            if (isset($_GET['order'])) {
                include('order.php');
            }
            ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- <h2 class="my-4">Edit Order</h2> -->
                    <form method="post" action="orders_update.php">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo $order['id_inOrder']; ?>">
                        </div>
                        <div class="module">
                            <div class="mb-3">
                                <label for="type" class="form-label">Order Status:</label>
                                <select class="form-select" id="order_status" name="order_status" required>
                                    <option <?php if ($order['order_status'] == 'preparing') {
                                        echo 'selected';
                                    } ?> value="preparing">Preparing
                                    </option>
                                    <option <?php if ($order['order_status'] == 'shipping') {
                                        echo 'selected';
                                    } ?> value="shipping">Shipping
                                    </option>
                                    <option <?php if ($order['order_status'] == 'finished') {
                                        echo 'selected';
                                    } ?> value="finished">Finished
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</body>
<!-- bootstrap js-link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>


</head>
<body>


</body>
</html>

