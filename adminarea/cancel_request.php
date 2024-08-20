<?php
if(isset($_GET['cancel_request'])){ 
    $cancel_id=$_GET['cancel_request'];
// echo $cancel_id;
// cancel query
$cancel_request="update `service_table` set status='Cancelled' where service_id=$cancel_id"; 
$result_request=mysqli_query($con, $cancel_request); 
if($result_request){  
echo "<script> alert('Service booking has been cancelled')</script>"; 
echo "<script>window.open('./index.php?service_request', '_self'></script>";
}
}
?>

