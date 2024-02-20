<?php
include('../include/connect.php');
if(isset($_POST['submit_cate'])){
     $category_name=$_POST["insert_cate"];
     //select data from database
     $select_query="SELECT*FROM categories WHERE category_name='$category_name'";
     $result_select=mysqli_query($con,$select_query);
     $number=mysqli_num_rows($result_select);
     if($number>0){
        echo "<script>alert('This Category has existed');</script>";
     }else{
     $insert_query="INSERT INTO categories (category_name) VALUES ('".$category_name."')";
     $result=mysqli_query($con,$insert_query);
     if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
     }
    }
}
?>

<h2 class="my-4">Insert Categories</h2>

<form action="" method="post" class="md-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1" style="background-color: #cd9bf3;"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="insert_cate" placeholder="Please Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="border-0 p-2 my-3" style="background-color: #cd9bf3; width:180px;height: 40px;" name="submit_cate" value="Insert Categories">
    </div>
        
</form>