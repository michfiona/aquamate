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
    <title>PET SHOP - Pet Shop Website </title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .disc_img{
            height:30px;
            width:30%;
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
                <a href="index.php" class="nav-item nav-link active">Home</a>
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
                <a href="discussion.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion
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
  
    <?php
    if(isset($_GET['view_blog'])){ 
        $disc_id=$_GET['view_blog'];
    // $username = $_SESSION['username'];
    $get_post="Select * from `discussion_table`  where disc_id=$disc_id";
    $result=mysqli_query($con, $get_post);
    $row_count=mysqli_num_rows($result);

echo "<br>";
// if ($row_count==0){ 
//     echo "<h3 class='bg-light text-danger text-center mt-5'>No Posts yet</h3>";
// }else{
while($row_data=mysqli_fetch_assoc($result)){  
       $disc_id=$row_data['disc_id'];
       $disc_user=$row_data['disc_user'];
       $subject=$row_data['subject'];
       $message=$row_data['message'];
       $date=$row_data['date'];
       $disc_img=$row_data['disc_img'];
    echo"

    <!-- Blog Start -->
    <div class='container py-5'>
        <div class='row g-5'>
            <div class='col-lg-8'>
                <!-- Blog Detail Start -->
                <div class='d-flex mb-3'>
                <small class='me-3'><i class='bi bi-bookmarks me-2'></i> $disc_user</small>
                <small><i class='bi bi-calendar-date me-2'></i>$date</small>
            </div>
                <div class='mb-5'>
                <h1 class='text-uppercase mb-4'>$subject</h1>
                    <img class='disc-img w-50 h-30 rounded mb-5' src='./discussion_images/$disc_img' alt=''>
                    
                    <p>$message</p>
                </div>
                </div>
                </div>";
   

    

                // <!-- Blog Detail End -->

    $get_comment="Select * from `disc_comment` where disc_id='$disc_id'";
    $result=mysqli_query($con, $get_comment);
    $row_count=mysqli_num_rows($result);
    // $number=0;
    
if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No Comments yet</h3>";
}else{ 
    echo"<h3 class='text-uppercase border-start border-5 border-primary ps-3 mb-4'>Comments</h3>";
while($row_data=mysqli_fetch_assoc($result)){ 
    // $number++; 
$comment_user=$row_data['comment_user'];
$comment_id=$row_data['comment_id'];
$comment=$row_data['comment'];
$comment_date=$row_data['comment_date'];

echo "<br>";

// }else{
                // <!-- Comment List Start -->
                echo"<div class=''>
                    <div class='d-flex'>
                        <div class='ps-3'>
                            <h6><a href=''>$comment_user</a> <small><i>$comment_date</i></small></h6>
                            <p>$comment</p>
                        </div>
                    </div>
                </div>";
}
}
}

                // <!-- Comment List End -->

if(isset($_SESSION['username'])){
                // <!-- Comment Form Start -->
                echo"<div class='bg-light rounded p-5'>
                    <h3 class='text-uppercase border-start border-5 border-primary ps-3 mb-4'>Leave a comment</h3>
                    <form action='' method='post'>
                        <div class='row g-3'>
                            <div class='col-12'>
                                <textarea class='form-control bg-white border-0' rows='5' placeholder='Comment' name='comment' required='required'></textarea>
                            </div>
                            <div class='col-12 mt-4 pt-2'>
                                    <input type='submit' value='Leave your comment' class='bg-primary py-2 px-3 border-0 w-100'
                                        name='submit_comment'>
                            </div>
                        </div>
                    </form>
                </div>";
                if(isset($_POST['submit_comment'])){
                    $comment=$_POST['comment'];
                    $comment_user = $_SESSION['username'];
                    $email_id = $_SESSION['user_email'];
                    $disc_id=$_GET['view_blog'];
                    //insert query
                    $insert_query="insert into `disc_comment` (disc_id, comment_user, email_id, comment, comment_date) values ('$disc_id','$comment_user','$email_id','$comment',NOW())";
                    //$sql_execute=mysqli_query($con,$insert_query);
                    $result_query=mysqli_query($con,$insert_query);
                    if($result_query){
                    echo "<script>alert('Commented successfully')</script>";
                }
                
                
}
}
else{
    echo "<br><h3 class='text-success'>You have to login to leave a comment</h3>";
}


    }

                ?>
                <!-- Comment Form End -->
            </div>

            


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