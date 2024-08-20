<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registeration</title>

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
<h2 class="text-center mb-5">Admin Registration
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
<label for="email" class="form-label">Email</label> 
<input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
<label for="password" class="form-label">Password</label> 
<input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
</div>
<div class="form-outline mb-4">
<label for="confirm_password" class="form-label">Confirm Password</label>
<input type="password" id="confirm_password"
name="confirm_password" placeholder="Enter your confirm_password" required="required" class="form-control">
</div>
<div><br>
<input type="submit" class="bg-primary py-2 px-3 border-0" name="admin_registration" value="Register">
<p class="small fw-bold mt-2 pt-1">Already have an account? 
    <a href="admin_login.php" class="link-danger">Login</a></p>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];

    //select 
    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exists')</script>";
    }else if($admin_password!=$confirm_password){
        echo "<script>alert('Passwords dont match')</script>";
    }
    else{
        

    //insert query
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>alert('You have registered successfully')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
    
    }

}  


?>