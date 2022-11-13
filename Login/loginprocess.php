<?php
require('../Controllers/customer_controller.php');
require('../Settings/core.php');


// check if theres a POST variable with the name 'addProductButton'
 if(isset($_POST['addButton'])){
    // retrieve the name, description and quantity from the form submission
    
    $email = $_POST['email'];

    $password = $_POST['password'];

    $results = login_customer_controller($email);

    $res = password_verify($password,$results['customer_pass']);

    
    if($res == true){

        $_SESSION['user_role'] = $results['user_role'];
        $_SESSION['user_id'] = $results['customer_id'];

        header("Location: ../index.php");
    }else{
        
        header("Location: ../Login/login.php?error=Incorrect username or password"); 
    }


}

/* F EDITS////////////////////////////////////////////////////////////////////////

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
 */

// updating
////////////////////////////////////////////////////////////////////////



?>