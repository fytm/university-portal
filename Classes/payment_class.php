<?php 

require_once('./Settings/connection.php');

class Payment extends Connection{
    function add_payment_controller($customer_id, $order_id, $total, $currency, $datetime){
        return $this->query("INSERT INTO `payment` (`cust_id`, `order_id`,`total`,`currency`, `datetime`) VALUES ( '$customer_id', '$order_id', '$total', '$currency','$datetime') ");
    }

   
}
?>