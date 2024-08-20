<h3 class="text-center text-light">All Feedbacks</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_feedback="Select * from `feedback_table`";
$result=mysqli_query($con, $get_feedback);
$row_count=mysqli_num_rows($result);


if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No Feedbacks yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>User Name</th>
<th>User Email</th>
<th>Product/Service rendered</th>
<th>Feedback</th>
<th>Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$feedback_id=$row_data['feedback_id'];
$username=$row_data['username'];
$user_email=$row_data['user_email'];
$service_name=$row_data['service_name'];
$feedback=$row_data['feedback'];
$feedback_date=$row_data['feedback_date'];
$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$username</td>
<td>$user_email</td>
<td>$service_name</td>
<td>$feedback</td>
<td>$feedback_date</td>
<td><a href='index.php?delete_feedback=$feedback_id' class='text-dark'><i class='bi bi-trash'></i></a></td>
</tr>";
}
}

?>
        
       
    </tbody>
</table>