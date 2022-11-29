<?php
require('./Classes/order_class.php');

function add_to_orders_controller($customer_id, $datetime, $status,$total,$currency){
    $order_instance = new Order();
    return $order_instance-> add_to_orders($customer_id, $datetime, $status,$total,$currency);
}

function add_order_details_controller($order_id,  $uni_id, $price){
    $order_instance = new Order();
    return $order_instance->add_order_details($order_id,  $uni_id, $price);
}

function select_order_id_controller($datetime){
    $order_instance = new Order();
    return $order_instance->select_order_id($datetime);

}


?>