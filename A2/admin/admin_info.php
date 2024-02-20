<?php
include('../include/connect.php');
// include('../fuctions/basic_fuction.php');

if(isset($_GET ['admin_info'])){
    $admin_session_name=$_SESSION['username'];
    $select_query="Select * from `admin` where username='$admin_session_name'";
    
    $result_query=mysqli_query($con, $select_query);
    
    $row_fetch=mysqli_fetch_assoc($result_query);
    
    $admin_id=$row_fetch['ID'];
    $admin_name=$row_fetch['username'];
    $admin_email=$row_fetch['email'];
    $admin_mobile=$row_fetch['mobile'];
    $admin_password=$row_fetch['password'];

}


    if(isset($_POST['admin_update'])){
        $update_id=$admin_id;
        $Admin_name=$_POST['admin_name'];
        $Admin_email=$_POST['admin_email'];
        $Admin_mobile=$_POST['admin_mobile'];

        $Admin_password=$_POST['admin_password'];
        $admin_password_again =$_POST['admin_password_again'];
        echo $Admin_password;
        echo $admin_password_again;


        $Admin_Image=$_FILES['admin_image']['name'];
        $Admin_Image_tmp=$_FILES['admin_image']['tmp_name'];
        move_uploaded_file($Admin_Image_tmp,"./admin_images/$Admin_Image");
    
        if($Admin_password=="" ||$admin_password_again ==""){
            if($Admin_Image ==""){
            $updata_data="update `admin` set username='$Admin_name', email='$Admin_email',mobile='$Admin_mobile'where ID='$update_id'";
            }else{
             $updata_data="update `admin` set username='$Admin_name', email='$Admin_email',mobile='$Admin_mobile', image='$Admin_Image' where ID='$update_id'";
            }
            $result_query_update=mysqli_query($con, $updata_data);
            if($result_query_update){
                echo "<script>alert('Info updated successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }

        } else if($Admin_password ==$admin_password_again) {

         if($Admin_Image ==""){
            $updata_data="update `admin` set username='$Admin_name', email='$Admin_email',mobile='$Admin_mobile',password='$Admin_password' where ID='$update_id'";
            }else{
             $updata_data="update `admin` set username='$Admin_name', email='$Admin_email',mobile='$Admin_mobile', image='$Admin_Image',password='$Admin_password' where ID='$update_id'";
            }
            $result_query_update=mysqli_query($con, $updata_data);
          
            if($result_query_update){
                echo "<script>alert('Info updated successfully (include the password)')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }

        }else if($Admin_password !=$admin_password_again){
            echo "<script>alert('The two password is different, please input the same password')</script>";

        }
          
        
    
    }

    
    







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>

    <h2 class="my-4">Edit Admin Profile</h2>
    
    <div class="col-lg-12 col-xl-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
        <label for="Adminname" class="form-label"> Name</label>
            <input type="text" class="form-control" value="<?php echo $admin_name ?>" name="admin_name">
        </div>
        <div class="form-outline mb-4 d-flex w-60 m-auto">
            <label for="Adminimage" class="form-label"> Profile Picture</label>
            <input type="file" class="form-control m-auto" name="admin_image">
            <!-- <img src="./admin_images/<?php echo $admin_Image?>" alt="" class="edit-image"> -->
        </div>
        <div class="form-outline mb-4">
            <label for="Adminemail" class="form-label"> Email</label>
            <input type="email" class="form-control" value="<?php echo $admin_email ?>" name="admin_email">
        </div>
        <div class="form-outline mb-4">
            <label for="Adminmobile" class="form-label"> Contact</label>
            <input type="text" class="form-control" value="<?php echo $admin_mobile ?>" name="admin_mobile">
        </div>
        <div class="form-outline mb-4">
            <label for="Adminpassword" class="form-label"> Password</label>
            <!-- <input type="text" class="form-control" value="<?php echo $admin_password ?>" name="admin_password"> -->
            <input type="text" class="form-control" value="" name="admin_password">
        </div>
          <div class="form-outline mb-4">
            <label for="AdminpasswordRepeat" class="form-label"> Password Again</label>
            <input type="text" class="form-control" value="" name="admin_password_again">
        </div>


        <div class="form-outline mb-4 w-50  ">
                <input type="submit" value="Update" class="btn mb-3 px-3 w-50" 
                name="admin_update" style="background-color: #cd9bf3;" >
            </div>
        

</form>
</div>
</div>
</body>
</html>

