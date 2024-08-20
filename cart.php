<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();

$total_price = 0;

$get_ip_add = getIPAddress();
if (isset($_POST['update_cart'])) {
    $quantities = $_POST['qty'];
    $product_id = $_POST['product_id'];
    // echo $product_id,$quantities;
    $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add' and product_id=$product_id";
    $result_products_quantity = mysqli_query($con, $update_cart);

    $cart_query = "SELECT * FROM `cart_details` INNER JOIN products on cart_details.product_id= products.product_id where ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    $result_count = mysqli_num_rows($result);
    if ($result_count > 0) { {
            while ($row = mysqli_fetch_array($result)) {
                $total_price += ($row['quantity'] * $row['product_price']);
            }
        }
    }

}
if (isset($_POST['remove_cart'])) {
    $product_id = $_POST['product_id'];
    $delete_query = "Delete from `cart_details` where product_id=$product_id";
    $run_delete = mysqli_query($con, $delete_query);
    if ($run_delete) {
        echo "<script>window.open('cart.php','_self')</script>";
    }
}
?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CART</title>
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

    <style>
        .cart_img {
            wisth: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
                <a href="cart.php" class="nav-item nav-link active"><i class="bi bi-cart"></i></a>
                <a href="product.php" class="nav-item nav-link">Products</a>
                <form class="d-flex" action="search_products.php" method="get">
                    <input type="search" placeholder="search.." class="nav-item nav-link" aria-label="Search"
                        name="search_data">
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
        if (!isset($_SESSION['username'])) {
            echo "<a href='' class='nav-item nav-link text-white'>WELCOME, CUSTOMER </a>";
            echo "<a href='./users_area/user_login.php' class='nav-item nav-link text-white'>LOGIN</a>";
            echo "<a href='./users_area/signup.php' class='nav-item nav-link text-white'>REGISTER</a>";
        } else {
            echo "<a href='' class='nav-item nav-link text-white'>WELCOME, $_SESSION[username]</a>";
            echo "<a href='./users_area/logout.php' class='nav-item nav-link text-white'>LOGOUT</a>";
            echo "<a href='./users_area/profile.php' class='nav-item nav-link text-white'>MY ACCOUNT</a>";
        }
        ?>
    </nav>

    <?php
    cart();

    ?>
    <br>
    <h1 class="text-center">CART</h1>
    <br>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">


                    <!--php code-->
                    <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "SELECT * FROM `cart_details` INNER JOIN products on cart_details.product_id= products.product_id where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $quantity = $row['quantity'];
                            $price_table = $row['product_price'];
                            $product_title = $row['product_title'];
                            $product_image1 = $row['product_image1'];
                            $total_price += ($row['quantity'] * $row['product_price']);
                            ?>
                            <tr>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                    <td>
                                        <?php echo $product_title ?>
                                    </td>
                                    <td><img src="./product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                    <td>
                                        <?php echo '<input type="number" name="qty" class="form-input w-50" value="' . intval($quantity) . '"' ?>
                                    </td>
                                    <td>&#8377;
                                        <?php echo $price_table ?>/-
                                    </td>
                                    <!-- <td><input type="checkbox" name="removeitem[]" value=" <?php echo $product_id ?>"></td> -->
                                    <td>
                                        <!--<button class="bg-info px-3 mx-3">Update</button>-->
                                        <input type="submit" value="Update Cart" class="bg-info px-3 mx-3 my-3"
                                            name="update_cart">
                                        <!--<button class="bg-info px-3 mx-3">Remove</button>-->
                                        <input type="submit" value="Remove from Cart" class="bg-info px-3 mx-3 my-3"
                                            name="remove_cart">
                                    </td>
                                </form>
                            </tr>
                            <?php

                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Oops! Your Cart is empty :(</h2>";
                    }
                    ?>
                    </tbody>
                </table>
                <div class="d-flex mb-5">
                    <?php
                    // $get_ip_add = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3 text-primary'>Subtotal : <strong>$total_price/-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 mx-3' name='continue_shopping'>";
                        if (!isset($_SESSION['username'])) {
                            echo "<button class='bg-dark text-light px-3 mx-3'><a href='./users_area/user_login.php'>Checkout</a></button>";
                            echo "<p>You have to login first to checkout</p>";
                        } else {
                            $username = $_SESSION['username'];
                            $get_user = "Select * from `user_table` where username='$username'";
                            $result = mysqli_query($con, $get_user);
                            $row_data = mysqli_fetch_assoc($result);
                            $user_id = $row_data['user_id'];
                            echo "<button class='bg-dark text-light px-3 mx-3'><a href='./users_area/order.php?user_id=$user_id'>Checkout</a></button>";
                        }
                    } else {
                        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 mx-3' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('product.php','_self')</script>";
                    }
                    ?>

                </div>
        </div>
    </div>
    </form>

    <!--remove item-->
    <!-- <?php
    function remove_cart_item()
    {

    }
    //echo $remove_item=remove_cart_item();
    remove_cart_item();
    ?> -->



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