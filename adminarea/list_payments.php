<h3 class="text-center text-light">All Payments (Confirmed Orders)</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_payments="Select * from `user_payments`";
$result=mysqli_query($con, $get_payments);
$row_count=mysqli_num_rows($result);

if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No payments recieved yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>Username</th>
<th>Address</th>
<th>Contact</th>
<th>Invoice number</th>
<th>Amount</th>
<th>Payment Mode</th>
<th>Order Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$order_id=$row_data['order_id'];
$user_id=$row_data['user_id'];
$payment_id=$row_data['payment_id'];
$amount=$row_data['amount'];
$invoice_number=$row_data['invoice_number'];
$payment_mode=$row_data['payment_mode'];
$date=$row_data['date'];
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
<td>username</td>
<td>user_address</td>
<td>user_mobile</td>
<td>$invoice_number</td>
<td>$amount</td>
<td>$payment_mode</td>
<td>$date</td>
<td><a href='index.php?delete_payment=$payment_id' class='text-dark'><i class='bi bi-trash'></i></a></td>
</tr>";
}
}
}


?>
        
       
    </tbody>
</table>