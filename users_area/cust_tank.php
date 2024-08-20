<h2 class='text-success text-center'>Enter the neccessary details for your Aquarium Tank</h2><br>
                <div class="row g-5">
                <div class="col-lg-7">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <h5 class="text-primary">Enter the size in inches:</h5>
                            <div class="col-4">
                                <input type="number" class="form-control bg-light border-0 px-4" placeholder="Length" style="height: 40px;" required="required" name="length">
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control bg-light border-0 px-4" placeholder="Breadth" style="height: 40px;" required="required" name="breadth">
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control bg-light border-0 px-4" placeholder="Height" style="height: 40px;" required="required" name="height">
                            </div>
                            <h5 class="text-primary">Any other details:</h5>
                            <div class="col-12">
                            <textarea class="form-control bg-light border-0 px-4 py-3" required="required" rows="4" 
                                placeholder="Mention here" autocomplete="off" name="detail"></textarea>
                            </div>
                            <div class="col-12 mt-4 pt-2">
                                    <input type="submit" value="Request" class="bg-primary py-2 px-3 border-0 w-100"
                                        name="cust_request">
                            </div>
                        </div>
                </div>
                
                    </div>

                    <?php

if(isset($_GET['cancel_request'])){
    include('./cancel_request.php');
}

if(isset($_POST['cust_request'])) {
    $username = $_SESSION['username'];
    $user_address = $_SESSION['user_address'];
    $user_mobile = $_SESSION['user_mobile'];
    $length=$_POST['length'];
    $breadth=$_POST['breadth'];
    $height=$_POST['height'];
    $detail=$_POST['detail']; 

    //insert query
    $insert_query="insert into `customize_table` (username, user_address, user_mobile, type, length, breadth, height, detail, date, status) values ('$username','$user_address','$user_mobile','Tank','$length','$breadth','$height','$detail',NOW(),'Waiting for Confirmation')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
    echo "<script>alert('Your request for customized Aquarium Tank has been sent')</script>";
    
} 
}
 