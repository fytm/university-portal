<?php

require('../Classes/product_class.php');


// BRAND

function add_brand_controller($name){

    // echo $email;
    // create an instance of the Product class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->add_brand($name);

}



function select_all_brands_controller(){
    // create an instance of the Product class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->select_all_brands();

}

function select_single_brand_controller($name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance-> select_brand_name($name);

}

function select_one_brands_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_brand($id);

}


function update_brand_controller($id, $name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_brand($id, $name);

}

// CATEGORIES


function add_category_controller($name){

    // echo $email;
    // create an instance of the Product class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->add_categories($name);

}

function select_single_category_controller($name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance-> select_category_name($name);

}

function select_all_categories_controller(){
    // create an instance of the Product class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->select_all_categories();

}

function select_one_category_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_category($id);

}


function update_category_controller($id, $name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_category($id, $name);

}


// PRODUCT


function list_brands_controller(){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->list_brands();
}


function list_category_controller(){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->list_categories();
}



function add_product_controller($category,$brand,$title,$price,$description,$fileDestination,$keyword){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_product($category,$brand,$title,$price,$description,$fileDestination,$keyword);
}

function list_products_controller(){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->list_products();
}

function select_one_product_controller($id){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_product($id);
}

function update_product_controller($category,$brand,$title,$price,$description,$keyword, $id){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_product($category,$brand,$title,$price,$description,$keyword, $id);
}

function list_selected_products_controller($query){
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->list_selected_products($query);
}

function check_product_exists($title){

    $product_instance = new Product();
    return $product_instance->check_product($title);
}

?>


