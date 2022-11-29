<?php
require('./Controllers/application_controller.php');
require('./Controllers/order_controller.php');
require('./Settings/core.php'); ?>


<?php
include "dotenvReader.php";
(new DotEnv(__DIR__ . '/.env'))->load();?>

<?php 


// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();
//retrieve API key from
// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_39575994d8f7c54a73ae526623346a7d0c1725dd"),
    "Cache-Control: no-cache",
),
);


// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);
// echo $decodedResponse;


// check if the object has a status property and if its equal to 'success' ie. if verification was successful
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
     // Adding to the orders table
    if(isset($_SESSION["user_id"])){
          //echo getenv("PAYSTACK_PUBLIC_KEY");
            // echo "hello";
            $status = $decodedResponse->data->status;/////////need
            $datetime = date("Y-m-d H:i:s:u");
            echo $datetime;
            $status = "Success";
            $customer_id = $_SESSION['user_id'];
            $ip = getenv('REMOTE_ADDR');

            $total = get_total_controller($customer_id, $ip);
            $currency = "GHC";
            $result = add_to_orders_controller($customer_id, $datetime, $status,$total['total'],$currency);

            

            if($result){
                $order_id = select_order_id_controller($datetime);
                $selectfromcart = select_all_applications_controller($customer_id, $ip);
                foreach($selectfromcart as $select){
                $uni_id = $select['uni_id'];
                $price =  $select["price"];
                // inserting the information into the order details  table
                $orderDetails = add_order_details_controller($order_id['order_id'], $uni_id, $price);
                // echo "</br>";
                // echo "$orderDetails";
                } 
         
        // inserting into the payment table 


            // if payment is successful remove the customers applications from the cart
            $removefromcart = delete_all_applications_controller($customer_id, $ip);
    
    
            if($removefromcart){
                echo "success";
                header("Location: ./View/success.html");
            }else{
                echo "failure";
                header("Location: ./View/failure.html");
            }

    }
      
       



    }


}else{
    // if verification failed
    echo $response;
    echo $err;
    // var_dump ($decodedResponse);
}



?>
