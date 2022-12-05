<?php
require('../Controllers/university_controller.php');
@session_start();

if(isset($_SESSION['user_role']) && isset($_SESSION['user_id'])){
    if($_SESSION['user_role'] == 1){
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
    // call the add_university_controller function: return true or false
    try{
    $result = add_university_controller($name, $email, $mission, $description, $country, $city, $contact);
    }
    catch(Exception $e){
        echo 'Message:  ' .$e->getMessage();
    }
   
    // var_dump($result);
    // return;

    if($result === true) header("Location: ./success.html");
    else header("Location: ./failure.html");

}
        
    }
    else{
        echo "Unauthorised";
    }

}else{
    echo "Session error";

}






?>