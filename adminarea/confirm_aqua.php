<?php
if(isset($_GET['confirm_aqua'])){ 
    $confirm_id=$_GET['confirm_aqua'];
// echo $confirm_id;
// confirm query
$confirm_aqua="update `customize_table` set status='Booked' where customize_id=$confirm_id"; 
$result_request=mysqli_query($con, $confirm_aqua); 
if($result_request){  
echo "<script> alert('Aquarium has been booked')</script>"; 
echo "<script>window.open('./index.php?cust_request', '_self'></script>";
}
}
?>