<?php 
require("../Controllers/university_controller.php");
@session_start();
?>


<?php
// echo "$ip_address";
if(isset($_SESSION['user_role']) && isset($_SESSION['user_id'])){

    // echo "entered\n";
    if($_SESSION['user_role'] == 1){
            $customerid = $_SESSION['user_id'];
            // echo "authorised\n";

            //select all universities
            $all_universities = list_universities_controller();

        }else{
            echo "unauthorised";
        }

    }

        // echo "Hello";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Admin Page</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon" />
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />


<!-- Start of bootstrap stylesheets for applications list -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- <link href="./../assets/css/applications.css" rel="stylesheet" /> -->
<!-- End of bootstrap for applications list -->

</head>

<body class="page-portfolio">


        <!-- ======= Applications View Section ======= -->
        <div class ="applications-container">
            </br>
            <div class="container">
              <table id="cart" class="table table-hover table-condensed">
                  <thead>
                      <tr>
                          <th style="width: 50%">University</th>
                          <th style="width: 22%">Email</th>
                          <th style="width: 18%">Country</th>
                          <th style="width: 18%">City</th>
                          <th style="width: 10%"></th>
                      </tr>
                  </thead>
                  <tbody>
                      
                <?php 
                    if(isset($_SESSION['user_role'])){
                          foreach($all_universities as $x){
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
                          <td data-th='Email'>{$x['university_email']}</td>
                          <td data-th='Country'>{$x['university_country']}</td>
                          <td data-th='City'>{$x['university_city']}</td>
                          <td class='actions' data-th=''>
                              <a href ='../Admin/update_university.php?uni_id={$x['university_id']}'>
                              <button class='btn btn-sm' >
                                  <i class='fas fa-edit' ></i>   
                              </button>
                              </a>
                          </td>
                          <td class='actions' data-th=''>
                            <a href ='../Admin/delete_university.php?uni_id={$x['university_id']}'>
                            <button class='btn btn-danger btn-sm' >
                                <i class='fa fa-trash-o' ></i>   
                            </button>
                            </a>
                          </td>
                      </tr>               
                          ";                    
                          }
                         } ?> 
                      
                  </tbody>
                  <tfoot>
                      <tr>
                          <td>
                              <a href='../Admin/add_university.html' class='btn btn-success btn-block'>Add University <i class='fa fa-angle-right'></i></a>
                          </td>
                      </tr>
                  </tfoot>
              </table>

          </div>
        </div>
        <!-- End Applications View Section -->


    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

</body>

</html>
