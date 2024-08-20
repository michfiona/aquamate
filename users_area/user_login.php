<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
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
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap"
            rel="stylesheet">

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



        <!-- Contact Start -->
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                    <h6 class="text-primary text-uppercase">Enter credentials</h6>
                    <h1 class="display-5 text-uppercase mb-0">Login</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-7">
                        <form action="" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    Username:<input type="text" id="user_username"
                                        class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off"
                                        style="height: 55px;" required="required" name="user_username" />
                                </div>
                                <div class="col-12">
                                    Password:<input type="password" id="user_password"
                                        class="form-control bg-light border-0 px-4" placeholder="" autocomplete="off"
                                        style="height: 55px;" required="required" name="user_password" />
                                </div>
                                <div class="col-12 mt-4 pt-2">
                                    <input type="submit" value="Login" class="bg-primary py-2 px-3 border-0 w-100"
                                        name="user_login">
                                </div>
                                <br>
                                Don't have an account? Register here<h5><a href="signup.php">Register</a></h5>
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
        <!--<a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>-->


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

    if (isset($_POST['user_login'])) {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $select_query = "Select * from `user_table` where username='$user_username'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();
        $user_email=$row_data['user_email'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        
        //cart item
        // $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
        // $select_cart=mysqli_query($con,$select_query_cart);
        // $row_count_cart=mysqli_num_rows($select_cart);
        if ($row_count > 0) {
            // $_SESSION['username']=$user_username;
            // $_SESSION['user_email']=$user_email;
            // $_SESSION['user_address']=$user_address;
            // $_SESSION['user_mobile']=$user_mobile;
            if (password_verify($user_password, $row_data['user_password'])) {
                    $_SESSION['username']=$user_username;
                    $_SESSION['user_email']=$user_email;
                    $_SESSION['user_address']=$user_address;
                    $_SESSION['user_mobile']=$user_mobile;
                    echo "<script>alert('You have logged in successfully')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";    
            } else {
                echo "<script>alert('Invalid Credential')</script>";
            }
        } else {
            echo "<script>alert('Username is not registered')</script>";

        }
    }

    

    ?>