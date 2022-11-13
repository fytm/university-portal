<?php

require('../Settings/connection.php');

// inherit the methods from Connection
class Product extends Connection{


	function add_brand($name){
		// return true or false
		return $this->query("insert into brands(brand_name) values('$name')");
	}

    function select_all_brands(){
		// return array or false
		return $this->fetch("select * from brands");
	}

    function select_one_brand($id){
		// return associative array or false
		return $this->fetchOne("select * from brands where brand_id='$id'");
	}

	function select_brand_name($name){
		return $this->fetchOne("select * from brands where brand_name='$name'");
	}

    function update_one_brand($id, $name){
		// return true or false
		return $this->query("update brands set brand_name='$name' where brand_id = '$id'");
	}


	// CATEGORIES

	function add_categories($name){
		// return true or false
		return $this->query("insert into categories(cat_name) values('$name')");
	}

	function select_category_name($name){
		return $this->fetchOne("select * from categories where cat_name='$name'");
	}

	function select_all_categories(){
		// return array or false
		return $this->fetch("select * from categories");
	}

	function select_one_category($id){
		// return associative array or false
		return $this->fetchOne("select * from categories where cat_id='$id'");
	}

	function update_one_category($id, $name){
		// return true or false
		return $this->query("update categories set cat_name='$name' where cat_id = '$id'");
	}


	// PRODUCTS
	function list_brands(){
		// return array or false
		return $this->fetch("select * from brands");
	}

	function list_categories(){
		// return array or false
		return $this->fetch("select * from categories");
	}

	function add_product($category,$brand,$title,$price,$description,$fileDestination,$keyword){

		return $this->query("insert into products(product_cat,product_brand, product_title, product_price, product_desc,product_image, product_keywords) values('$category', '$brand', '$title', '$price', '$description','$fileDestination', '$keyword')");
	}

	function list_products(){
		// return array or false
		return $this->fetch("select * from university");
	}

	function select_one_product($id){
		return $this->fetchOne("select * from products where product_id='$id'");
	}

	function update_product($category,$brand,$title,$price,$description,$keyword, $id){

		return $this->query("update products set product_cat = '$category',product_brand = '$brand', product_title = '$title', product_price = '$price', product_desc = '$description', product_keywords = '$keyword' where product_id = '$id' ");

		// update products set product_cat = '3',product_brand = '6', product_title = 'Air Jordans 2', product_price = '120', product_desc = 'new description', product_keywords = 'keyword' where product_id = '4' 

	}

	function list_selected_products($query){

		return $this->fetch("select * from products where (`product_title` like '".$query."%') ");

	}

	function check_product($title){
		return $this->fetchOne("select * from products where product_title='$title'");
	}
}