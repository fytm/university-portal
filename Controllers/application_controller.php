<?php

require('./Classes/application_class.php');

function select_single_application_item_controller($uni_id,$cust_id){

    // echo $email;
    // create an instance of the customer class
    $application_instance = new Application();
    // call the method from the class
    return $application_instance->select_single_application($uni_id,$cust_id);

}

function add_to_application_controller($uni_id,$ip_address,$cust_id,$price){
    $application_instance = new Application();
    return $application_instance->add_to_application($cust_id,$uni_id, $ip_address,$price);
    
}
