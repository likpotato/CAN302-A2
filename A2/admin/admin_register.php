<?php include('../include/connect.php');
include('../fuctions/basic_fuction.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin register</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!--fonts awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
            body{
                background-size: 100% ;
            }
    </style>
    
</head>

<body background="https://img.tukuppt.com/bg_grid/00/23/11/7i5pzzav2z.jpg!/fh/350">
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--adminname field-->
                    <div class="form-outline mb-4">
                        <label for="Adminname" class="form-label"> Name</label>
                        <input type="text" id="Adminname" class="form-control"
                        placeholder="Enter your name" autocomplete="off" 
                        required="required" name="Adminname">
                    </div>
                    <!--image field-->
                    <div class="form-outline mb-4">
                        <label for="Adminimage" class="form-label"> Profile Picture</label>
                        <input type="file" id="Adminimage" class="form-control"
                        placeholder="Select your photo" autocomplete="off" 
                        required="required" name="Adminimage">
                    </div>
                    <!--email field-->
                    <div class="form-outline mb-4">
                        <label for="Adminemail" class="form-label"> Email</label>
                        <input type="email" id="Adminemail" class="form-control"
                        placeholder="Enter your email" autocomplete="off" 
                        required="required" name="Adminemail">
                    </div>
                    <!--mobile field-->
                    <div class="form-outline mb-4">
                        <label for="Adminmobile" class="form-label"> Contact</label>
                        <input type="text" id="Adminmobile" class="form-control"
                        placeholder="Enter your phone" autocomplete="off" 
                        required="required" name="Adminmobile">
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <label for="Adminpassword" class="form-label"> Password</label>
                        <input type="password" id="Adminpassword" class="form-control"
                        placeholder="Enter your password" autocomplete="off" 
                        required="required" name="Adminpassword">
                    </div>
                    
                    <div class = "text-center" >
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0"
                        name = "admin_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
                            <a href="index.php" class="text-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
    $Adminname=$_POST['Adminname'];
    $Adminimage=$_FILES['Adminimage']['name'];
    $Adminimage_tmp=$_FILES['Adminimage']['tmp_name'];
    $Adminemail=$_POST['Adminemail'];
    $Adminmobile=$_POST['Adminmobile'];
    $Adminpassword=$_POST['Adminpassword'];

    // select query
    $select_query="Select * from `admin` where username='$Adminname' or email ='$Adminemail'" ;
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Name and Email already exsit')</script>";
    }
    else{
        // insert query
        
        move_uploaded_file($Adminimage_tmp,"./admin_images/$Adminimage");
        $insert_query="insert into `admin` (username, password, email, mobile, image) 
        values('$Adminname','$Adminpassword', '$Adminemail', '$Adminmobile', '$Adminimage')";

        $sql_execute=mysqli_query($con, $insert_query);
        
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";

        }

        if(!$sql_execute){
            
            die(mysqli_error($con));
    }

    }




}



?>