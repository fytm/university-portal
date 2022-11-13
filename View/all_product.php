<?php
require('../Controllers/product_controller.php');

$product = list_products_controller();

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

    <title>Hallel inc</title>
</head>
<body>

<!-- Product section -->
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

 <!-- Product Card sectionnnnn -->
 <h2 class="products__section-title">Products</h2>
        <?php if (isset($_GET['error'])) { ?>
            <h4 class="error" style="text-align:center; color:red"><?php echo $_GET['error']; ?></h4>
        <?php } ?>
 <div class='products'>
    <?php
        foreach($product as $x){
            echo "
            

                <div class='product'>
                    <div class='product__background'>
                        <img src='{$x['product_image']}' alt='Book 01' class='product__image' style='width:50%; margin-left: 25%'>
                    </div>
                    <div class='product__info'>
                        <div class='product__detail'>
                            <h3 class='product__title'>{$x['product_title']}</h3>
                            <a href='#'>
                            <div class='product__icon product__like'>
                                <i class='fas fa-heart fa-2x'></i>
                                </div>
                            </a>
                        </div>
                        
                        <h1 class='product__price'>GHC {$x['product_price']}</h1>
                        <div class='product__second'>
                            <p class='product__paragraph' >{$x['product_desc']}</p>

                        </div>
                    </div>

                    <div style='display:flex; width:100%;'>
                        <a href='./single_product.php?id={$x['product_id']}' style='width:100%;'>
                            <div class='product__icon-2 product__arrow' style='width:150%; margin-left:2px; margin-top:20px'>
                            <h4>View Product</h4>
                            </div>
                        </a>

                        <form method='post' action='../Action/add_to_cart.php'>
                            <input name='id' style='display:none' type='text' class='form-control' id='exampleInputEmail1'  value={$x['product_id']}>

                            <button type='submit' name='addtocart' class='btn btn-primary'> Add to Cart </button>
                        
                        
                        </form>
                        
                    </div>
                </div>
            ";

        }

    ?>

 
    
 </div>


    <!-- Footer Section -->
    <section class="footer">
        <h2 class="products__section-title">Hallel.inc</h2>
        <ul class="nav">
            <li class="nav__item"><a href="#" class="nav__link">Home</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Products</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Wishlist</a></li>
            <li class="nav__item"><a href="#" class="nav__link">About Us</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Contact Us</a></li>
        </ul>

        <p class="copyright">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo voluptatibus assumenda harum voluptatum non dolorum voluptates maiores voluptate dignissimos totam?
        </p>
    </section>

    

    
    <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/second.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

   


</body>
</html>