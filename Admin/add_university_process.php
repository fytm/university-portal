<?php

require('../Controllers/university_controller.php');

// check if theres a POST variable with the name 'addProductButton'
 if(isset($_POST['addButton'])){
    // retrieve the name, description and quantity from the form submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mission =$_POST['mission'];
    $description = $_POST['description'];
    $country = $_POST["country"];
    $city = $_POST['city'];
    $contact = $_POST["contact"];
    // call the add_product_controller function: return true or false
    $result = add_university_controller($name, $email, $password, $country, $city, $contact, $role);
   
    // var_dump($result);
    // return;

    if($result === true) header("Location: ./success.html");
    else header("Location: ../Error/error.html");

}




?>