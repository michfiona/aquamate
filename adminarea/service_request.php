<h3 class="text-center text-light">Aquarium Service Requests</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_request="Select * from `service_table`";
$result=mysqli_query($con, $get_request);
$row_count=mysqli_num_rows($result);


if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No Requests yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>User Name</th>
<th>User Address</th>
<th>User Contact</th>
<th>Requested Date</th>
<th>Image of Aquarium</th>
<th>Confirm</th>
<th>Cancel</th>
<th>Status</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$service_id=$row_data['service_id'];
$username=$row_data['username'];
$user_address=$row_data['user_address'];
$user_mobile=$row_data['user_mobile'];
$service_date=$row_data['service_date'];
$service_img=$row_data['service_img'];
$status=$row_data['status'];

$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$username</td>
<td>$user_address</td>
<td>$user_mobile</td>
<td>$service_date</td>
<td><img src='../service_images/$service_img' class='service_img'></td>";

if($status=='Cancelled' || $status=='Booked'){
echo"<td>--</td>
<td>--</td>
<td>$status</td>
</tr>";
}
else{  
echo"<td><a href='index.php?confirm_request= $service_id' class='text-dark'><i class='bi bi-check-circle-fill'></i></a></td>
<td><a href='index.php?cancel_request=$service_id' class='text-dark'><i class='bi bi-x-circle-fill'></i></a></td>
<td>$status</td>
</tr>";
}
}
}

?>
        
       
    </tbody>
</table>