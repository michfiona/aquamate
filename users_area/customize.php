<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AQUA MATE- services</title>
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

    <style>
        .margin {
            margin-left: 80px;
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
                        <span><a href="https://www.google.com/maps/place/Lia+Aquarium+%26+Pets,+Ashok+Nagar+Opp+Ashok+Nagar+Higher+Primary+School,+Mangaluru,+Karnataka+575006/data=!4m2!3m1!1s0x3ba3514d62551c79:0x6b53998da2528e97?utm_source=mstt_1&entry=gps&g_ep=CAESCTExLjcwLjMwNBgAIIgnKgBCAklO">Ashoknagar, Mangalore</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-instagram fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Instagram</h6>
                        <span><a href href="https://www.instagram.com/liaaquariumandpets/?igshid=MjljNjAzYmU%3D">Instagram</a></span>
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
        <a href="../index.php" class="navbar-brand ms-lg-5">
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
                
                <a href="../service.php" class="nav-item nav-link active">Services</a>
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
                <a href="../discussion.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion Forum<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">

    <?php
    if(!isset($_SESSION['username'])){
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, CUSTOMER </a>";
        echo "<a href='user_login.php' class='nav-item nav-link text-white'>LOGIN</a>";
        echo "<a href='signup.php' class='nav-item nav-link text-white'>REGISTER</a>";
    }else{
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, $_SESSION[username]</a>";
        echo "<a href='logout.php' class='nav-item nav-link text-white'>LOGOUT</a>";
        echo "<a href='profile.php' class='nav-item nav-link text-white'>MY ACCOUNT</a>";
    }
    ?>
    </nav>
    
    <br>
    <p class='text-dark text-center'>Enter details for your Aquarium and we will customize and deliver it for you.</p>
    <p class='text-danger text-center'>    Note that the Payment for this will be taken care Offline.
    </p>
    <div class="container-fluid py-5">
        <div class="container">
    <h2 class='text-primary text-center'>Select what you need:</h2><br>
    <div class="row g-5">
    <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-triangle-half display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Aquarium Top</h5>                    
                            <a class='text-primary text-uppercase' href='customize.php?cust_top'><i class='bi bi-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi-bi bi-aspect-ratio display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Aquarium Tank</h5>                   
                            <a class='text-primary text-uppercase' href='customize.php?cust_tank'><i class='bi bi-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
</div>

<div class="container my-5">
        <?php
        if(isset($_GET['cust_top'])){
            include('./cust_top.php');
        }
        if(isset($_GET['cust_tank'])){
            include('cust_tank.php');
        }
        if(isset($_GET['cancel_aquarium'])){
            include('cancel_aquarium.php');
        }
        ?>


<?php
$username = $_SESSION['username'];
    $get_request="Select * from `customize_table` where username='$username'";
    $result=mysqli_query($con, $get_request);
    $row_count=mysqli_num_rows($result);

echo "<br>";

if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>You have no Aquarium Tank Requests yet</h3>";
}else{
    echo "<h3 class='text-center dark'>Your Aquarium Requests</h3>
    <table class='table table-bordered mt-5'>
    <thead class='bg-primary text-dark'>
    <tr class='text-center'>
<th>Sl no</th>
<th>Type</th>
<th>Length</th>
<th>Breadth</th>
<th>Height</th>
<th>Color</th>
<th>Cancel</th>
<th>Status</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$customize_id=$row_data['customize_id'];
$type=$row_data['type'];
$length=$row_data['length'];
$breadth=$row_data['breadth'];
$height=$row_data['height'];
$color=$row_data['color'];
$status=$row_data['status'];

$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$type</td>
<td>$length</td>
<td>$breadth</td>
<td>$height</td>
<td>$color</td>";

if($status=='Cancelled' || $status=='Booked'){
    echo"<td>--</td>
    <td>$status</td>
    </tr>";
    }
    else{ 
echo"<td><a href='customize.php?cancel_aquarium=$customize_id' class='text-dark'><i class='bi bi-x-circle-fill'></i></a></td>
<td>$status</td>
</tr>";
    }
}
}


?>
        
       
    </tbody>
</table>

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">For queries or doubts, contact us directly.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Ashoknagar, Mangalore</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>liaaquariumandpets</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+91 7760492777</p><br><br><br>
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
    <script src="./lib/easing/easing.min.js"></script>
    <script src="./lib/waypoints/waypoints.min.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.min.js"></script>

    <!--  Javascript -->
    <script src="./js/main.js"></script>
</body>

</html>