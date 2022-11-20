<?php 

require('./Settings/connection.php');

// inherit the methods from Connection
class Application extends Connection{

    function select_single_application($uni_id, $cust_id){
        return $this ->fetchOne("select * from application where uni_id = $uni_id and cust_id =$cust_id");
    }
    function add_to_application($cust_id,$id, $ip_address,$price){
        return $this ->query("insert into application(cust_id, uni_id,	ip_add,	price) values($cust_id, $id, $ip_address, $price) ");
    }
}
?>
