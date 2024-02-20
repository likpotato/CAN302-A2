<!-- connect file -->
<?php
include('include/connect.php');
include('fuctions/basic_fuction.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!--fonts awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css link-->
    <link rel="stylesheet" href="style.css">
    <style>
      .images1{
        position:absolute;
        top: 10px;
        left: 10px;
      }
      .image-row{
        display: flex;
        justify-content: space-between;
      }
      .position{
        float: left;
    width: 20%;
    margin-left: 0;
    position: absolute;
    top: 300px;
    right: 10px;

      }
      .bottom{
  height: auto;
  position: relative;
    bottom: 0;
    
}
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0" >
        <!--first child-->
        <nav class="navbar navbar-expand-lg" style="background-color: #cd9bf3;">
  <div class="container-fluid">

    <img src="images/logo1.png" alt="" width="100px" height="100px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
          <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-arrow-down"></i> <sup>1 </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:100/-</a>
        </li> 
        
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
      </form>
    </div>
  </div>
  
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg" style="background-color: #808080;">
  <ul class="navbar-nav me-auto">
  <li class="nav-item">
          <a class="nav-link" href="#">Welcome!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
  </ul>
</nav>
<!--third child-->
  <div class="bg-light">
    <h2 class="text-center"><strong>Welcome to Lovin Eye strore !<strong></h2>
  </div>


<!--fifth child-->

<div class="row px-3" style="padding-top: 30px;">
  <div class="col-md-10">
    <!--products-->
    <div class="row">
    <!-- fetching products -->
    
    <?php
    getunique();
    getdetails();
    ?>
    
  <!-- row end -->
  </div>
  <!-- col end -->
  </div>

  <div class="col-md-2 p-0 position"  style="background-color:#5e50aa" >
     <!-- sidenav -->
    <ul class="navbar-nav me-auto text-center" >
      <li class="nav-item" style="background-color: #cd9bf3;">
        <a href="#" class="nav-link text-light"><h3>Category</h3></a>
      </li>
    <?php
    
    getcategories();
    
    ?>
    </ul>
  </div>
</div>


    </div>



 <!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>