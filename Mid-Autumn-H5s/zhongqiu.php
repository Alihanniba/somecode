<?php 
require_once ('./cc.php');

$created_at = date("Y-m-d H:i:s");
$temp = $dbh->prepare('INSERT INTO Soundtooth_M(`created_at`) 
	VALUES ( :created_at)');


// $temp->bindParam(':open_id' , $open_id , PDO::PARAM_STR);

$temp->bindParam(':created_at' , $created_at , PDO::PARAM_STR);

if(!$temp->execute()){
	// echo json_encode(array('id'=>$lastId));
	// echo $generate_code ;
	echo json_encode(array('error'=>'插入失败!'), true);
}

$lastId = $dbh ->lastInsertId();
$apiResult = array(
	'id' => $lastId,
	'generate_code' => $generate_code
);

