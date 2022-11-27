<?php 
require("./Controllers/application_controller.php");
?>
<?php
// include "header.php";?>

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Applications - Afrika Konnect</title>
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
                <h2>Applications</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Applications</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Applications View Section ======= -->
        <div class ="applications-container">
    </br>
          <div class="container">
              <table id="cart" class="table table-hover table-condensed">
                  <thead>
                      <tr>
                          <th style="width: 50%">University</th>
                          <th style="width: 18%">Country</th>
                          <th style="width: 18%">City</th>
                          <th style="width: 22%" class="text-center">Application Fee</th>
                          <th style="width: 10%"></th>
                      </tr>
                  </thead>

                  <?php 
                    
                  ?>
                  <tbody>
                      
                          <?php foreach($applications_list as $x){
                              echo "<tr>
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
                          <td class='actions' data-th=''>
                              <a href ='delete_from_cart.php?id={$x['university_id']}'>
                              <button class='btn btn-danger btn-sm' >
                                  <i class='fa fa-trash-o' ></i>   
                              </button>
                              </a>
                          </td>
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
                              <a href='universities.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Applying</a>
                          </td>
                          <td colspan='2' class='hidden-xs'></td>
                          <td class='hidden-xs text-center'><strong>Total: GH₵{$total['total']}</strong></td>
                          <td>
                              <a href='payment-page.php' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a>
                          </td>
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
</body>

</html>
