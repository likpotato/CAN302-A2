<?php
include('../include/connect.php');
if(isset($_POST['insert_product'])){
    $product_name=$_POST["product_name"];
    $product_description=$_POST["product_description"];
    $product_stock=$_POST["product_stock"];
    $product_categories=$_POST["product_categories"];
    $product_price=$_POST["product_price"];
	
    //access image
    $product_image1=$_FILES["product_image1"]['name'];
    $product_image2=$_FILES["product_image2"]['name'];
    $product_image3=$_FILES["product_image3"]['name'];
   
    //accessing image tmp name
    $temp_image1=$_FILES["product_image1"]['tmp_name'];
    $temp_image2=$_FILES["product_image2"]['tmp_name'];
    $temp_image3=$_FILES["product_image3"]['tmp_name'];

    //checking empty condition
    if($product_name=="" or $product_description=="" or $product_stock=="" or $product_categories=="" or $product_price=="" or  $product_image1=="" or $product_image2=="" or $product_image3==""){
        echo "<script>alert('Please fill all available information')</script>";
        exit();
    }else{
        
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        

        //insert query
        $insert_products="INSERT INTO products (product_name,product_description,product_stock,category_id,product_image1,product_image2,product_image3,product_price) VALUES ('".$product_name."','".$product_description."','".$product_stock."','".$product_categories."','".$product_image1."','".$product_image2."','".$product_image3."','".$product_price."')";
        $result=mysqli_query($con,$insert_products);
        if($result){
        echo "<script>alert('Product has been inserted successfully')</script>";
        }
    

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
     <!-- bootstrap css-link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!--css link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .image{
            position: absolute;
            top: 10px;
            width: 300px;
            height: 300px;
        }
        .product{
            width:120%;
        }
    </style>
</head>
<body class="bg-light" >
    <div class="container mt-5 product">
        
        <h2 class="my-4">Product insertion</h2>
        <!-- <img src="../images/cart.png" class="image"> -->
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- name -->
            <div class="form-outline mb-4 w-50">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Please Type the Name" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Please Type the Description" autocomplete="off" required="required">
            </div>
            <!-- stock -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_stock" class="form-label">Product Stock</label>
                <input type="text" name="product_stock" id="product_stock" class="form-control" placeholder="Please Type the Stock" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_categories" class="form-label">Product Categories</label>
                <select name="product_categories" id="" class="form-select">
                    <option value="">Please Choose a Category</option>
                    <?php
                    $select_query="SELECT*FROM categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($result_query)){
                        $category_name=$row_data['category_name'];
                        $category_id=$row_data["category_id"];
                        echo" <option value='$category_id'> $category_name</option>";

                    }


                    ?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image1" class="form-label">Product Display Image</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div> 
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image2" class="form-label">Product Detail Image 1</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div> 
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image3" class="form-label">Product Detail Image 2</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div> 
            <!-- price -->
            <div class="form-outline mb-4 w-50">
                <label for="product_price" class="form-label">Product Prices</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Please Type the Prices" autocomplete="off" required="required">
            </div>
            <!-- submit-->
            <div class="form-outline mb-4 w-50 ">
                <input type="submit" name="insert_product" class="btn mb-3 px-3 w-50" style="background-color: #cd9bf3;" value="Insert Products">
            </div>

        </form>
    </div>
</body>
</html>