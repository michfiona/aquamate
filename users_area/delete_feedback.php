<?php
if(isset($_GET['delete_feedback'])){ 
    $delete_id=$_GET['delete_feedback'];
// echo $cancel_id;
// cancel query
$delete_feedback="Delete from `feedback_table` where feedback_id=$delete_id"; 
$result_feedback=mysqli_query($con, $delete_feedback); 
if($result_feedback){  
echo "<script> alert('Your Feedback has been deleted')</script>"; 
echo "<script>window.open('feed.php', '_self'></script>";
}
}
?>