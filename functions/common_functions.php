<?php

//include('./includes/connect.php');

//getting prod
function getproducts(){
    global $con;
    $select_query="Select * from `products` order by rand() limit 0,9";
    $result_query=mysqli_query($con,$select_query);
                
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    echo "<div class='grid-item'>
                    <div class='card'>
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>Price: $product_price/-</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'><i class='bi bi-cart'></i></a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary'><i class='bi bi-eye'></i></a>
                        </div>
                    </div>                   
                </div>";
                }
} 

//get categor
function getcategories(){
    global $con;
    $select_categories="Select * from `categories`";
                        $result_categories=mysqli_query($con,$select_categories);
                        while($row_data=mysqli_fetch_assoc($result_categories)){
                            $category_title=$row_data['category_title'];
                            $category_id=$row_data['category_id'];
                            echo "<a href='category.php?category_id=$category_id&category_title=$category_title' class='dropdown-item'>$category_title</a>";
                        }
}

//search prod
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
   
    $search_query="Select * from `products` where product_keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query); 
    $num_of_rows=mysqli_num_rows($result_query); 
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No results match. No products found on this category</h2>";
    }
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    echo "<div class='col-md-3 mb-2'>
                    <div class='card'>
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>Price: $product_price/-</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'><i class='bi bi-cart'></i></a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary'><i class='bi bi-eye'></i></a>
                        </div>
                    </div>                   
                </div>";
                }
}
} 

function view_details(){
    global $con;
    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
    $select_query="Select * from `products` where product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
                
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    echo "<div class='col-md-6 mb-2'>
                    <div class='card'>
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>Price: $product_price/-</p>
                          <p class='card-text'>$product_description</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'><i class='bi bi-cart'></i></a>
                          <a href='index.php' class='btn btn-primary'><i class='bi bi-house'></i></a>
                        </div>
                    </div>                   
                </div>";
                }
} 
}

//get ip function  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

//cart funct
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query); 
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
       }
       else{
        $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ('$get_product_id','$get_ip_add',1)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       }

}
}

//total cart price
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * fro  `products` where product_id='product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price=$product_values;

        }
    }
    echo $total_price;
}

// get user order details 
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];        
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con, $get_details); 
    while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
    if(!isset($_GET['delete_account'])){
    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
    $result_order_query=mysqli_query($con, $get_orders);
    $row_count=mysqli_num_rows($result_order_query); 
    if($row_count>0){
        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'> $row_count </span>pending orders</h3>
        <p class='text-center'><a href='profile.php?my_orders'>Order Details</a></p>";
    }
    else{
        echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>";
        // <p class='text-center'><a href='profile.php?my_'>Order Details</a></p>";
    }
}
    }
}
    }
}
?>
