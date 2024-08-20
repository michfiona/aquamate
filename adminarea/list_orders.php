<h3 class="text-center text-light">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_orders="Select * from `user_orders`";
$result=mysqli_query($con, $get_orders);
$row_count=mysqli_num_rows($result);


if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No orders yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>Username</th>
<th>Address</th>
<th>Contact</th>
<th>Product</th>
<th>Due Amount</th>
<th>Invoice number</th>
<th>Total Products</th>
<th>Order Date</th>
<th>Payment Mode</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$order_id=$row_data['order_id'];
$user_id=$row_data['user_id'];
$amount_due=$row_data['amount_due'];
$invoice_number=$row_data['invoice_number'];
$total_products=$row_data['total_products'];
$order_date=$row_data['order_date'];
$order_status=$row_data['order_status'];
$product_names=$row_data['product_names'];
$number++;

//user data
$get_users="Select * from `user_table` where user_id='$user_id'";
$result_user=mysqli_query($con, $get_users);
$row_usercount=mysqli_num_rows($result_user);
while($row_data=mysqli_fetch_assoc($result_user)){  
    $username=$row_data['username'];
    $user_address=$row_data['user_address'];
    $user_mobile=$row_data['user_mobile'];
echo "<tr class='text-center'>
<td>$number</td>
<td>$username</td>
<td>$user_address</td>
<td>$user_mobile</td>
<td>$product_names</td>
<td>$amount_due</td>
<td>$invoice_number</td>
<td>$total_products</td>
<td>$order_date</td>
<td>$order_status</td>
<td><a href='index.php?delete_order=$order_id' class='text-dark'><i class='bi bi-trash'></i></a></td>
</tr>";
}
}
}

?>
        
       
    </tbody>
</table>