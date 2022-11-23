<?php 
require("./Controllers/application_controller.php");
?>

<?php
$ip_address = getenv("REMOTE_ADDR");
// echo "$ip_address";
    if(isset($_SESSION['user_role'])){
        $customerid = $_SESSION['user_id'];
        // echo "$customer_id";
        $applications_list = select_all_applications_controller($customer_id, $ip_address);
        // echo "$applications_list";
        // contains app_id, cust_id, uni_id, ip_add, price, total

    }else{
        $applications_list = select_all_applications_without_customer_id_controller($ip_address); 
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
    <link href="./assets/css/cart.css" rel="stylesheet" />

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
            <tr>
                <?php foreach($applications_list as $x){
                    echo "<td data-th='University'>
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
                    <button class='btn btn-danger btn-sm'>
                        <i class='fa fa-trash-o'></i>
                    </button>
                </td>";                    
                } ?> 
            
            </tr>
        </tbody>
        <tfoot>
                <?php foreach($applications_list as $x){
                    echo " <tr class='visible-xs'>
                <td class='text-center'><strong>Total: GH₵{$x['total']}</strong></td>
            </tr>
            <tr>
                <td>
                    <a href='#' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a>
                </td>
                <td colspan='2' class='hidden-xs'></td>
                <td class='hidden-xs text-center'><strong>Total: GH₵{$x['total']}</strong></td>
                <td>
                    <a href='#' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a>
                </td>
            </tr>";
           

                }?>
        </tfoot>
    </table>
</div>
