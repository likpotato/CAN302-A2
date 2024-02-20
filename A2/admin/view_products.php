<h3>All Products</h3>
<table class="table table-bordered mt-5">
    <thead style="background-color: darkgray;">
        <tr class="text-center">
            <th>No.</th>
            <!-- <th>Product ID</th> -->
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products="SELECT * FROM products JOIN categories on products.category_id=categories.category_id";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_name=$row["product_name"];
            $product_id=$row["product_id"];
            $product_image1=$row["product_image1"];
            $product_stock=$row["product_stock"];
            $product_price=$row["product_price"];
            $product_category=$row["category_name"];
            $number++;
           
        ?>
        <tr class='text-center'>
            <td><?php echo $number;?></td>
            <!-- <td><?php echo $product_id;?></td> -->
            <td><?php echo $product_name;?></td>
            <td> <img src='./product_images/<?php echo $product_image1;?>' width='100px' height='100px'></td>
            <td><?php echo $product_price;?></td>
            <td><?php echo $product_stock;?></td>
            <td><?php echo $product_category;?></td>
            <td><a href='account.php?edit_products=<?php echo $product_id;?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='account.php?remove_products=<?php echo $product_id;?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
