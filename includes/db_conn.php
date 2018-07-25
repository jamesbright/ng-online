<?php
try{
$pdo=new PDO('mysql:host=localhost;dbname=campus','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec('SET NAMES "utf8"');

}catch(PDOException $e){
	$output ='unable to connect to database  '.$e->getMessage();
	include 'error.php';
	exit();
}
  


?>