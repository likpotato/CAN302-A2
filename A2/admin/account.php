<?php
include('../include/connect.php');
include('../fuctions/basic_fuction.php');
session_start();
// if(!$_SESSION['islogin']){

//     header("Location: index.php");exit;

// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap css-link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!--css link-->
    <link rel="stylesheet" href="../style.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }
        .body{
            position: relative;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
        }
        .user-image{
            width: 100px;
            border-radius: 100%;
            border: 1px solid #eee;
            height: 100px;
            object-fit: contain;
            position: relative;
            right : -90px;



        }
        .edit-image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .a{
            position: absolute;
            right : 50px;
            left: 10px;
            width: 100%;
        }
        .sidebar{
            position: relative;
			height: 150vh;
            width: 250px;
            background-color: #96a3b0;
			background-size:cover
            padding: .4rem .8rem;
            transition: all 0.5s ease;
        }
        .sidebar .top .logo{
            color: #fff;
            display:flex;
            align-items: center;

        }
        .top .logo i{
            font-size: 28px;
            margin-right: 5px;

        }
        .sidebar #btn{
            color: #fff;
            position: absolute;
            left: 90%;
            top: 0px;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            transform: translateX(-50%);
        }
        .sidebar ul{
            margin-top: 20px;
        }
        .sidebar ul li{
            position: relative;
            height: 50px;
            width: 100%;
            margin: 0 5px;
            list-style: none;
            line-height: 50px;

        }
        .sidebar ul li a{
            color: black;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 18px;

        }
        .sidebar ul li a:hover{
            color: #11101d;
           background:#fff ;
          
        }
        .sidebar ul li a i{
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            line-height: 50px;
            font-size: larger;

        }
        .sidebar.active ~ .main-content{
            left: 250px;
            width: calc(100%-250px);

        }
        .sidebar.active{
            width: 250px;

        }
        .pos{
            position: absolute;
            left : 300px;
            top: 140px;
            width: 70%;
        }
        .posi{
            position: absolute;
            right : 12px;
            top: -24px;
            width: 100%;
        }
        .cou_posi{
            position: absolute;
            width:100%;
            top: -25px;
            right:20px;
        }
		.order_posi{
			position: absolute;
            width:100%;
            top: -25px;
            right:20px;
		}
        .cate_pos{
            position: absolute;
            width:100%;
            top: 0px;
            right:0px;
           
        }
        .user_posi{
            position: absolute;
            width:100%;
            top: -25px;
            right:20px;
        }
        .admin_info{
            position: absolute;
            width:100%;
            top: -25px;
            right:10px;
        }
    </style>
</head>
<body>
      <!-- navbar -->
       <!--navbar-->
       <div class="container-fluid p-0 " >
        <!--first child-->
        <nav class="navbar navbar-expand-lg" style="background-color: #cd9bf3;">
  <div class="container-fluid">

    <img src="../images/logo1.png" alt="" width="100px" height="100px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
      </form>
    </div>
  </div>
  
</nav>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>Lovin Eye strore</span>
            </div>
        </div>
        <!-- <div class="user-image"> -->
            
             <?php 
            $Adminname=$_SESSION['username'];
            $admin_image="Select * from `admin` where username='$Adminname'";
            
            $result=mysqli_query($con, $admin_image);
            $row=mysqli_fetch_array($result);
            
            $admin_Image=$row['image'];
            // echo " <img arc='./admin_images/$admin_Image' class='user-image' alt=''>"
            ?>
            <img src="./admin_images/<?php echo $admin_Image?>" alt="" class="user-image">
            
            <!-- </div> -->
            <div>
            <i class="a">
                    <?php
                    if(!isset($_SESSION['username'])){
                      echo "<i class='nav-item'> 
                      <a class='nav-link' href='./admin_login.php'>Login</a></i>";
                    }
                    else{
                      echo "<i class='nav-item text-center'>
                      <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></i>";
                    }
                    

                    ?>

                    </i>
            </div>
        
        <ul>
            <li>
                <a href="account.php?view_products">
                <i class='bx bxs-shopping-bags' ></i>
                     <span class="nav-item">View Products</span>
                </a>
            </li>
            <li>
                <a href="account.php?view_categories">
                    <i class='bx bx-category'></i>
                     <span class="nav-item">View Categories</span>
                </a>
            </li>
            <li>
                <a href="account.php?insert_products">
                <i class='bx bx-folder-plus'></i>
                     <span class="nav-item">Insert Products</span>
                </a>
            </li>
            <li>
                <a href="account.php?insert_categories">
                <i class='bx bx-message-alt-add' ></i>
                     <span class="nav-item">Insert Categories</span>
                </a>
            </li>
            <li>
                <a href="account.php?order">
                <i class='bx bxs-cart' ></i>
                     <span class="nav-item">Order</span>
                </a>
            </li>
            <li>
                <a href="account.php?coupons">
                <i class='bx bxs-discount' ></i>
                     <span class="nav-item">Coupons</span>
                </a>
            </li>
            <li>
                <a href="account.php?user">
                <i class='bx bx-user' ></i>
                     <span class="nav-item">User</span>
                </a>
            </li>
            <li>
                <a href="account.php?admin_info">
                <i class='bx bx-notepad'></i>
                     <span class="nav-item">Admin Info</span>
                </a>
            </li>
            <li>
                <a href="./index.php">
                <i class='bx bx-log-out'></i>
                     <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>

            
        
    </div>
     <!-- forth child -->
     <div class=" pos">
     <?php
        if(isset($_GET['view_products'])){
            include('view_products.php');
        } 
    ?>
    <div class=" cate_pos">
        <?php
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        } 
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        } 
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        } 
        

        ?>
    </div>

    <div class="cou_posi">
        <?php
        if(isset($_GET['coupons'])){
            include('coupons.php');
        }
        ?>
    </div>
	
    <div class="user_posi">
        <?php
        if(isset($_GET['user'])){
            include('users.php');
        }
        if(isset($_GET['edit'])){
            include('users_update.php');      
        }

        ?>
    </div>


     <div class=" posi">
    <?php
          if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['insert_products'])){
          include('insert_products.php');
      }
      if(isset($_GET['remove_products'])){
        include('remove_products.php');
       
    }
    if(isset($_GET['coupons_insert'])){
        include('coupons_insert.php');
       
    }
            ?>
    </div>
	
	<div class="order_posi">
	    <?php
	    if(isset($_GET['order'])){
	        include('order.php');
	    }
	    ?>
	</div>
   
<div class="admin_info">
<?php 
if(isset($_GET['admin_info'])){
    include('admin_info.php');
} 
?>

</div>
    
</body>
<!-- bootstrap js-link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>