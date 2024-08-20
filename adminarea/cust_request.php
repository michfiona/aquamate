<h3 class="text-center text-light">Aquarium Customization Requests</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_request="Select * from `customize_table`";
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
<th>Type</th>
<th>Length</th>
<th>Breadth</th>
<th>Height</th>
<th>Color</th>
<th>Detail</th>
<th>Confirm</th>
<th>Cancel</th>
<th>Status</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$customize_id=$row_data['customize_id'];
$username=$row_data['username'];
$user_address=$row_data['user_address'];
$user_mobile=$row_data['user_mobile'];
$type=$row_data['type'];
$length=$row_data['length'];
$breadth=$row_data['breadth'];
$height=$row_data['height'];
$color=$row_data['color'];
$detail=$row_data['detail'];
$status=$row_data['status'];

$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$username</td>
<td>$user_address</td>
<td>$user_mobile</td>
<td>$type</td>
<td>$length</td>
<td>$breadth</td>
<td>$height</td>
<td>$color</td>
<td>$detail</td>";

if($status=='Cancelled' || $status=='Booked'){
    echo"<td>--</td>
    <td>--</td>
    <td>$status</td>
    </tr>";
    }
    
else{ echo "<td><a href='index.php?confirm_aqua= $customize_id' class='text-dark'><i class='bi bi-check-circle-fill'></i></a></td>
<td><a href='index.php?cancel_aqua=$customize_id' class='text-dark'><i class='bi bi-x-circle-fill'></i></a></td>
<td>$status</td>
</tr>";
}
}
}

?>
        
       
    </tbody>
</table>