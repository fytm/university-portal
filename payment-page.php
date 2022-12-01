<?php 
require("./Controllers/application_controller.php");
?>
<?php
$ip_address = getenv("REMOTE_ADDR");
// echo "$ip_address";
    if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
        // echo "$customer_id";
        $applications_list = select_all_applications_controller($customer_id, $ip_address);
        $total = get_total_controller($customer_id, $ip_address);

        // echo "$applications_list";
        // contains app_id, cust_id, uni_id, ip_add, price, total

    }else{
        $applications_list = select_all_applications_without_customer_id_controller($ip_address); 
        $total = get_total_without_customer_id_controller($ip_address);

        // echo "$ip_address";

    }

    $_SESSION['total'] = $total;

?>

<?php
require_once('./Controllers/customer_controller.php');
require_once('./Settings/core.php');


if(!isset($_SESSION['user_id'])){
    header("Location: ../Login/login.php");
}


if(isset($_SESSION['user_id'])){

    $check = select_one_customer_controller($_SESSION['user_id']);
    $product = select_all_applications_controller($_SESSION['user_id'], getenv("REMOTE_ADDR"));

    $email = $check['customer_email'];
    // $total = $_SESSION['total'];
    // echo $total;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Checkout - Afrika Konnect</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    
    <!-- Start of bootstrap stylesheets for page template -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Nova - v1.2.1
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

<!-- Start of bootstrap stylesheets for applications list -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- <link href="./assets/css/applications.css" rel="stylesheet" /> -->
<!-- End of bootstrap for applications list -->
</head>


<body class="page-portfolio">
    <!-- ======= Header ======= -->
    <?php include 'header.php';?>
    <!-- End Header -->

    <main id="main">
          <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/portfolio-header.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center">
                <h2>Checkout</h2>
                <ol>
                    <li><a href="universities.php">Universities</a></li>
                    <li>Checkout</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumbs -->

        <!== Payment Form Section -->
        <form method="post" id="paymentForm" action="#" style="width: 50%; margin-left: 25%; margin-top:10%">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" id="email-address" required class="form-control"  aria-describedby="emailHelp" value="<?php echo $email   ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Total Price</label>
                <input type="text" name="amount" required id="amount" class="form-control" placeholder="<?php echo $_SESSION["total"]  ?>" value = "<?php echo $_SESSION["total"]  ?>" readonly>
            </div>
            <button type="submit" onclick="payWithPaystack()" class="btn btn-primary">Make Payment</button>
        </form>

        <h4 style="margin-top: 35px; text-align:center">View applications</h4>
        <!-- ======= Applications View Section ======= -->
        <div class ="applications-container" style="width: 50%; margin-left: 25%; margin-top:10%">
        </br>
        <div class="container" >
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width: 25%">University</th>
                    <th style="width: 9%">Country</th>
                    <th style="width: 9%">City</th>
                    <th style="width: 11%" class="text-center">Application Fee</th>
                    <th style="width: 5%"></th>
                </tr>
                </thead>
                <tbody>                      
                    <?php foreach($applications_list as $x){
                        echo "
                        <tr>
                            <td data-th='University'>
                            <div class='row'>
                                <div class='col-sm-2 hidden-xs'>
                                    <img src='http://placehold.it/100x100' alt='...' class='img-responsive' />
                                </div>
                                <div class='col-sm-10'>
                                    <h4 class='nomargin'>{$x['university_name']}</h4>
                                    <p>
                                        {$x['mission']}
                                    </p>
                                </div>
                            </div>
                            </td>
                            <td data-th='Country'>{$x['university_country']}</td>
                            <td data-th='City'>{$x['university_city']}</td>
                            <td data-th='Fee' class='text-center'>GH₵{$x['price']}</td>                          
                        </tr>               
                          ";                    
                          } ?> 
                      
                  </tbody>
                  <tfoot>
                          <?php 
                              echo " <tr class='visible-xs'>
                          <td class='text-center'><strong>Total: GH₵{$total['total']}</strong></td>
                      </tr>
                      <tr>
                          <td>
                              <a href='universities.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Edit Application</a>
                          </td>
                          <td colspan='2' class='hidden-xs'></td>
                          <td class='hidden-xs text-center'><strong>Total: GH₵{$total['total']}</strong></td>

                      </tr>";
                    

                          ?>
                  </tfoot>
              </table>

          </div>
        </div>
        <!-- End Applications View Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'footer.php';?>

    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


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
