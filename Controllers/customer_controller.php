<?php

require('../Classes/customer_class.php');

function add_customer_controller($name, $email, $password, $country, $city, $contact){

    // echo $email;
    // create an instance of the customer class
    $customer_instance = new Customer();
    // call the method from the class
    return $customer_instance->add_customer($name, $email, $password, $country, $city, $contact);

}

function add_admin_controller($name, $email, $password, $country, $city, $contact,$role){

    // echo $email;
    // create an instance of the customer class
    $customer_instance = new Customer();
    // call the method from the class
    return $customer_instance->add_admin($name, $email, $password, $country, $city, $contact,$role);

}




function login_customer_controller($email){

    // echo $email;
    // echo $password;
    $customer_instance = new Customer();

    return $customer_instance->login_customer($email);
}

function delete_customer_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_customer($id);

}

function update_customer_controller($id, $name, $description, $qty){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_customer($id, $name, $description, $qty);

}

function select_all_customers_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_customers();

}

function select_one_customer_controller($id){
    // create an instance of the Product class
    $product_instance = new Customer();
    // call the method from the class
    return $product_instance->select_one_customer($id);

}



?>