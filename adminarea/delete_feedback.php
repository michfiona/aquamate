<?php
if(isset($_GET['delete_feedback'])){ 
    $delete_id=$_GET['delete_feedback'];
$delete_feedback="Delete from `feedback_table` where feedback_id=$delete_id"; 
$result_feedback=mysqli_query($con, $delete_feedback); 
if($result_feedback){  
echo "<script> alert('Feedback has been deleted successfully')</script>"; 
echo "<script>window.open('./index.php?view_feedback', '_self'></script>";
}
}
?>