<?php 
require("./Controllers/application_controller.php");
?>
<?php
include "dotenvReader.php";

(new DotEnv(__DIR__ . '/.env'))->load();?>

<?php
$ip_address = getenv("REMOTE_ADDR");
// echo "$ip_address";
    if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
        // echo "$customer_id";
        $applications_list = select_all_applications_controller($customer_id, $ip_address);
        $total = get_total_controller($customer_id, $ip_address);
        // echo "$applications_list";
        // contains app_id, cust_id, uni_id, ip_add, price, total

    }else{
        $applications_list = select_all_applications_without_customer_id_controller($ip_address); 
        $total = get_total_without_customer_id_controller($ip_address);

        // echo "$ip_address";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/css/main.css" rel="stylesheet" />

</head>


<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width: 50%">University</th>
                <th style="width: 18%">Country</th>
                <th style="width: 18%">City</th>
                <th style="width: 22%" class="text-center">Application Fee</th>
                <th style="width: 10%"></th>
            </tr>
        </thead>

        <?php 
          
        ?>
        <tbody>
            
                <?php foreach($applications_list as $x){
                    echo "<tr>
                    <td data-th='University'>
                    <div class='row'>
                        <div class='col-sm-2 hidden-xs'>
                            <img src='http://placehold.it/100x100' alt='...' class='img-responsive' />
                        </div>
                        <div class='col-sm-10'>
                            <h4 class='nomargin'>{$x['university_name']}</h4>
                            <p>
                                {$x['mission']}
                            </p>
                        </div>
                    </div>
                </td>
                <td data-th='Country'>{$x['university_country']}</td>
                <td data-th='City'>{$x['university_city']}</td>
                <td data-th='Fee' class='text-center'>GH₵{$x['price']}</td>
                <td class='actions' data-th=''>
                    <button class='btn btn-info btn-sm'>
                        <i class='fa fa-refresh'></i>
                    </button>
                     <a href ='delete_from_cart.php?id={$x['university_id']}'>
                     <button class='btn btn-danger btn-sm' >
                        <i class='fa fa-trash-o' ></i>   
                    </button>
                    </a>
                </td>
             </tr>               
                ";                    
                } ?> 
            
        </tbody>
        <tfoot>
                <?php 
                    echo " <tr class='visible-xs'>
                <td class='text-center'><strong>Total: GH₵{$total['total']}</strong></td>
            </tr>
            <tr>
                <td>
                    <a href='universities.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Applying</a>
                </td>
                <td colspan='2' class='hidden-xs'></td>
                <td class='hidden-xs text-center'><strong>Total: GH₵{$total['total']}</strong></td>
                <td>
                    <a href='#' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a>
                </td>
            </tr>";

                ?>
        </tfoot>
    </table>

</div>

<?php
require_once('./Controllers/order_controller.php');
// require_once('./Controllers/payment_controller.php');
require_once('./Settings/core.php'); ?>

<?php 
            //echo getenv("PAYSTACK_PUBLIC_KEY");
            // echo "hello";
            $status = $decodedResponse->data->status;/////////need
            $datetime = date("Y-m-d H:i:s:u");
            echo $datetime;
            $status = "Success";
            $customer_id = $_SESSION['user_id'];
            $ip = getenv('REMOTE_ADDR');

            $total = get_total_controller($customer_id, $ip_address);
            $currency = "GHC";
            $result = add_to_orders_controller($customer_id, $datetime, $status,$total,$currency);

            

            if($result){
                $order_id = select_order_id_controller($datetime);
                $selectfromcart = select_all_applications_controller($customer_id, $ip);
                foreach($selectfromcart as $select){
                $uni_id = $select['uni_id'];
                $price =  $select["price"];
                // inserting the information into the order details  table
                $orderDetails = add_order_details_controller($order_id['order_id'], $uni_id, $price);
                echo "</br>";
                echo "$orderDetails";
                } 
            }



          
        // inserting into the payment table 
        
        if($result){

            // if payment is successful remove the customers applications from the cart
            $removefromcart = delete_all_applications_controller($customer_id, $ip);
    
    
            if($removefromcart){
                echo "success";
                // header("Location: ../View/success.html");
            }else{
                echo "failure";
                // header("Location: ../View/failure.html");
            }

    }
            


            
        

?>

    <?php include "footer.php"?>
