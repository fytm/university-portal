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

}

?>