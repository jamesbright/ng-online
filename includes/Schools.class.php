<?php 

Class Schools{




 
public function get_all_schools(){
include 'db_conn.php';
try{
$sql='select * from institutions order by name,state,type asc';
$s=$pdo->query($sql);
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();

return $result;
}

public function get_by_state($state){
	require_once 'db_conn.php';
	try{
	$sql='select * from institutions where state REGEXP :state order by name asc';
$s=$pdo->prepare($sql);
$s->bindValue(':state',$state);
$s->execute();
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();
return $result;
	
}

public function get_by_type($type){
	require_once 'db_conn.php';
	try{
	$sql='select * from institutions where type like :type% order by name asc';
$s=$pdo->prepare($sql);
$s->bindValue(':type',$type);
$s->execute();
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();
return $result;
}

public function search($school){
	
	require_once 'db_conn.php';
	try{
	$sql='select * from institutions where name REGEXP :possible0 OR state REGEXP :possible1 OR type REGEXP :possible2 OR address REGEXP :possible3 OR tel REGEXP :possible4 OR pmb REGEXP :possible5 OR abbr REGEXP :possible6 OR affil REGEXP :possible7 OR email REGEXP :possible8 OR website REGEXP :possible9';
$s=$pdo->prepare($sql);
$s->bindValue(':possible0',$school);
$s->bindValue(':possible1',$school);
$s->bindValue(':possible2',$school);
	$s->bindValue(':possible3',$school);
$s->bindValue(':possible4',$school);
	$s->bindValue(':possible5',$school);
$s->bindValue(':possible6',$school);
	$s->bindValue(':possible7',$school);
	$s->bindValue(':possible8',$school);
$s->bindValue(':possible9',$school);

	
$s->execute();
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();
return $result;
}

public function get_all_states(){
	include 'db_conn.php';
try{
$sql='select * from institutions order by state asc';
$s=$pdo->query($sql);
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();

return $result;
}


public function get_all_types(){
	include 'db_conn.php';
try{
$sql='select * from institutions order by type asc';
$s=$pdo->query($sql);
}catch(PDOException $e){
	$output='Error! '.$e->getMessage();
	include 'error.php';
	exit();
}
$result=$s->fetchAll();

return $result;
}


}


?>