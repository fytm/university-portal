<?php
require('../Controllers/customer_controller.php');
require('../Settings/core.php');
@session_start();
// var_dump($_SESSION);
// echo $_SESSION['user_role'];

// check if theres a POST variable with the name 'addProductButton'
 if(isset($_POST['addButton'])){
    // retrieve the name, description and quantity from the form submission
    
    $email = $_POST['email'];

    $password = $_POST['password'];

    $results = login_customer_controller($email);

    $res = password_verify($password,$results['customer_pass']);

    
    if($res == true){
        // echo $_SESSION['user_role'];

        $_SESSION['user_role'] = $results['user_role'];
        $_SESSION['user_id'] = $results['customer_id'];
        
        if($_SESSION['user_role'] == '1'){
            header("Location: ../Admin/all_universities.php");
        }
        else{
            header("Location: ../View/universities.php");
        }
    }else{
        
        header("Location: ../Login/login.php?error=Incorrect username or password"); 
    }


}


?>