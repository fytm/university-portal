<?php 
require_once('./Settings/connection.php');

class Course extends Connection{
    function select_all_courses_for_particular_university($uni_id){
        return $this->fetch("select * from course where uni_id = '$uni_id'")
    }

    function
}
?>