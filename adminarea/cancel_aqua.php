<?php
if(isset($_GET['cancel_aqua'])){ 
    $cancel_id=$_GET['cancel_aqua'];
// echo $cancel_id;
// cancel query
$cancel_aqua="update `customize_table` set status='Cancelled' where customize_id=$cancel_id"; 
$result_request=mysqli_query($con, $cancel_aqua); 
if($result_request){  
echo "<script> alert('Aquarium Request has been cancelled')</script>"; 
echo "<script>window.open('./index.php?cust_request', '_self'></script>";
}
}
?>

