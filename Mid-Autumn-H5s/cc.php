<?php 
$dbms='mysql';     //数据库类型
 $host='fenxiao.soundtooth.cn'; //数据库主机名
 $dbName='Mid_Autumn';    //使用的数据库
 $user='root';      //数据库连接用户名
 $pass='STst57410520';          //对应的密码
 $dsn="$dbms:host=$host;dbname=$dbName";

 // $dbms='mysql';     //数据库类型
 // $host='localhost'; //数据库主机名
 // $dbName='test';    //使用的数据库
 // $user='root';      //数据库连接用户名
 // $pass='123456';          //对应的密码
 // $dsn="$dbms:host=$host;dbname=$dbName";

 try{
     $dbh=new PDO($dsn,$user,$pass);//初始化一个PDO对象
     $dbh->exec("SET NAMES utf8");
 }catch(PDOException $e){
     die("Error!:".$e->getMessage()."<br>");
 }