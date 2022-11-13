<?php

require('../Controllers/customer_controller.php');

// check if theres a POST variable with the name 'addProductButton'
 if(isset($_POST['addButton'])){
    // retrieve the name, description and quantity from the form submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST["country"];
    $city = $_POST['city'];
    $contact = $_POST["contact"];
    $role = $_POST["user-role"];

    // call the add_product_controller function: return true or false
    $result = add_customer_controller($name, $email, $password, $country, $city, $contact, $role);
   
    // var_dump($result);
    // return;

    if($result === true) header("Location: ./login.php");
    else header("Location: ../Error/error.html");

}


////////////////////////////////////////////Edit from products to universities
if(isset($_GET['deleteProductID'])){

    $id = $_GET['deleteProductID'];

    // call the function
    $result = delete_product_controller($id);

    if($result === true) header("Location: ../views/products.php");
    else echo "deletion failed";


}


if(isset($_POST["updateProductID"])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $qty = $_POST['qty'];


    // Call the function
    $results = update_product_controller($id, $name, $description, $qty);
    if($results === true) header("Location: ../views/products.php");
    else echo "deletion failed";
}


// updating




?>