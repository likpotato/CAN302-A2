<h3>All Categories</h3>
<table class="table table-bordered mt-5">
    <thead style="background-color: darkgray;">
        <tr class="text-center">
            <th>No.</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat="SELECT*FROM categories";
        $result=mysqli_query($con,$select_cat);
        $number=0;

        // $warn_query="SELECT `product_name`,`category_name`,`product_stock`,`product_id`, products.`category_id` FROM `products` JOIN  `categories` on products.category_id=categories.category_id WHERE category_id=$delete_category";
        // $result_warn=mysqli_query($con,$warn_query);
        // $row_count=mysqli_num_rows($warn_query);


        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_name=$row['category_name'];

            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $category_name;?></td>
            <td><a href='account.php?edit_category=<?php echo $category_id?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
        
        <?php
        $warn_query="SELECT `product_name`,`category_name`,`product_stock`,`product_id`, categories.`category_id` FROM `products` JOIN  `categories` on products.category_id=categories.category_id WHERE categories.`category_id` =$category_id";
        $result_warn=mysqli_query($con,$warn_query);
        if(!$result_warn){
            printf(mysqli_error($con));
        }
        $row_count=mysqli_num_rows($result_warn);
        if($row_count>0){
        ?>
        <td><a href='account.php?delete_category=<?php echo $category_id?>'onclick="return confirm('There are still some products in this category, are you sure you want to delete this category?')"><i class='fa-solid fa-trash'> </i></a></td>
        <?php }
        else{ ?>
            <td><a href='account.php?delete_category=<?php echo $category_id?>' onclick="return confirm('Are you sure you want to delete this category?')"><i class='fa-solid fa-trash'></i></a></td>
        <?php } 

        ?>


        </tr>
        <?php


        }
        ?>

    </tbody>
</table>