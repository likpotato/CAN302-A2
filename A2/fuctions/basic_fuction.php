<?php
// <!-- connect file -->
// include('./include/connect.php');
// getting products
function getproducts(){
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
}

// getting unique categories
function getunique(){
    global $con;
    //condition to check isset or not
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
          $product_stock=$row["product_stock"];
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
}
//getting all products
function getallproducts(){
    global $con;
    if(!isset($_GET['category'])){
    $select_query="SELECT*FROM products ORDER BY product_name";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_name=$row["product_name"];
      $product_id=$row["product_id"];
      $product_description=$row["product_description"];
      $product_stock=$row["product_stock"];
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
    }}
}
function getcategories(){
    global $con;
    $select_category="SELECT*FROM categories ";
    $result_category=mysqli_query($con,$select_category);
    while($row_data=mysqli_fetch_assoc($result_category)){
      $category_name=$row_data["category_name"];
      $category_id=$row_data["category_id"];
      echo " <li class='nav-item' style='background-color: #5e50aa;'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a></li>";
    }
}

//getting details
function getdetails(){
    global $con;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    $product_id=$_GET['product_id'];
    $select_query="SELECT*FROM products WHERE product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_name=$row["product_name"];
      $product_id=$row["product_id"];
      $product_description=$row["product_description"];
      $product_stock=$row["product_stock"];
      $product_image1=$row["product_image1"];
      $product_image2=$row["product_image2"];
      $product_image3=$row["product_image3"];
      $product_price=$row["product_price"];
      $category_id=$row['category_id'];
      echo "<div class='col-md-9'><!-- col-md-9 Begin -->
      <div id='productMain' class='row'><!-- row Begin -->
          <div class='col-sm-6'><!-- col-sm-6 Begin -->
              <div id='mainImage'><!-- #mainImage Begin -->
             <center><img class='img-responsive'  src='./admin/product_images/$product_image1' alt='$product_name' width='400px' height='400px'></center>
              </div><!-- mainImage Finish -->
          </div><!-- col-sm-6 Finish -->
          <div class='col-sm-6'><!-- col-sm-6 Begin -->
              <div class='box'><!-- box Begin -->
                  <h1 class='text-center'>$product_name</h1>
                  <form action='details.php' class='form-horizontal' method='post'><!-- form-horizontal Begin -->
                      <div class='form-group'><!-- form-group Begin -->
                          <label for='' class='col-md-5 control-label'>Products Quantity</label>
                          <label for='' class='col-md-5 control-label'>Stock: $product_stock</label>
                          <div class='col-md-7'><!-- col-md-7 Begin -->
                                 <select name='product_qty' id='' class='form-control'><!-- select Begin -->
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  </select><!-- select Finish -->
                          
                           </div><!-- col-md-7 Finish -->
                          
                      </div><!-- form-group Finish -->
                      
                      <p style='font-size:21px'>$$product_price</p>
                      
                      <p class='text-center buttons'><button class='btn btn-primary i fa fa-shopping-cart'> Add to cart</button></p>
                      
                  </form><!-- form-horizontal Finish -->
                  
              </div><!-- box Finish -->
              
              <div class='image-row' id='thumbs'><!-- row Begin -->
                  
                  <div class='col-md-6 mb-4'><!-- col-xs-4 Begin -->
                          <img src='./admin/product_images/$product_image2' alt='$product_name' class='img-responsive' width='200px' height='200px'>
                  </div><!-- col-xs-4 Finish -->
                  
                  <div class='col-md-6 mb-4'> <!-- col-xs-4 Begin -->
                  <img src='./admin/product_images/$product_image3' alt='$product_name' class='img-responsive' width='200px' height='200px'>
                  </div><!-- col-xs-4 Finish -->
                  
              </div><!-- row Finish -->
              
          </div><!-- col-sm-6 Finish -->
          
          
      </div><!-- row Finish -->
      <div class='box' id='details'><!-- box Begin -->
              <h4>Product Details</h4>
          <p>
          $product_description
          </p>
          

      </div><!-- box Finish -->
      

      </div>
      </div>";
    }}
    }}
//getting search
function searchproduct(){
    global $con;
    if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query="SELECT*FROM products WHERE product_keywords LIKE '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $number_of_rows=mysqli_num_rows($result_query);
        if($number_of_rows==0){
            echo "<h2 class='text-center'>Sorry!There is no such kind of goods here</h2>
            <img src='./images/wen.png' alt='...' width='50px' height='500px'>";
        }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_name=$row["product_name"];
      $product_id=$row["product_id"];
      $product_description=$row["product_description"];
      $product_stock=$row["product_stock"];
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
}
//getting details
function getdetailinfo(){
    global $con;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    $product_id=$_GET['product_id'];
    $select_query="SELECT*FROM products WHERE product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_name=$row["product_name"];
      $product_id=$row["product_id"];
      $product_description=$row["product_description"];
      $product_stock=$row["product_stock"];
      $product_image1=$row["product_image1"];
      $product_image2=$row["product_image2"];
      $product_image3=$row["product_image3"];
      $product_price=$row["product_price"];
      $category_id=$row['category_id'];
      echo "<div class='col-md-10 mb-4' >
      <div class='card' >
      <img src='./admin/product_images/$product_image1' class='card-img-top'alt='$product_name'>
      <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$product_description</p>
        <a href='#' class='btn btn-primary'>Add to Cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Detail</a>
      </div>
    </div>
  </div>
  <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center mb-5'>Related information</h4>
                </div>
                <div class='col-md-6 mb-4'>
                <img src='./admin/product_images/$product_image2' class='card-img-top'alt='$product_name'>

                </div>
                <div class='col-md-6 mb-4'>
                <img src='./admin/product_images/$product_image3' class='card-img-top'alt='$product_name'>
                    
                </div>
            </div>

        </div>";
    }}
    }
}
?>