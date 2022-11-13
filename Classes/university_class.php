<?php

require('../Settings/connection.php');

// inherit the methods from Connection
class University extends Connection{


    function add_university($name,$email,$description,$country,$city,$contact){

		return $this->query("insert into university(university_name, university_email, university_description, university_country, university_city, university_contact) values('$name', '$email', '$description', '$country', '$city','$contact')");
	}

    function select_all_universities(){
		// return array or false
		return $this->fetch("select * from university");
	} 

    function list_universities(){
		// return array or false
		return $this->fetch("select * from university");
	}

    function select_one_university($id){
		return $this->fetchOne("select * from university where university_id='$id'");
	}

    function update_university($name,$email,$description,$country,$city,$contact, $id){

		return $this->query("update university set university_name = '$name',university_email = '$email', university_description = '$description', university_country = '$country', university_city = '$city', university_contact = '$contact' where product_id = '$id' ");
	}

}

?>