<?php



require('../Controllers/cart_controller.php');
require('../Settings/core.php');
// check if theres a POST variable with the name 'addProductButton'



    if(isset($_POST['addtocart'])){

        $id = $_POST['id'];
        $ip_address = getenv("REMOTE_ADDR");
        $qty = 1;
        

        if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
   
        $check = select_single_cart_item_controller($id);
    
    
        if($check['p_id'] != $id){
    
            $result = add_to_cart($id,$ip_address,$customerid,$qty);
    
            if($result === true){
                header("Location: ../View/all_product.php?error=Product Added Successfully");
            }else{
    
                header("Location: ../Error/error.html");
    
            }
        }else{
            header("Location: ../View/all_product.php?error=Item already in Added to cart");
        }

    }else{
        $check = select_single_cart_item_controller($id);

        if($check['p_id'] != $id){
        $results = add_to_cart_no_cid($id,$ip_address,$qty);


        if($results === true){
            header("Location: ../View/all_product.php?error=Product Added Successfully");
        }else{

            header("Location: ../Error/error.html");

            }
        }else{
            header("Location: ../View/all_product.php?error=Item already in Added to cart");
        }
    }   
}

 

    
if(isset($_POST['managecart'])){

    $id = $_POST['id'];
    $ip_address = getenv("REMOTE_ADDR");
    $customerid = $_SESSION['user_id'];
    $qty = $_POST["quantity"];


    $result = update_cart_category($id, $ip_address, $qty);

    // var_dump($result);
    // return;

    if($result === true){
        header("Location: ../View/cart.php?error=Quantity updated Successfully");
    }else{

        header("Location: ../Error/error.html");

    }

}


?>
