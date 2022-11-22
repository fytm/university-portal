<?php

require('./Classes/application_class.php');

//actually selects all items for one university
function select_single_application_item_controller($uni_id,$cust_id){
    // echo $email;
    // create an instance of the customer class
    $application_instance = new Application();
    // call the method from the class
    return $application_instance->select_single_application($uni_id,$cust_id);

}

function select_all_applications_controller($cust_id){
    $application_instance = new Application();
    return $application_instance->select_single_application($cust_id);
}

function add_to_application_controller($uni_id,$ip_address,$cust_id,$price){
    $application_instance = new Application();
    return $application_instance->add_to_application($cust_id,$uni_id, $ip_address,$price);
    
}

function add_to_application_without_customer_id_controller($uni_id,$ip_address,$price){
    $application_instance = new Application();
    return $application_instance->add_to_application_without_customer_id($uni_id,$ip_address,$price);
}

function remove_application_controller($uni_id,$cust_id,$ip_address){
    $application_instance = new Application();
    return $application_instance->remove_application($uni_id,$cust_id,$ip_address);
}

function delete_all_applications_controller($cust_id,$ip_address){
    $application_instance = new Application();
    return $application_instance->delete_all_applications($cust_id,$ip_address);
}
?>
