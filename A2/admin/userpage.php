<!-- connect file -->
<?php
include('../include/connect.php');
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
          <a class="nav-link active" aria-current="page" href="userpage.php">Home</a>
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

<!--forth child-->
<!--ads-->
<style>
  .carousel-item{
    height: 27rem;
    background: #777;
    color: aliceblue;
    position: relative;
    background-position: center;
    background-size: cover;
  }
  .container{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding-bottom: 50px ;
    color: blue;

  }
  .card-img-top{
    width: 100%;
    height: 200px;
    object-fit: contain;
}
</style>


<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" >
    <div class="carousel-item active" style="background-image: url(./images/slide-1.jpg);">
      <div class="container">
        <h1>Coming Soon</h1>
        <p>
        Made of comfortable and breathable cotton fabric; printing process is used to add detail highlights
        </p>
      </div>
    </div>
    <div class="carousel-item" style="background-image: url(./images/slide-2.jpg);">
    <div class="container">
      <h1>Coming Soon</h1>
      <p>
      The fresh and elegant floral notes seem to put you in the middle of the flowers and Feel the fragrance of the different layers of floral waves
      </p>
    </div>
  </div>
  <div class="carousel-item" style="background-image: url(./images/slide-3.jpg);">
    <div class="container">
      <h1>Coming Soon</h1>
      <p>
      Each match is carefully selected by us
      </p>
    </div>
  </div>
  </div>
  <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
    <span class="sr-only">Previous</span>
    <span class="carousel-control-prev-icon" aria-hidden="true">

    </span>
  </a>
  <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
    <span class="sr-only">Next</span>
    <span class="carousel-control-next-icon" aria-hidden="true">

    </span>
  </a>
</div>

  


<!--fifth child-->

<div class="row px-3" style="padding-top: 30px;">
  <div class="col-md-10">
    <!--products-->
    <div class="row">
    <!-- fetching products -->
    <?php
    global $con;
    if(!isset($_GET['category'])){
    $select_query="SELECT*FROM products ORDER BY product_name LIMIT 0,9";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_name=$row["product_name"];
      $product_id=$row["product_id"];
      $product_description=$row["product_description"];
      $product_image1=$row["product_image1"];
      $product_stock=$row["product_stock"];
      $product_price=$row["product_price"];
      $category_id=$row['category_id'];
      echo "<div class='col-md-4 mb-2' >
      <div class='card' >
      <img src='./admin/product_images/$product_image1' class='card-img-top'alt='$product_name'>
      <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$product_description</p>
        <a href='#' class='btn btn-primary'>Add to Cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Detail</a>
      </div>
    </div>
  </div>";
    }}
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="SELECT*FROM products WHERE category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $number_of_rows=mysqli_num_rows($result_query);
        if($number_of_rows==0){
            echo "<h2 class='text-center'>Sorry!There is no such kind of goods here</h2>
            <img src='./images/wen.png' alt='...' width='50px' height='500px'>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_name=$row["product_name"];
          $product_id=$row["product_id"];
          $product_description=$row["product_description"];
          $product_keywords=$row["product_keywords"];
          $product_image1=$row["product_image1"];
          $product_price=$row["product_price"];
          $category_id=$row['category_id'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card' >
          <img src='./admin/product_images/$product_image1' class='card-img-top'alt='$product_name'>
          <div class='card-body'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$product_description</p>
            <a href='#' class='btn btn-primary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Detail</a>
          </div>
        </div>
      </div>";
        }
    }
    ?>
    
  <!-- row end -->
  </div>
  <!-- col end -->
  </div>

  <div class="col-md-2 p-0"  style="background-color:#5e50aa">
     <!-- sidenav -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item" style="background-color: #cd9bf3;">
        <a href="#" class="nav-link text-light"><h3>Category</h3></a>
      </li>
    <?php
    global $con;
    $select_category="SELECT*FROM categories ";
    $result_category=mysqli_query($con,$select_category);
    while($row_data=mysqli_fetch_assoc($result_category)){
      $category_name=$row_data["category_name"];
      $category_id=$row_data["category_id"];
      echo " <li class='nav-item' style='background-color: #5e50aa;'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a></li>";
    }
    
    ?>
    </ul>
  </div>
</div>




 <!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
