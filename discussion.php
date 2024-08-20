<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
</head>

<style>
        .disc_img{
            width:100px;
            object-fit:contain;
        }
    </style>

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
                <a href="index.php" class="nav-item nav-link">Home</a>

                <a href="service.php" class="nav-item nav-link">Services</a>
                <a href="cart.php" class="nav-item nav-link"><i class="bi bi-cart"></i></a>
                <a href="product.php" class="nav-item nav-link">Products</a>
                <form class="d-flex" action="search_products.php" method="get">
                <input type="search" placeholder="search.." class="nav-item nav-link" aria-label="Search" name="search_data">
                        <input class="btn btn-primary py-2 px-3" type="submit" value="search" name="search_data_product">
                </form>
                        
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu m-0">
                        <?php
                        getcategories();
                        ?>
                    </div>
                </div>
                <a href="" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion
                    Forum<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <?php
    if(!isset($_SESSION['username'])){
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, CUSTOMER </a>";
        echo "<a href='./users_area/user_login.php' class='nav-item nav-link text-white'>LOGIN</a>";
        echo "<a href='./users_area/signup.php' class='nav-item nav-link text-white'>REGISTER</a>";
    }else{
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, $_SESSION[username]</a>";
        echo "<a href='./users_area/logout.php' class='nav-item nav-link text-white'>LOGOUT</a>";
        echo "<a href='./users_area/profile.php' class='nav-item nav-link text-white'>MY ACCOUNT</a>";
    }
    ?>
    </nav>


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">User Community</h6>
                <h1 class="display-5 text-uppercase mb-0">Discussion Forum for Pet Lovers</h1>
            </div>
            <?php
            if(!isset($_SESSION['username'])){
                                echo "<br><br><button class='bg-light px-3 mx-3'><a href='./users_area/user_login.php'>Post your own Blog</a></button>";
                                echo "<p>You have to login first to upload your blog</p>";
                            }
                            else{
                                echo "<br><br><button class='bg-light px-3 mx-3'><a href='./users_area/upload_blog.php'>Post your own Blog</a></button>";
                            }
                            ?>
            
    <!-- Contact End -->

    <?php


    // $username = $_SESSION['username'];
    $get_post="Select * from `discussion_table`";
    $result=mysqli_query($con, $get_post);
    $row_count=mysqli_num_rows($result);

echo "<br>";



//  <!-- Blog Start -->
 if ($row_count==0){ 
     echo "<h3 class='bg-light text-danger text-center mt-5'>No Posts yet</h3>";
 }else{
    while($row_data=mysqli_fetch_assoc($result)){  
        $disc_id=$row_data['disc_id'];
        $disc_user=$row_data['disc_user'];       
        $subject=$row_data['subject'];
        $message=$row_data['message'];
        $date=$row_data['date'];
        $disc_img=$row_data['disc_img'];
     echo "
 <div class='container py-5'>
        <div class='row g-5'>
             <!-- Blog list Start -->
            <div class='col-lg-8'>
                <div class='blog-item mb-5'>
                    <div class='row g-0 bg-light overflow-hidden'>
                        <div class='col-12 col-sm-5 h-100'>
                            <img class='img-fluid h-100' src='./discussion_images/$disc_img' class='disc_img' style='object-fit: cover;'>
                        </div>
                        <div class='col-12 col-sm-7 h-100 d-flex flex-column justify-content-center'>
                            <div class='p-4'>
                                <div class='d-flex mb-3'>
                                    <small class='me-3'><i class='bi bi-bookmarks me-2'></i> $disc_user</small>
                                    <small><i class='bi bi-calendar-date me-2'></i>$date</small>
                                </div>
                                <h5 class='text-uppercase mb-3'>$subject</h5>
                                
                                <a class='text-primary text-uppercase' href='detail.php?view_blog=$disc_id'>Read More<i class='bi bi-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                ";
 }}

                ?>
                
                
       <!-- Footer Start -->

       <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">For more information, contact us directly.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Ashoknagar, Mangalore</p>
                    <p class="mb-2"><i class="bi bi-instagram text-primary me-2"></i>Instagram: liaaquariums</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+91 7760492777</p>
                </div>
            </div>
        </div>
 <!-- </div> -->
    

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

