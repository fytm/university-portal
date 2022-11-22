<?php 
require("./Controllers/application_controller.php");


$ip_address = getenv("REMOTE_ADDR");

if(isset($_SESSION['user_role'])){
    $customerid = $_SESSION['user_id'];
    $applications_list = select_all_applications_controller($cust_id, $ip_address);
}else{
    $applications_list = select_all_applications_controller_with_ip($ip_address);
}



?>
