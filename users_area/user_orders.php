<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
<?php
$username=$_SESSION['username']; 
$get_user="Select * from `user_table` where username='$username'"; 
$result=mysqli_query($con, $get_user); 
$row_fetch=mysqli_fetch_assoc($result); 
$user_id=$row_fetch ['user_id'];
?>

    <?php
$get_order_details="Select * from `user_orders` where user_id=$user_id"; 
$result_orders=mysqli_query($con, $get_order_details);
$row_count=mysqli_num_rows($result_orders);
if($row_count==0){
    echo "<h3 class='text-center text-success mt-5 mb-2'>No Orders yet</h3>";
}else{
    echo "<h3 class='text-success'>All my Orders </h3>
 <table class='table table-bordered mt-5'> 
    <thead class='bg-primary text-light'>
<tr>
<th>S1 no</th>
<th>Product list</th>
<th>Quantity List</th>
<th>Amount Due </th>
<th>Total products</th>
<th>Invoice number</th>
<th>Date</th>
<th>Payment Mode</th>
<th>Status</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
}
$number=1;
while($row_orders=mysqli_fetch_assoc($result_orders)){
$order_id=$row_orders['order_id'];
$product_names=$row_orders['product_names'];
$amount_due=$row_orders['amount_due']; 
$total_products=$row_orders['total_products'];
$invoice_number=$row_orders['invoice_number']; 
$order_status=$row_orders['order_status'];
// if($order_status=='pending'){
//     $order_status='Incomplete';
// }else{
//     $order_status='Complete';
// }
$order_date=$row_orders['order_date'];
$number++;

$get_prod="Select * from `pending_orders` where order_id='$order_id'";
$result_prod=mysqli_query($con, $get_prod);
$row_prodcount=mysqli_num_rows($result_prod);
while($row_data=mysqli_fetch_assoc($result_prod)){  
    $product_id=$row_data['product_id'];
    $quantity=$row_data['quantity'];
    $quantity_list=$row_data['quantity_list'];
echo " <tr>
<td>$number</td>
<td>$product_names</td>
<td>$quantity_list</td>
<td>$amount_due</td>
<td>$total_products</td>
<td>$invoice_number</td>
<td>$order_date</td>
<td>$order_status</td>";
if($order_status=='COD' or $order_status== 'Online'){
    echo "<td>Done</td>";
}else{
echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-primary'>Pending</a></td>";
}
}
}
?>

</tbody>
</table>
</body>
</html>