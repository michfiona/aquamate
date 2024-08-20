<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php'); 
session_start();
?>

<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin panel</title>
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

    <!--modal-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .product_img{
            width:100px;
            object-fit:contain;
        }
        .service_img{
            width:100px;
            object-fit:contain;
        }
    </style>

</head>

<body style="background-image: url('../img/pexels-amarin-kuenzli-2806761.jpg');">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        
            <h1 class="m-0 text-uppercase text-dark"><i class="flaticon-food fs-1 text-primary me-3 p-2"></i>AQUA MATE</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- <div class="navbar-nav ms-auto py-0">
                <a href="discussion.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion
                    Forum<i class="bi bi-arrow-right"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->
    <br>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <?php
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, $_SESSION[admin_name]</a>";
        echo "<a href='./admin_logout.php' class='nav-item nav-link text-white'>LOGOUT</a>";
    ?>
    </nav>
    <br>

    <!--manage-->
    <div class="row">
        <div class="col-md-12 p-4">
            <div class="button text-center">
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="insert_products.php" class="navlink text-dark bg-light my-1">Insert Products</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?view_products" class="navlink text-dark bg-light my-1">View Products</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?insert_category" class="navlink text-dark bg-light my-1">Insert Categories</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?view_categories" class="navlink text-dark bg-light my-1">View Categories</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?cust_request" class="navlink text-dark bg-light my-1">Customization Requests</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?service_request" class="navlink text-dark bg-light my-1">Service Requests</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3 my-4"><a href="index.php?view_feedback" class="navlink text-dark bg-light my-1">View Feedback</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3 my-4"><a href="index.php?view_blogs" class="navlink text-dark bg-light my-1">View Blogs</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?list_orders" class="navlink text-dark bg-light my-1">All Orders</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?list_payments" class="navlink text-dark bg-light my-1">All Payments</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?list_users" class="navlink text-dark bg-light my-1">List Users</a></button>
            <button class="btn btn-light w-20 py-3 border-dark border-2 mx-3"><a href="index.php?view_report" class="navlink text-dark bg-light my-1">View Report</a></button>

            </div>
        </div>
    </div>   
    
    <!-- fourth child-->

    <div class="container my-5">
        <?php
        if(isset($_GET['insert_category'])){
            include('./insert_categories.php');
        }
        if(isset($_GET['view_products'])){
            include('./view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('./edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('./delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('./view_categories.php');
        }
        if(isset($_GET['edit_category'])){
            include('./edit_category.php');
        }
        if(isset($_GET['delete_category'])){
            include('./delete_category.php');
        }
        if(isset($_GET['list_orders'])){
            include('./list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('./list_payments.php');
        }
        if(isset($_GET['delete_order'])){
            include('./delete_order.php');
        }
        if(isset($_GET['delete_payment'])){
            include('./delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('./list_users.php');
        }
        if(isset($_GET['view_feedback'])){
            include('./view_feedback.php');
        }
        if(isset($_GET['service_request'])){
            include('./service_request.php');
        }
        if(isset($_GET['cancel_request'])){
            include('./cancel_request.php');
        }
        if(isset($_GET['confirm_request'])){
            include('./confirm_request.php');
        }
        if(isset($_GET['view_blogs'])){
            include('./view_blogs.php');
        }
        if(isset($_GET['delete_feedback'])){
            include('./delete_feedback.php');
        }
        if(isset($_GET['delete_blog'])){
            include('./delete_blog.php');
        }
        if(isset($_GET['view_report'])){
            include('./view_report.php');
        }
        if(isset($_GET['cust_request'])){
            include('./cust_request.php');
        }
        if(isset($_GET['cancel_aqua'])){
            include('./cancel_aqua.php');
        }
        if(isset($_GET['confirm_aqua'])){
            include('./confirm_aqua.php');
        }
        ?>
    </div>

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

</php>