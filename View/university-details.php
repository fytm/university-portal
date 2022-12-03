<?php require "../Controllers/university_controller.php";
$university = select_one_university_controller($_GET['id']);
$path = select_university_photos_controller($_GET['id']);
// $num_photos = select_number_of_photos($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>University Details - Afrika Konnect</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Nova - v1.2.1
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-portfolio">

    <!-- ======= Header ======= -->
    <?php include "../header.php"; ?>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('../assets/img/portfolio-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <?php if (isset($_GET['id'])) {
              echo "<h2>University Details</h2>";
             }
            ?>
                <!-- <h2>University Details</h2> -->
                <ol>
                    <li><a href="../index.php">Home</a></li>
                    <li>University Details</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="slides-1 portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <?php                                          
                                    if (isset($_GET['id'])) { 
                                      // if ($num_rows>0){

                                    foreach ($path as $p) {
                                        echo" 
                                          <div class='swiper-slide'>
                                            <img src='{$p['path']}' alt='Photo'>
                                          </div>";                              
                                        }  
                                      
                                  //   }  else{
                                  //   echo" 
                                  //       <div class='swiper-slide'>
                                  //         <img src='../assets/img/universities/UG/UG1.jpg' alt='Photo'>
                                  //       </div>"; 
                                  // }
                                      } 
                                  
                                ?>





                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <?php echo"<div class='portfolio-info'>
                            <h3>University information</h3>
                            <ul>
                                <li><strong>Country</strong>: {$university['university_country']}</li>
                                <li><strong>City</strong>: {$university['university_city']}</li>
                                <li><strong>Email</strong>: <a href=mailto:'{$university['university_email']}'>{$university['university_email']}</a></li>
                                <li><strong>Phone</strong>: <a href = tel:'+{$university['university_contact']}'>+{$university['university_contact']} </a></li>
                                <li><strong>Apply</strong>: <a href = ../Action/apply.php?id={$university['university_id']} >Click here</a></li>


                            </ul>
                        </div>
                        <div class='portfolio-description'>
                            <h2>University Description</h2>
                            <p>
                                {$university['university_description']}
                            </p>
                        </div>"; ?>


                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "../footer.php"?>
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

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
