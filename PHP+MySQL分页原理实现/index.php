<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP+MYSQL分页原理实现</title>
	<style>
		body{
			font-size: 12px;
			font-family: verdana;
			width: 100%;
		}
		.page{
			text-align: center;
		}
		.page form{
			display: inline;
		}
		.content{
			height: 300px;
		}
		.page a{
			border:1px solid #aaaadd;
			text-decoration: none;
			padding: 2px 5px;
			margin: 2px;
		}
		.page .current{
			border:1px solid red;
			padding: 4px 6px;
			background: red;
			color: #fff;
			font-weight: bold;
		}
		.page .disable{
			border:1px solid #eee;
			padding: 2px 5px;
			margin: 2px;
			color:#ddd;
		}
	</style>
</head>
<body>
<?php 
//PDO连接数据库
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='alihanniba';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

try{
 $dbh=new PDO($dsn,$user,$pass);//初始化一个PDO对象
 $dbh->exec("SET NAMES utf8");
}catch(PDOException $e){
 die("Error!:".$e->getMessage()."<br>");
}

//设置配置项
$pageSize = 10; //显示条数
$showPage = 5;  // 显示的页码


//1,传入页码
$page = $_GET['p'];
$num = ($page-1)*$pageSize;
//2,根据页码取出数据:php->mysql处理
$temp = $dbh->prepare('SELECT * FROM `pages` LIMIT '. $num .',' .$pageSize);
//3,获取数据总数
$total = $dbh->prepare('SELECT * FROM `pages`');
if(!$temp->execute()){
	echo "error";
}
if(!$total->execute()){
	echo "total error";
}
$pages = $temp->fetchAll();
$total_count = count($total->fetchAll());

// echo $total_count;
//计算页数
$total_pages = ceil($total_count/$pageSize);


// echo count($pages);
// echo $pages[1]['id'];
// echo $pages[1]['name'];
echo "<div class='content'>";
echo "<table border=1 cellspacing=0 width=40% align=center>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "</tr>";
for ($i=0; $i < count($pages); $i++) { 
	echo "<tr>";
	echo "<td>{$pages[$i]['id']}</td>";
	echo "<td>{$pages[$i]['name']}</td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";

//3,显示数据 + 分页条
$page_banner = '<div class="page">';

// 计算偏移量
$pageOffset = ($showPage-1)/2;

//第一页
if($page>1){
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>&lt;上一页</a>";
}else{
	$page_banner .= "<span class='disable'>首页</span>";
	$page_banner .= "<span class='disable'>&lt;上一页</span>";
}

//初始化数据
$start = 1;
$end = $total_pages;
if($total_pages>$showPage){
	if($page>$pageOffset+1){
		$page_banner .= "...";
	}
	if($page>$pageOffset){
		$start = $page-$pageOffset;
		$end   = $total_pages>$page+$pageOffset?$page+$pageOffset:$total_pages;
	}else{
		$start = 1;
		$end   = $total_pages>$showPage?$showPage:$total_pages;
	}
	if($page+$pageOffset>$total_pages){
		$start = $start-($page+$pageOffset-$end);
		// $end   = $total_pages;
	}
}

for ($i=$start; $i <= $end; $i++) { 
	if($page==$i){
		$page_banner .= "<span class='current'>{$i}</span>";
	}else{
		$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
	}
}

//尾部省略
 
if($total_pages>$showPage&&$total_pages>$page+$pageOffset){
	$page_banner .= "...";
}

//尾页
if($page<$total_pages){
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>&gt;下一页</a>";
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$total_pages."'>尾页</a>";
}else{
	$page_banner .= "<span class='disable'>&gt;下一页</span>";
	$page_banner .= "<span class='disable'>尾页</span>";
}
$page_banner .= "共{$total_pages}页,";
$page_banner .= "<form action='index.php' method='get'>";
$page_banner .= "到第 <input type='text' size='2' name='p'> 页";
$page_banner .= " <input type='submit' value='确定'> ";
$page_banner .= "</form></div>";
echo $page_banner;

?>
</body>
</html>

















