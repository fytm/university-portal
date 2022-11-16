<?php
require('../Controllers/university_controller.php');

$university = list_universities_controller();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i|Nunito:300,300i" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- <link rel="stylesheet" href="../css/product-page.css">
    <link rel="shortcut icon" type="image/png" href="../img/header-1.jpg"> -->

    <!-- Font Awsome CDN -->
    <script src="https://kit.fontawesome.com/75618b9696.js" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://kit.fontawesome.com/75618b9696.js' crossorigin='anonymous'></script>

    <!-- slick slider cdn -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">

    <title>Afrika Konnect</title>
</head>
<body>

<!-- University section -->
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

 <!-- University Card section -->
 <h2 class="products__section-title">Universities</h2>
        <?php if (isset($_GET['error'])) { ?>
            <h4 class="error" style="text-align:center; color:red"><?php echo $_GET['error']; ?></h4>
        <?php } ?>
 <div class='products'>
    <?php
        foreach($university as $x){
            //echo "$x['university_id']  	 	$x['university_name'] 	$x['university_email'] $x['university_description'] 	$x['university_country']    ";
            // var_dump($x);
            echo"${x['university_name']}";
        }

    ?>

 
    
 </div>



     <!-- Footer Section -->
    <section class="footer">
        <h2 class="products__section-title">Afrika Konnect</h2>
        <ul class="nav">
            <li class="nav__item"><a href="#" class="nav__link">Home</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Universities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Applications</a></li>
            <li class="nav__item"><a href="#" class="nav__link">About Us</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Contact Us</a></li>
        </ul>

        <p class="copyright">
            Afrika Konnect 2022
        </p>
    </section>

    

    
    <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/second.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

   


</body>
</html>


