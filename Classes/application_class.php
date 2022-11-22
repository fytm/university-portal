<?php 

require('./Settings/connection.php');

// inherit the methods from Connection
class Application extends Connection{

    function select_single_application($uni_id, $cust_id){
        return $this ->fetchOne("select * from application where uni_id = '$uni_id' and cust_id ='$cust_id'");
    }
    function select_all_applications($cust_id, $ip){
        return $this ->fetch("select app_id, cust_id, uni_id, ip_add, price, SUM(price) as total from application where cust_id ='$cust_id' or ip_add = '$ip'");
    }

    function select_all_applications_without_customer_id($ip){
        return $this ->fetch("select app_id, cust_id, uni_id, ip_add, price, SUM(price) as total from application where ip_add ='$ip'");
    }
    function add_to_application($cust_id,$id, $ip_address,$price){
        return $this ->query("insert into application(cust_id, uni_id,	ip_add,	price) values('$cust_id', '$id', '$ip_address', '$price') ");
    }
    function add_to_application_without_customer_id($cust_id,$id, $ip_address,$price){
        return $this ->query("insert into application(cust_id, uni_id,	ip_add,	price) values('$cust_id', '$id', '$ip_address', '$price') ");
    }
    function remove_application($uni_id,$customer_id,$ip){
        return $this->query("delete from cart where cust_id = '$customer_id' or ip_add = '$ip' and uni_id ='$uni_id'");
    }

    function delete_all_applications($customer_id, $ip){
        return $this->query("delete from cart where cust_id = '$customer_id' or ip_add = '$ip' ");
    }
}
?>
