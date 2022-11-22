<?php

require('../Settings/connection.php');

// inherit the methods from Connection
class Cart extends Connection{


	function select_single_cart_item($id){
		
		return $this->fetchOne("select * from cart where p_id='$id'");
	}

    function add($id,$ip_address,$customerid,$qty){

        return $this->query("insert into cart(p_id, ip_add, c_id, qty) values('$id', '$ip_address', '$customerid', '$qty')");
    }

    function add_no_cid($id,$ip_address,$qty){
        return $this->query("insert into cart(p_id, ip_add, qty) values('$id', '$ip_address', '$qty')");

    }

    function select_all($cid, $ip){

        return $this->fetch("select * from cart inner join products on  p_id = product_id where c_id = '$cid' or ip_add = '$ip' ");
    }

    // function list_all_with_ip($ip){
    //     return $this->fetch("select * from cart inner join products on  p_id = product_id where ip_add = '$ip' ");
    // }

    function select_qty($id){

        return $this->fetch("select * from cart where p_id='$id'");

    }

    function remove_application($id, $ip_address){
        return $this->query("delete from cart where app_id = '$application_id'");

    }


    function select_total_fee($id,$ip){
        return $this->fetch("select SUM(price) as total from cart as c inner join applications as a on  a.app_id = c.app_id where cust_id = '$id' or ip_add = '$ip'");
    }



    function select_cart($customer_id, $ip){
        return $this->fetch("select * from cart where cust_id ='$customer_id' or ip_add = '$ip' ");
    }

    function delete_cart($customer_id, $ip){
        return $this->query("delete from cart where cust_id = '$customer_id' or ip_add = '$ip' ");
    }


}

?>
