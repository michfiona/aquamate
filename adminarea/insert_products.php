<?php
include('../includes/connect.php');
include('../functions/common_functions.php'); 
session_start();

if(isset($_POST['insert_product'])){
$product_title=$_POST['product_title'];
$product_description=$_POST['product_description'];
$product_keyword=$_POST['product_keyword'];
$product_category=$_POST['product_category'];
$product_price=$_POST['product_price'];
$product_status='true';

$product_image1=$_FILES['product_image1']['name'];

$temp_image1=$_FILES['product_image1']['tmp_name'];

if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category==''
or $product_price=='' or $product_image1==''){
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
} else{
move_uploaded_file($temp_image1,"../product_images/$product_image1");

$insert_products="insert into `products` (product_title, product_description, 
product_keyword, category_id, product_image1, product_price, date, status) values ('$product_title','$product_description','$product_keyword',
'$product_category','$product_image1','$product_price',NOW(),'$product_status')";
$result_query=mysqli_query($con,$insert_products);
if($result_query){
    echo "<script>alert('Successfully inserted the products')</script>";
}
}
}
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
            <div class="navbar-nav ms-auto py-0">
                <a href="discussion.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Discussion
                    Forum<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <br>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <?php
        echo "<a href='' class='nav-item nav-link text-white'>WELCOME, $_SESSION[admin_name]</a>";
        echo "<a href='./users_area/logout.php' class='nav-item nav-link text-white'>LOGOUT</a>";
    ?>
    </nav>
    <br>

<div class="container mt-2">
    <h1 class="text-center text-dark">Insert Products</h1>

<!--form-->
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label text-light">Product Title</lable>
        <input type="text" name="product_title"
        id="product_title" class="form-control"
        placeholder="Enter Product Title" autocomplete="off"
        required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_description" class="form-label text-light">Product Description</lable>
        <input type="text" name="product_description"
        id="product_description" class="form-control"
        placeholder="Enter Product Description" autocomplete="off"
        required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keyword" class="form-label text-light">Product Keyword</lable>
        <input type="text" name="product_keyword"
        id="product_keyword" class="form-control"
        placeholder="Enter Product Keyword" autocomplete="off"
        required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" id="product_category" class="form-select">
            <option value="">Select a category</option>
            <?php
            $select_query="Select * from `categories`";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $category_title=$row['category_title'];
                $category_id=$row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label text-light">Product Image 1</lable>
        <input type="file" name="product_image1"
        id="product_image1" class="form-control"
        required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label text-light">Product Price</lable>
        <input type="number" name="product_price"
        id="product_price" class="form-control"
        placeholder="Enter Product Price" autocomplete="off"
        required="required" >
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product"
        class="btn btn-primary mb-3 px-3 text-dark" value="Insert Products">
    </div>

</form>
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