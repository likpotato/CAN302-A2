<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    //echo $edit_category;

    $get_categories="SELECT*FROM categories WHERE category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_name=$row['category_name'];
    //echo $category_name;
}
if(isset($_POST['edit_cat'])){
    $cat_name=$_POST['category_name'];

    $update_query="UPDATE categories SET category_name='$cat_name' WHERE category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category has been modified successfully')</script>";
        echo "<script>window.open('./account.php?view_categories','_self')</script>";
    }
}
?>




<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-80 m-auto">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" 
            required="required" value='<?php echo $category_name;?>'>
        </div>
        <input type="submit" value="Update Category" class="btn px-3 mb-3" 
        style="background-color: #cd9bf3;" name="edit_cat">
    </form>
</div>