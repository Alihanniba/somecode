<?php 
require_once("./cc.php");

$generate_code = $_POST['generate_code'];
$temp = $dbh->prepare("SELECT is_hit FROM `Mid_Autumn` WHERE `generate_code` = :generate_code");
$temp->bindParam(':generate_code' , $generate_code , PDO::PARAM_STR);
if(!$temp->execute()){
	echo "select error";	
}

$is_hit = $temp->fetch();
echo json_encode($is_hit, true);

 ?>