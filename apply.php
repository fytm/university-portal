<?php
require("./Controllers/application_controller.php");
require("./Settings/core.php");
?>
<?php
// check if theres a POST variable with the name 'addProductButton'
if(isset($_GET['id'])){
    $uni_id = $_GET['id'];
    $ip_address = getenv("REMOTE_ADDR");
    //hardcoded pricec replace with price field from specific course application
    $price = 50;

    if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
        $check = select_single_application_item_controller($uni_id,$customerid);
        //check if user has already applied
        // if(isset($check)){
            // if(($check['uni_id'] == $id) && ($check['cust_id'] == $customerid)){
            if($check['uni_id'] == $uni_id ){     
                header("Location: ./university-details.php?id=$uni_id&error=Item already in Added to cart");    
            }else{
                $result = add_to_application_controller($uni_id,$ip_address,$customerid,$price);
                header("Location: ./university-details.php?id=$uni_id&message=Item added successfully");    


            }
    //}
    }else{
        if($check['uni_id'] == $uni_id ){     
                header("Location: ./university-details.php?id=$uni_id&error=Item already in Added to cart");    
            }else{
                $result = add_to_application_without_customer_id_controller($uni_id,$ip_address,$price);
                header("Location: ./university-details.php?id=$uni_id&message=Item added successfully");    
            }
    }
}


?>
