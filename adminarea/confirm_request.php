<?php
if(isset($_GET['confirm_request'])){ 
    $confirm_id=$_GET['confirm_request'];
// echo $confirm_id;
// confirm query
$confirm_request="update `service_table` set status='Booked' where service_id=$confirm_id"; 
$result_request=mysqli_query($con, $confirm_request); 
if($result_request){  
echo "<script> alert('Service has been booked')</script>"; 
echo "<script>window.open('./index.php?service_request', '_self'></script>";
}
}
?>

