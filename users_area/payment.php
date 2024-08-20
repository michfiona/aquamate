<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start(); 
?>

<!--!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="utf-8">
    <title>AQUA MATE - PAYMENT</title>
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

     <style>
        img{
            width:90%;
            margin:auto;
            display:block;
        }
        </style>
<body>

<?php
// $user_ip=getIPAddress();
// $get_user="Select * from `user_table` where user_ip='$user_ip'";
// $result=mysqli_query($con,$get_user);
// $run_query=mysqli_fetch_array($result);
// $user_id=$run_query['user_id'];

$username=$_SESSION['username'];
$get_user="Select * from `user_table` where username='$username'";
$result=mysqli_query($con,$get_user);
$row_data = mysqli_fetch_assoc($result);
$user_id=$row_data['user_id'];

?>

<div class="container">
<br>
<h2 class="text-center text-info">Payment options</h2> <div class="row d-flex justify-content-center align-items-center my-5">
<div class="col-md-6">
<a href="./razorpayments.php?user_id,username=<?php echo $user_id ,$username ?>" target="_blank">
    <img src="../img/pay.jpg" alt=""></a>
</div>
<div class="col-md-6">
<a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-primary text-center">Pay offline</h2></a>
</div>
</div>
</div>
</body>

    