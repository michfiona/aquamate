<?php
if(isset($_GET['cancel_aquarium'])){ 
    $cancel_id=$_GET['cancel_aquarium'];
// echo $cancel_id;
// cancel query
$cancel_aquarium="update `customize_table` set status='Cancelled' where customize_id=$cancel_id"; 
$result_request=mysqli_query($con, $cancel_aquarium); 
if($result_request){  
echo "<script> alert('Request for Aquarium has been cancelled')</script>"; 
echo "<script>window.open('customize.php', '_self')</script>";
}
}
?>