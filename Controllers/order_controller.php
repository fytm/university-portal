<?php
require('./Classes/order_class.php');

function add_to_orders_controller($cust_id, $date, $status){
    $order_instance = new Order();
    return $order_instance-> add_to_orders($cust_id, $date, $status);
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