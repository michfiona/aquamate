<!-- <input type="text" name="name" id="name" placeholder="Your Name"><br>
<input type="email" name="email" id="email" placeholder="Your Email Id"><br>
<input type="tel" name="mobile" id="mobile" placeholder="Your Mobile Num"><br> -->
<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
$username=$_SESSION['username'];
$user_address = $_SESSION['user_address'];
$user_mobile = $_SESSION['user_mobile'];
$amtInPaise = $_GET['amt']*100;
    ?>
    <div style='display: flex; align-items:center; justify-content:center; height: 100vh;'><button id="rzp-button1">Pay</button>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // function paynow(){ 
        // var name= document.getElementById("name").value;
        // var email= document.getElementById("email").value;
        // var mobile= document.getElementById("mobile").value;

var options = {
    "key": "rzp_test_xhyHRu03PUYK01", // Enter the Key ID generated from the Dashboard            UqSTOgMupvFHJ4mh72ijyIDN
    "amount": "<?php echo $amtInPaise ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Lia Aquarium and Pets", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "./profile.php",
    "prefill": {
        "name": '<?php echo $username?>', //your customer's name
        "email":  '<?php echo $user_address?>',
        "contact":  '<?php echo $user_mobile?>'
    },
    "notes": {
        "address": "Ashoknagar, Mangalore"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

</script>