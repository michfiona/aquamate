<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="utf-8">
    <title>AQUA MATE - LIA AQUARIUMS AND PETS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free php " name="keywords">
    <meta content="Free php " name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Our Shop</h6>
                        <span><a
                                href="https://www.google.com/maps/place/Lia+Aquarium+%26+Pets,+Ashok+Nagar+Opp+Ashok+Nagar+Higher+Primary+School,+Mangaluru,+Karnataka+575006/data=!4m2!3m1!1s0x3ba3514d62551c79:0x6b53998da2528e97?utm_source=mstt_1&entry=gps&g_ep=CAESCTExLjcwLjMwNBgAIIgnKgBCAklO">Ashoknagar,
                                Mangalore</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-instagram fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Instagram</h6>
                        <span><a
                                href="https://www.instagram.com/liaaquariumandpets/?igshid=MjljNjAzYmU%3D">Instagram</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+91 7760492777</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="flaticon-food fs-1 text-primary me-3"></i>AQUA MATE</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <!--<input type="text" placeholder="search..." class="nav-item nav-link">-->
                <a href="../index.php" class="nav-item nav-link">Home</a>
                <!--<a href="about.php" class="nav-item nav-link">About</a>-->

                <a href="../service.php" class="nav-item nav-link">Services</a>
                <a href="../cart.php" class="nav-item nav-link"><i class="bi bi-cart"></i></a>
                <a href="../product.php" class="nav-item nav-link">Products</a>
                <form class="d-flex" action="../search_products.php" method="get">
                <input type="search" placeholder="search.." class="nav-item nav-link" aria-label="Search" name="search_data">
                        <input class="btn btn-primary py-2 px-3" type="submit" value="search" name="search_data_product">
                </form>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu m-0">
                        <?php
                        //getcategories();
                        global $con;
                        $select_categories="Select * from `categories`";
                        $result_categories=mysqli_query($con,$select_categories);
                        while($row_data=mysqli_fetch_assoc($result_categories)){
                            $category_title=$row_data['category_title'];
                            $category_id=$row_data['category_id'];
                            echo "<a href='../category.php?category_id=$category_id&category_title=$category_title' class='dropdown-item'>$category_title</a>";
                        }
                        ?>
                    </div>
                </div>
                <a href="../discussion.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion
                    Forum<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="" class="nav-item nav-link text-white">WELCOME, CUSTOMER</a>
    <a href="./users_area/user_login.php" class="nav-item nav-link text-white">LOGIN</a>
    </nav>


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Enter Details</h6>
                <h1 class="display-5 text-uppercase mb-0">Sign-up</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
                    <form action="" method="post">
                        <d class="row g-3">
                            <div class="col-12">
                                Username:<input type="text" id="user_username" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="user_username" />
                            </div>
                            <div class="col-12">
                            Email:<input type="email" id="user_email" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="user_email" />
                            </div>
                            <div class="col-12">
                            Password:<input type="password" id="user_password" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="user_password" />
                            </div>
                            <div class="col-12">
                            Confirm Password:<input type="password" id="conf_user_password" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="conf_user_password" />
                            </div>
                            <div class="col-12">
                            Address:<input type="text" id="user_address" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="user_address" />
                            </div>
                            <div class="col-12">
                            Contact:<input type="tel" pattern="[0-9]{10}" id="user_contact" class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off" style="height: 55px;"
                            required="required" name="user_contact" />
                            </div>
                            <div class="col-12 mt-4 pt-2">
                                <input type="submit" value="Register" class="bg-primary py-2 px-3 border-0 w-100" name="user_register">
                                <!--<button class="btn btn-primary w-50 py-3" type="submit">Sign-up</button>-->
                            </div>
                            <br>
                            Already have an account? Login here<h5><a href="user_login.php">Login</a></h5>
                        </div>
                    </form>
                    
                </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

   <!-- https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd -->
    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">For queries or doubts, contact us directly.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Ashoknagar, Mangalore</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>liaaquariumandpets</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+91 7760492777</p>
                </div>
               </div>
               </div>
               </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!--  Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();
    echo $user_username;

    //select 
    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exists')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords dont match')</script>";
    }
    else{
        

    //insert query
    $insert_query="insert into `user_table` (username,	user_email,user_password,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    }

    //selecting cart items
    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}  


?>