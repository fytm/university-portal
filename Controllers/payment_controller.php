
<?php
require('./Classes/payment_class.php');

function add_payment_controller($customer_id, $order_id, $total, $currency, $datetime){
    $payment_instance = new Payment();
    return $payment_instance-> add_payment($customer_id, $order_id, $total, $currency, $datetime);
}




?>

