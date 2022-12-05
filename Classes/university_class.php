<?php

require_once('../Settings/connection.php');

// inherit the methods from Connection
class University extends Connection{


    function add_university($name,$email,$description,$country,$city,$contact){

		return $this->query("insert into university(university_name, university_email, university_description, university_country, university_city, university_contact) values('$name', '$email', '$description', '$country', '$city','$contact')");
	}

    function select_all_universities_plus_logos(){
		// return array or false
		return $this->fetch("SELECT * FROM university inner join `uni_photos` WHERE uni_id = university_id and isLogo = 1");
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

	function select_photos($id){
		//Select first four photos for school only
		return $this->fetch("SELECT `path` FROM `uni_photos` WHERE uni_id = '$id' AND isLogo = false LIMIT 4 ");

	}

	//  function select_one_university_and_photos($id){
	// 	return $this->fetch("select * from university inner join uni_photos on uni_id = university_id where uni_id='$id'  AND isLogo = false LIMIT 4");
	// }

}

?>
