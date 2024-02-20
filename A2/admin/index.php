<?php include('../include/connect.php');
include('../fuctions/basic_fuction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
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
<style>
    body{
        overflow-x:hidden;
    }

</style>
<body background="https://img.tukuppt.com/bg_grid/00/23/11/7i5pzzav2z.jpg!/fh/350">
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!--adminname field-->
                    <div class="form-outline mb-4">
                        <label for="Adminname" class="form-label"> Admin Name</label>
                        <input type="text" id="Adminname" class="form-control"
                        placeholder="Enter your name" autocomplete="off" 
                        required="required" name="Adminname">
                    </div>
                    
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <label for="Adminpassword" class="form-label"> Password</label>
                        <input type="password" id="Adminpassword" class="form-control"
                        placeholder="Enter your password" autocomplete="off" 
                        required="required" name="Adminpassword">
                    </div>
                    
                    <div class = "text-center" >
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0"
                        name = "admin_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                            <a href="admin_register.php" class="text-danger">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--background-->
    <div class="bjimg"></div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){

    $Adminname=$_POST['Adminname'];
    $Adminpassword=$_POST['Adminpassword'];

   $select_query="Select * from `admin` where username='$Adminname'";
   
   $result=mysqli_query($con, $select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);
   
   if($row_count>0){
        if($Adminpassword == $row_data['password']){
          // session_start();
          echo "<script>alert('Login successful')</script>";
          $_SESSION['username']=$Adminname;
          echo "<script>window.open('account.php','_self')</script>";
         
        }
        else{
          echo "<script>alert('Password is wrong')</script>";
        }


   }
   else{
    echo "<script>alert('Invalid Access')</script>";
   }


}


?>