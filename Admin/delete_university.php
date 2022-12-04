<?php 
require('../Controllers/university_controller.php');
require("../Settings/core.php");

if($_SESSION['user_role'] == 1){
        // check if theres a get variable with the name 'uni_id'
    if(isset($_GET['uni_id'])){
        $uni_id = $_GET['uni_id'];
    // call the add_university_controller function: return true or false
        try{
            $result = delete_university_controller($uni_id);
        }
        catch(Exception $e){
            echo 'Message:  ' .$e->getMessage();
        }
        if($result === true) header("Location: ./success.html");
            else header("Location: ./failure.html");
    }       
}
else{
        echo "Unauthorised";
    }

// }else{
//     echo "Session error";

// }
?>