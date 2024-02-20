<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT*FROM products WHERE product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_name=$row["product_name"];
    $product_description=$row["product_description"];
    $product_stock=$row["product_stock"];
    $product_image1=$row["product_image1"];
    $product_image2=$row["product_image2"];
    $product_image3=$row["product_image3"];
    $product_price=$row["product_price"];
    $category_id=$row['category_id'];

    //fetching category id
    $select_category="SELECT*FROM categories WHERE category_id=$category_id ";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_name=$row_category['category_name'];

}
?>

<div class="container mt-5">
    <h3 class="text">
        Edit Products
    </h3>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="formal-label mb-4 w-50 ">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control"  value="<?php echo $product_name?>" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description?>" required="required">
            </div>
            <!-- stock -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_stock" class="form-label">Product Stock</label>
                <input type="text" name="product_stock" id="product_stock" class="form-control" value="<?php echo $product_stock?>" required="required">
            </div>
            <div class="form-outline mb-4 w-50 ">
                <label for="product_categories" class="form-label">Product Categories</label>
                <select name="product_categories" id="" class="form-select">
                    <option value="">Please Choose a Category</option>
                    <?php
                     $select_category_all="SELECT*FROM categories";
                     $result_category_all=mysqli_query($con,$select_category_all);
                     while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_name=$row_category_all['category_name'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_name</option>";

                     }
                    ?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_image1" class="form-label">Product Display Image</label>
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" >
                <img src='./product_images/<?php echo $product_image1?>' width='100px' height='100px'>
                </div>
            </div> 
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_image2" class="form-label">Product Detail Image 1</label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto">
                <img src='./product_images/<?php echo $product_image2?>' width='100px' height='100px'>

                </div>
                
            </div> 
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 ">
            
                <label for="product_image3" class="form-label">Product Detail Image 2</label>
                <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto">
                <img src='./product_images/<?php echo $product_image3?>' width='100px' height='100px'>

            </div>
            </div> 
            <!-- price -->
            <div class="form-outline mb-4 w-50 ">
                <label for="product_price" class="form-label">Product Prices</label>
                <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price?>" required="required">
            </div>
            <!-- submit-->
            <div class="form-outline mb-4 w-50 ">
                <input type="submit" name="edit_products" class="btn mb-3 px-3 w-50" style="background-color: #cd9bf3;" value="Edit Products">
            </div>
    </form>
</div>

<?php
if(isset($_POST['edit_products'])){
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
    if($product_name=="" or $product_description=="" or $product_stock=="" or $product_categories=="" or $product_price==""){
        echo "<script>alert('Please fill all available information (except the three imaage files)')</script>";
        exit();
    }else{
        if($product_image1==""&&$product_image2=="" &&$product_image3==""){
            $update_product ="UPDATE products SET category_id='".$product_categories." ',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."' WHERE product_id='".$edit_id."'";
        
        }elseif ($product_image1!=""&&$product_image2=="" &&$product_image3=="") {
          $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image1='".$product_image1."' WHERE product_id='".$edit_id."'";

        }elseif ($product_image1!=""&&$product_image2!="" &&$product_image3=="") {
            $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image1='".$product_image1."',product_image2='".$product_image2."' WHERE product_id='".$edit_id."'";

        }elseif ($product_image1!=""&&$product_image2=="" &&$product_image3!="") {
           $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image1='".$product_image1."',product_image3='".$product_image3."' WHERE product_id='".$edit_id."'";

        }elseif ($product_image1!=""&&$product_image2!="" &&$product_image3!="") {
            $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image1='".$product_image1."',product_image2='".$product_image2."',product_image3='".$product_image3."' WHERE product_id='".$edit_id."'";

        }elseif ($product_image1 ==""&&$product_image2!="" &&$product_image3=="") {
            $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image2='".$product_image2."' WHERE product_id='".$edit_id."'";

        }elseif ($product_image1 ==""&&$product_image2!="" &&$product_image3!="") {
            $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image2='".$product_image2."',product_image3='".$product_image3."' WHERE product_id='".$edit_id."'";
           
        }elseif ($product_image1 ==""&&$product_image2=="" &&$product_image3!="") {
           $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image3='".$product_image3."' WHERE product_id='".$edit_id."'";
        }



        // move_uploaded_file($temp_image1,"./product_images/$product_image1");
        // move_uploaded_file($temp_image2,"./product_images/$product_image2");
        // move_uploaded_file($temp_image3,"./product_images/$product_image3");
        
        //update query
        // $update_product ="UPDATE products SET category_id='".$product_categories."',product_name='".$product_name."',product_description='".$product_description."',product_stock='".$product_stock."',product_price='".$product_price."',product_image1='".$product_image1."',product_image2='".$product_image2."',product_image3='".$product_image3."' WHERE product_id='".$edit_id."'";


        $result_update=mysqli_query($con,$update_product);
        if(!$result_update){
            echo "wrong".mysqli_error($con);
        }
        if($result_update){
        echo "<script>alert('Product has been modified successfully')</script>";
        echo "<script>window.open('./account.php?view_products','_self')</script>";
        }
    

    }

}
?>