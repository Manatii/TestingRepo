<?php
// PDO connect *********
require('connect.php');
$province =  '%'.$_GET['province'].'%';
$keyword = '%'.$_GET['keyword'].'%';
$sql = "SELECT * FROM locations WHERE township LIKE (:keyword) and $province Like ORDER BY township ASC LIMIT 0, 10";
$query = $conn->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
$country_name= "";
foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_GET['keyword'], '<b>'.$_GET['keyword'].'</b>', $rs['township']);
	// add new option
   
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $country_name).'\')">'.$country_name.'</li>';
}

 echo '<li onclick="set_item(\''.str_replace("'", "\'", $country_name ).'\')">'.$country_name .'</li>';
?>