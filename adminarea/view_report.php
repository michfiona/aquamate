<h3 class="text-center text-light">Report</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-light text-dark">

    <?php

//products
$get_products="Select * from `products`";
$result=mysqli_query($con, $get_products);
$products_count=mysqli_num_rows($result);  

//categories
$get_categories="Select * from `categories`";
$result=mysqli_query($con, $get_categories);
$categories_count=mysqli_num_rows($result);  

//services
$get_services="Select * from `service_table` where status='booked'";
$result=mysqli_query($con, $get_services);
$services_count=mysqli_num_rows($result);

//customize
$get_customize="Select * from `customize_table`";
$result=mysqli_query($con, $get_customize);
$customize_count=mysqli_num_rows($result);

//orders
$get_orders="Select * from `user_payments`";
$result=mysqli_query($con, $get_orders);
$orders_count=mysqli_num_rows($result);

//online
$get_online="Select * from `user_payments` where payment_mode='Online'";
$result=mysqli_query($con, $get_online);
$online_count=mysqli_num_rows($result);

//offline
$get_offline="Select * from `user_payments` where payment_mode='COD'";
$result=mysqli_query($con, $get_offline);
$offline_count=mysqli_num_rows($result);

//blogs
$get_blogs="Select * from `discussion_table`";
$result=mysqli_query($con, $get_blogs);
$blogs_count=mysqli_num_rows($result);

//feedback
$get_feedback="Select * from `feedback_table`";
$result=mysqli_query($con, $get_feedback);
$feedback_count=mysqli_num_rows($result);

//users
$get_users="Select * from `user_table`";
$result=mysqli_query($con, $get_users);
$users_count=mysqli_num_rows($result);


    echo "<tr class='text-center'><th style='width:50%'>Total Products</th>
    <td class='bg-light text-dark'>$products_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Total Categories</th>
    <td class='bg-light text-dark'>$categories_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>No of Services Booked</th>
    <td class='bg-light text-dark'>$services_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Total Customized Aquariums Requested</th>
    <td class='bg-light text-dark'>$customize_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Total Products Sold</th>
    <td class='bg-light text-dark'>$orders_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Products Sold Online</th>
    <td class='bg-light text-dark'>$online_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Products Sold Offline</th>
    <td class='bg-light text-dark'>$offline_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>No of Blogs Posted</th>
    <td class='bg-light text-dark'>$blogs_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Total Feedbacks Received</th>
    <td class='bg-light text-dark'>$feedback_count</td>
  </tr>
  <tr class='text-center'><th style='width:50%'>Total No of Users</th>
    <td class='bg-light text-dark'>$users_count</td>
  </tr></thead>       
  </tbody>
</table>";



?>
        
