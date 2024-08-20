<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();

$user_id = '';
$username = '';
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $username = $_SESSION['username'];
    $user_address = $_SESSION['user_address'];
    $user_mobile = $_SESSION['user_mobile'];
}

// getting total items and total price of all items 
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "Select * from `cart_details` where ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);
$product_id = '';
$product_name_list = '';
$quantity_list='';
while($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "Select * from `products` where product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_name=  $row_product_price['product_title'];
        $product_name_list= $product_name_list.','.$product_name;
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

// getting quantity form cart
$get_cart = "select * from `cart_details`";
$run_cart = mysqli_query($con, $get_cart);


$total_qty = '';
while($row_quantity = mysqli_fetch_array($run_cart)){
    $ind_qty = $row_quantity['quantity'];
    echo $ind_qty;
    $total_qty = $total_qty.','.$ind_qty;
}
echo $total_qty;
// if ($quantity == 0) {
//     $quantity = 1;
//     $subtotal = $total_price;
// } else {
//     //$quantity=$quantity;
//     $subtotal = $total_price * $quantity;
// }
$quantity_total = substr($total_qty, 1); 
$product_list = substr($product_name_list, 1); 
$insert_orders = "Insert into `user_orders` (user_id, product_id, product_names, quantity_list, amount_due, invoice_number, total_products, order_date, order_status) values ($user_id, $product_id , '$product_list', '$quantity_total', $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script> alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}
//dont talk for sometime

// orders pending 
$insert_pending_orders = "Insert into `pending_orders` (user_id, invoice_number, product_id, quantity_list, order_status) values ($user_id, $invoice_number, $product_id, '$quantity_total', '$status')";
$result_pending_orders = mysqli_query($con, $insert_pending_orders);
// echo $result_pending_orders;
// if($result_pending_orders) {
//     echo "<script> alert('Orders are submitted successfully')</script>";
//     echo "<script>window.open('profile.php', '_self')</script>";
// }
?>

