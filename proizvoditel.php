<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type='text/css'>
<?php
   include_once('connection.php');
?>
<a href="local.php">На главную</a>
<hr>
<?php

   $get=$_GET['proizvoditel'];
   //var_dump($get);
   $result=mysql_query("SELECT tovary.tovar_name ,tovary.description,tovary.images,tovary.Price,proizvoditel.Name_proizvoditel,
		tovary.tovary_id FROM tovary LEFT JOIN proizvoditel ON tovary.proizvoditel_id = proizvoditel.proizvoditel_id WHERE tovary.proizvoditel_id = $get ");

 while($row= mysql_fetch_assoc($result)){
    //var_dump($row);
   $puth=$row['images'];
   $tovarid= $row['tovary_id'];
   $nametovar=$row['tovar_name'];
   $proizvoditel=$row['Name_proizvoditel'];
   $price=$row['Price'];
   $description=$row['description'];

   echo 	"Название:"	."<a href='page.php?id=$tovarid'>$nametovar</a>"."<br>";
   echo  "<img src='$puth'>"."<br>";
   echo  "Описание:".$description."<br>";
   echo  "Цена:".$price."р."."<br>";
   echo  "Производитель:"."
         <a href='proizvoditel.php?proizvoditel=$proizvoditel'>$proizvoditel</a>"."<br>";
   echo	"ID товара:".$tovarid."<hr>";
};

?>
