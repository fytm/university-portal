<?php
require('./Controllers/application_controller.php');
require('./Controllers/customer_controller.php');
require_once('./Settings/core.php');


if(!isset($_SESSION['user_id'])){
    header("Location: ../Login/login.php");
}


if(isset($_SESSION['user_id'])){

    $check = select_one_customer_controller($_SESSION['user_id']);
    $product = select_all_applications_controller($_SESSION['user_id'], getenv("REMOTE_ADDR"));

    $email = $check['customer_email'];
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - AfrikaKonect</title>


    <script src="https://kit.fontawesome.com/75618b9696.js" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://kit.fontawesome.com/75618b9696.js' crossorigin='anonymous'></script>

    <!-- slick slider cdn -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
</head>
<body>
    <nav class='navbar navbar-expand-lg navbar-light bg-light '>
            <img src='./images/F1-Logo.png' width='6' height='60' alt='' loading='lazy'>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                    <a class='nav-link active' href='../index.php'>Return to Home</a>
                </div>
            </div>
	</nav>

    <form method="post" id="paymentForm" action="#" style="width: 50%; margin-left: 25%; margin-top:10%">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" id="email-address" required class="form-control"  aria-describedby="emailHelp" value="<?php echo $email   ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Total Price</label>
            <input type="text" name="amount" required id="amount" class="form-control" value="<?php echo $_SESSION["total"]  ?>"> 
        </div>
        <button type="submit" onclick="payWithPaystack()" class="btn btn-primary">Make Payment</button>
    </form>



    <h4 style="margin-top: 35px; text-align:center">View applications</h4>

    <div style="display:flex">


    <?php

        foreach($product as $x){

            echo "
            
            <div class='card' style='width: 18rem; margin-left:5%'>
            <div class='card-body'>
                <h5 class='card-title'>{$x['university_name']}</h5>
                <p class='card-text'>{$x['mission']}</p>
                <p class='card-text'>{$x['university_country']}</p>
                <p class='card-text'>{$x['price']}</p>
            </div>
        </div>
            
            
            ";

        }


    ?>


    </div>
   
   
	<!-- PAYSTACK INLINE SCRIPT -->
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
	const paymentForm = document.getElementById('paymentForm');
	paymentForm.addEventListener("submit", payWithPaystack, false);

	// PAYMENT FUNCTION
	function payWithPaystack(e) {
		e.preventDefault();
		let handler = PaystackPop.setup({
			key: 'pk_test_214b976264ad8f2bb40862141f0ee79f8ceda31b', // Replace with your public key
			email: document.getElementById("email-address").value,
			amount: document.getElementById("amount").value * 100,
			currency:'GHS',
			onClose: function(){
			alert('Window closed.');
			},
			callback: function(response){
				window.location = `./pay.php?email=${document.getElementById("email-address").value}&amount=${document.getElementById("amount").value}&reference=${response.reference}`
			}
		});
		handler.openIframe();
	}

</script>


 
    
</body>
</html>