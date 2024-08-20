<!--connect file-->
<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
$select_data="Select * from `user_orders` where order_id=$order_id";
$result=mysqli_query($con, $select_data); 
$row_fetch=mysqli_fetch_assoc($result);
$invoice_number=$row_fetch ['invoice_number'];
$amount_due=$row_fetch['amount_due'];
$user_id=$row_fetch['user_id'];
}


if(isset($_POST['pay_offline'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    // $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id, user_id, invoice_number, amount, payment_mode,date) values ($order_id, $user_id, $invoice_number, $amount, 'COD',NOW())";
    $result=mysqli_query($con, $insert_query);
    if($result==1){
        echo "<h3 class='text-center text-light'>Payment will be Offline. Ordered Successfully</h3>"; 
        echo "<script>window.open('./profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='COD' where order_id=$order_id"; 
    $result_orders=mysqli_query($con, $update_orders);
}

if(isset($_POST['pay_online'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount']; 
    echo "test";
    $insert_query="insert into `user_payments` (order_id, user_id, invoice_number, amount, payment_mode,date) values ($order_id, $user_id, $invoice_number, $amount, 'Online',NOW())";
    $result=mysqli_query($con, $insert_query);
    // if($result==1){
    //     echo "<h3 class='text-center text-light'>Payment done. Ordered Successfully</h3>"; 
    //     // echo "<script>window.open('./profile.php?my_orders','_self')</script>";
    // }
    $update_orders="update `user_orders` set order_status='Online' where order_id=$order_id"; 
    $result_orders=mysqli_query($con, $update_orders);

    echo "<script>window.open('./razorpayments.php?amt=".$amount."','_self')</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>

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

    <style>body {background-color: grey;}</style>

</head>
<body>
<div class="container my-5">
<h1 class="text-center text-dark">Confirm Payment</h1> 
<form action="" method="post">
<div class="form-outline my-4 text-center w-50 m-auto"> 
    <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
</div>
<div class="form-outline my-4 text-center w-50 m-auto">
<label for="" class="text-dark">Amount</label>
<input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
</div>
<!-- <div class="form-outline my-4 text-center w-50 m-auto">
<select name="payment_mode" class="form-select w-50 m-auto">
<option>Select Payment mode</option>
<option>Online</option>
<option>Offline</option>
</select>
</div> -->
<div class="form-outline my-4 text-center w-50 m-auto"> 
    <!-- <button class='bg-dark text-light px-3 mx-3'><a href='./users_area/order.php?user_id=$user_id'>Confirm</a></button>"; -->
    <input type="submit" class="bg-primary py-2 border-0" value="Pay Online" name="pay_online">
    <input type="submit" class="bg-primary py-2 border-0" value="Pay Offline" name="pay_offline">
</div>
</form>
</div>
    
</body>
</html>