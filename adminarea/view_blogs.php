<h3 class="text-center text-light">All Blogs</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-primary text-dark">
    <?php
$get_payments="Select * from `discussion_table`";
$result=mysqli_query($con, $get_payments);
$row_count=mysqli_num_rows($result);


if ($row_count==0){ 
    echo "<h3 class='bg-light text-danger text-center mt-5'>No Blogs yet</h3>";
}else{
    echo "<tr class='text-center'>
<th>Sl no</th>
<th>Username</th>
<th>User Email</th>
<th>Blog Subject</th>
<th>Date Uploaded</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-dark'>";
$number=0;
while($row_data=mysqli_fetch_assoc($result)){  
$disc_id=$row_data['disc_id'];
$disc_user=$row_data['disc_user'];
$disc_email=$row_data['disc_email'];
$subject=$row_data['subject'];
$date=$row_data['date'];
$number++;
echo "<tr class='text-center'>
<td>$number</td>
<td>$disc_user</td>
<td>$disc_email</td>
<td>$subject</td>
<td>$date</td>
<td><a href='index.php?delete_blog=$disc_id' class='text-dark'><i class='bi bi-trash'></i></a></td>
</tr>";
}
}

?>
        
       
    </tbody>
</table>