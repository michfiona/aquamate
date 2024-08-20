<h3 class="text-center text-light">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_payments="Select * from `user_table`";
$result=mysqli_query($con, $get_payments);
$row_count=mysqli_num_rows($result);


if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No Users yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>Username</th>
<th>User Email</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$user_id=$row_data['user_id'];
$username=$row_data['username'];
$user_email=$row_data['user_email'];
$user_address=$row_data['user_address'];
$user_mobile=$row_data['user_mobile'];
$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$username</td>
<td>$user_email</td>
<td>$user_address</td>
<td>$user_mobile</td>
<td><a href='index.php?delete_payment=$user_id?>' class='text-dark'><i class='bi bi-trash'></i></a></td>
</tr>";
}
}

?>
        
       
    </tbody>
</table>