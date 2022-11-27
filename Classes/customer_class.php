<?php

require_once('./Settings/connection.php');

// inherit the methods from Connection
class Customer extends Connection{


	function add_customer($name, $email, $password, $country, $city, $contact, $role){

		// return true or false
		return $this->query("insert into customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) values('$name', '$email', '$password', '$country', '$city', '$contact', '$role')");
	}

	
	function login_customer($email){


		return $this->fetchOne("select customer_email, customer_id, user_role, customer_pass FROM customer where customer_email ='$email'");

	}




	function delete_customer($id){
		// return true or false
		return $this->query("delete from products where id = '$id'");
	}

	function update_customer($id, $name, $description, $qty){
		// return true or false
		return $this->query("update products set name='$name', description='$description', qty='$qty' where id = '$id'");
	}

	function select_all_customers(){
		// return array or false
		return $this->fetch("select * from customers");
	}

	function select_one_customer($id){
		// return associative array or false
		return $this->fetchOne("select * from customer where customer_id='$id'");
	}

}

?>