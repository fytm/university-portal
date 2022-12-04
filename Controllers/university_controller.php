<?php

require('../Classes/university_class.php');

function add_university_controller($name,$email,$mission,$description,$country,$city,$contact){
    $university_instance = new University();
    // call the method from the class
    return $university_instance->add_university($name,$email,$mission, $description,$country,$city,$contact);
}

function list_universities_controller(){
    $university_instance = new University();
    // call the method from the class
    return $university_instance->list_universities();
}

function select_one_university_controller($id){
    $university_instance = new University();
    // call the method from the class
    return $university_instance->select_one_university($id);
}

function update_university_controller($name,$email,$mission, $description,$country,$city,$contact, $id){
    $university_instance = new University();
    // call the method from the class
    return $university_instance->update_university($name,$email,$mission, $description,$country,$city,$contact, $id);
}

function select_with_logo_controller(){
    $university_instance = new University();
    return $university_instance -> select_all_universities_plus_logos();
}

function select_university_photos_controller($id){
    $university_instance = new University();
    return $university_instance -> select_photos($id);
}
// function list_selected_products_controller($query){
//     $product_instance = new Product();
//     // call the method from the class
//     return $product_instance->list_selected_products($query);
// }

// function check_product_exists($title){

//     $product_instance = new Product();
//     return $product_instance->check_product($title);
// }

function delete_university_controller($uni_id){
    $university_instance = new University();
    return $university_instance -> delete_university($uni_id);
}
