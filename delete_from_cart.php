<?php
require("./Controllers/application_controller.php");
require("./Settings/core.php");

?>

<?php 
echo "-1";
if(isset($_GET['id'])){
    $uni_id = $_GET['id'];
    $ip_address = getenv("REMOTE_ADDR");
    //hardcoded pricec replace with price field from specific course application
        echo "0";

    if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
        $result = delete_from_application_controller($uni_id,$customerid, $ip_address);
        echo "1";
        //check if user has already applied
        // if(isset($check)){
            // if(($check['uni_id'] == $id) && ($check['cust_id'] == $customerid)){
            if($result != true ){     
                header("Location: ./applications.php?id=$uni_id&error=Item not in cart");    
            }else{
                $result = delete_from_application_controller($uni_id,$ip_address,$customerid);
                header("Location: ./applications.php?id=$uni_id&message=Item deleted successfully");    


            }
    //}
    }else{
        $result = delete_from_application_without_customer_id_controller($uni_id,$ip_address);
        echo "2";

        if($result != true ){     
                header("Location: ./applications.php?id=$uni_id&error=Item not in cart");    
            }else{
                $result = delete_from_application_without_customer_id_controller($uni_id,$ip_address);
                header("Location: ./applications.php?id=$uni_id&message=Item deleted successfully");    
            }
    }




}
?>