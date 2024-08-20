<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
<style>
body{
| overflow: hidden;
}
</style>
</head>
<body>
<div class="container-fluid m-3">
<h2 class="text-center mb-5">Admin Login
</h2>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-lg-6"> <img src="../img/shop.jpeg" alt="Admin Registration"
class="img-fluid">
</div>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-lg-6 col-xl-4"> 
<form action="" method="post">
    <br>
<div class="form-outline mb-4">
<label for="username" class="form-label">Username</label> 
<input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
<label for="password" class="form-label">Password</label> 
<input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
</div><br>
<div>
<input type="submit" class="bg-primary py-2 px-3 border-0" name="admin_login" value="Login">
<p class="small fw-bold mt-2 pt-1">Don't have an account? 
    <a href="admin_registration.php" class="link-danger">Register</a></p>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>

<?php

    if (isset($_POST['admin_login'])) {
        $admin_name = $_POST['username'];
        $admin_password = $_POST['password'];
        $select_query = "Select * from `admin_table` where admin_name='$admin_name'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        echo $row_count;
        if ($row_count > 0) {
            $_SESSION['admin_name']=$admin_name;
            if(password_verify($admin_password, $row_data['admin_password'])) {
                    echo "<script>alert('You have logged in successfully')</script>";
                    echo "<script>window.open('index.php','_self')</script>";    
                } else {
                echo "<script>alert('Invalid Credential')</script>";
            }
        } else {
            echo "<script>alert('Username is not registered')</script>";

        }
    }
    ?>