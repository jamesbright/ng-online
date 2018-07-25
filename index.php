<?php 
// Author: James Ononiwu
// fb.com/jamesononiwu
require 'includes/Schools.class.php'; 

$schools =new Schools();




if(isset($_POST['search'])):
$school=$schools->search($_POST['search']);
include 'view.php';
exit;
endif;





$school=$schools->get_all_schools();
include 'view.php';
exit;
?>
