<?php 

require_once('./Settings/connection.php');

class Order extends Connection{
    function add_to_orders($cust_id, $datetime, $status,$total,$currency){
        return $this->query("INSERT INTO `order` (`datetime`, `status`, `cust_id`,`total`,`currency`) VALUES ( '$datetime', '$status', '$cust_id', '$total', '$currency') ");
    }

    function add_order_details($order_id,  $uni_id, $price){
        return $this->query("INSERT INTO order_details(order_id, uni_id, price) VALUES ($order_id, $uni_id, $price)");

    }

    function select_order_id($datetime){
        return $this->fetchOne("SELECT order_id from `order` where `datetime` = '$datetime'");
    }
}
?>