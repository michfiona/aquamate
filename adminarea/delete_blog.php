<?php
if(isset($_GET['delete_blog'])){ 
    $delete_id=$_GET['delete_blog'];
$delete_blog="Delete from `discussion_table` where disc_id=$delete_id"; 
$result_blog=mysqli_query($con, $delete_blog); 
if($result_blog){  
echo "<script> alert('Blog has been deleted successfully')</script>"; 
echo "<script>window.open('./index.php?view_blogs', '_self'></script>";
}
}
?>