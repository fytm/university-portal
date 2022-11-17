<?php
require('../Controllers/university_controller.php');

$university = select_one_university_controller($_GET['id']);
?>