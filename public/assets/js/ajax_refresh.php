<?php
// PDO connect *********
require('connect.php');

$province = '%'.$_GET['data'].'%';
//$province = 'Western Cape';

$sql = "SELECT* FROM  locations where province LIKE '%$province%'";

$rows = $conn->query($sql);

foreach ($rows as $rs) {
	// put in bold the written text
	$country_name = str_replace($_GET['data'], '<b>'.$_GET['data'].'</b>', $rs['township']);
	// add new option
   

    

     echo '<li id="title" style="margin-bottom:3px;">'.
     '<a href='."'#'".'title="'.$country_name.'">'.$country_name.'</a></li>';
}

 
?>